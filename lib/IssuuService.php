<?php

/**
 * IssuService
 *
 * @author ftassi
 */
class IssuuService
{
  /**
   *
   * @var HTTP_Request2 
   */
  protected $httpClient;
  
  /**
   *
   * @var IssuuConfigHandler
   */
  protected $config;
  
  public function __construct(HTTP_Request2 $client, IssuuConfigHandler $config)
  {
    $this->config = $config;
    $this->httpClient = $client;
  }
  
  public function documentUrlUpload(IssuuRequest $request, IssuuResponse $response)
  {
    /* @var $httpResponse HTTP_Request2_Response */
    $this->httpClient->setUrl($this->config->getStandardEndpoint());
    $httpResponse = $this->httpClient->send();
    if ($httpResponse->getStatus() === 200)
    {
      $this->checkIssuuResponseStatus($httpResponse->getBody());
    }
    return $response;
  }
  
  protected function checkIssuuResponseStatus($responseMessage)
  {
    $xml = simplexml_load_string($responseMessage);
    $statusCode = (string)$xml->attributes()->stat[0];
    if ($statusCode == 'fail')
    {
      $errorCode = (integer)$xml->error[0]->attributes()->code[0];
      $errorMessage = (string)$xml->error[0]->attributes()->message[0];
      throw new Exception($errorMessage, $errorCode);
    }
  }
}

?>
