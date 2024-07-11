<?php
// Top level buffer
ob_start();
echo 'some content in the first buffer';

// Nested buffer
ob_start();
echo 'some content in the second buffer';

// Get the nested buffer contents
$content = ob_get_contents();
ob_end_flush(); // Flush the nested buffer to the outer

// Get and clean from the outer buffer
$content = ob_get_clean();
echo $content;
