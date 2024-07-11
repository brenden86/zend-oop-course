<?php
/**
 * Simple SOAP client example
 */

try{
    // Get a soap client instance passing WSDL URL
    $client = new SoapClient("https://footballpool.dataaccess.eu/info.wso?WSDL");

    // Make the request. Returns a standard class object
    $result = $client->TopScorersList();

    // $result contains the result of the traversed object structure
    var_dump($result->TopScorersListResult);
}catch(SoapFault $e){
    var_dump($e);
    //Handle error
}
