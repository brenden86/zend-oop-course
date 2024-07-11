<?php
// Phone number validation with dashes
$number  = '921-123-3456';
$pattern = '/^\d{3}[._-]\d{3}[._-]\d{4}/';
echo preg_match($pattern, $number) ? 'Valid' : 'Invalid';