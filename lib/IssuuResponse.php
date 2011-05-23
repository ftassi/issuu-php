<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IssuuResponse
 *
 * @author ftassi
 */
class IssuuResponse extends IssuuMessage
{
  public function populateFromResponseBody($body)
  {
    $xml = simplexml_load_string($body);
    
    $this->parameters['documentId'] = (string)$xml->document[0]->attributes()->documentId[0];
    $this->parameters['title'] = (string)$xml->document[0]->attributes()->title[0];
    $this->parameters['username'] = (string)$xml->document[0]->attributes()->username[0];
    $this->parameters['name'] = (string)$xml->document[0]->attributes()->name[0];
  }
}

?>
