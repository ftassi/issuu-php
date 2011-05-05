<?php

require_once dirname(__FILE__) . '/../../lib/IssuService.php';
require_once dirname(__FILE__) . '/../../lib/IssuuConfigHandler.php';

/**
 * Test class for IssuService.
 * Generated by PHPUnit on 2011-05-05 at 11:54:33.
 */
class IssuServiceTest extends PHPUnit_Framework_TestCase
{

  /**
   * @var IssuService
   */
  protected $object;

  /**
   * Sets up the fixture, for example, opens a network connection.
   * This method is called before a test is executed.
   */
  protected function setUp()
  {
    
  }

  /**
   * Tears down the fixture, for example, closes a network connection.
   * This method is called after a test is executed.
   */
  protected function tearDown()
  {
    
  }

  public function testSiginatureForProtectedMethod()
  {
    $httpClient = $this->getMock('HTTP_Request2', array('setUrl'));

    $httpClient
        ->expects($this->once())
        ->method('setUrl')
        ->with('http://api.issuu.com/1_0');

    $issuu = new IssuService($httpClient, $this->getMockConfig());

    $request = new stdClass();
    $response = new stdClass();

    $issuu->documentUrlUpload($request, $response);
  }

  protected function getMockConfig()
  {
    $config = $this->getMockForAbstractClass('IssuuConfigHandler');
    $config
        ->expects($this->any())
        ->method('getStandardEndpoint')
        ->will($this->returnValue('http://api.issuu.com/1_0'));
    
    return $config;
  }

}

?>
