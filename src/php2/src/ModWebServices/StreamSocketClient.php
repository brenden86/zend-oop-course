<?php
// Get the resource
$fh = stream_socket_client("tcp://www.example.com:80", $errno, $errstr, 30);

// Check
if (!$fh) {
    // Output error data on failure
    echo "$errstr ($errno)<br />\n";

} else {
    // Write to the stream
    fwrite($fh, "GET / HTTP/1.0\r\nHost: www.example.com\r\nAccept: */*\r\n\r\n");

    // Read from the stream
    while (! feof($fh)) {
        echo fgets($fh, 1024);
    }

    // Close the resource
    fclose($fh);
}
