<?php

/**
 * IssuService
 *
 * @author ftassi
 */
class IssuService
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
  
  public function documentUrlUpload($request, $response)
  {
    $this->httpClient->setUrl($this->config->getStandardEndpoint());
    
    return $response;
  }
}

?>
