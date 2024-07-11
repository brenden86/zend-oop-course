<?php
$subject = "<p>First Paragraph</p><p>Second Paragraph</p>";

$result = preg_match_all('/<p>(.*?)<\/p>/', $subject, $matches);

print_r($result);

