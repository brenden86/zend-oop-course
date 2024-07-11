<?php
//Start the buffer
ob_start();

//The echo's are buffered
echo '<h1>Hello Buffer</h1>';
echo '<p>Store this away in your memory</p>';

//This can execute anyplace
header('Contents: Something very cool for you');

//Okay, get the buffer contents, clean the buffer and send the contents
echo ob_get_clean();