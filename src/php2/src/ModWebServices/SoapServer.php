<?php
/**
 * Simple SOAP server example
 */

// A service class
class MySoapService {
    public function sayHello() {
        return "Hello";
    }
}

try{
    /*Instantiate a SOAP server instance with no WSDL
      Here we are specifying a virtual host.*/
    //$server = new SoapServer(null, ['uri'=>'http://soapserver/']);
    $server = new SoapServer(null, ['uri'=>'http://php2/ModWebServices/SoapServer']);

    // Set the service class
    $server->setClass('MySoapService');

    // Start the new server
    $server->handle();
} catch(SoapFault $e){
    // Handle error
}