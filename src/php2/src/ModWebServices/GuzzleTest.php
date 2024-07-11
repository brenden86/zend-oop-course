<?php
require __DIR__ . '/../../vendor/autoload.php'; // Get the Composer autoloader

$client = new GuzzleHttp\Client(); // Get a client instance

// Make the request
$url      = 'https://api.unlikelysource.com/api';
$response = $client->request('GET', $url,
    ['query' => [
        'city' => 'Rochester',
        'country' => 'US']
    ]
);

// Test for return status
if ( $response->getStatusCode() === 200 ) {
    // Output the JSON directly
    echo $response->getBody();
    // Output a PHP array
    print_r( json_decode ( $response->getBody()));
}