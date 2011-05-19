<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IssuuRequest
 *
 * @author ftassi
 */
class IssuuRequest implements ArrayAccess
{
  /**
   *
   * @var array
   */
  protected $parameters;
  
  public function offsetExists($offset)
  {
    return isset($this->parameters[$offset]);
  }
  
  public function offsetGet($offset)
  {
    return $this->offsetExists($offset) ? $this->parameters[$offset] : null;
  }
  
  public function offsetSet($offset, $value)
  {
    if (is_null($offset))
    {
      throw new BadMethodCallException('Parameter Name is mandatory');
    }

    $this->parameters[$offset] = $value;
  }
  
  public function offsetUnset($offset)
  {
    unset($this->parameters[$offset]);
  }
  
  public function getParameters()
  {
    return $this->parameters;
  }
}

?>
