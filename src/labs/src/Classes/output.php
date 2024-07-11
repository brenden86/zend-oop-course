<?php

include __DIR__ . '/../../vendor/autoload.php';
use ZendOopCourse\Labs\Classes\Email;

// Instance 1

try {

    $email_subject = 'Introductions';
    $email_body = 'Hello, how are you?';
    $email = new Email(['bart@test.com']);
    echo $email
        ->setSubject($email_subject)
        ->setBody($email_body)
        ->addRecipients(['marge@test.com', 'lisa@test.com'])
        ->send();

} catch (Exception $e) {
    echo 'An error occurred: ' . $e->getMessage();
}


// Instance 2 (no subject provided)

try {

    $email_subject = '';
    $email_body = 'Your order has left our shipping facility and will arrive within 3 business days.';
    $email = new Email(
        ['someuser@test.com'],
        $email_subject,
        $email_body
    );
    echo $email->send();

} catch (Exception $e) {
    echo 'An error occurred: ' . $e->getMessage();
}


// Instance 3 (ERROR: no recipients provided)

try {

    $email_subject = 'Error Notification';
    $email_body = 'Error connecting to database: incorrect username or password.';
    $email = new Email([]); // passed empty recipients array to trigger error
    $email
        ->setSubject($email_subject)
        ->setBody($email_body)
        ->send();

} catch (Exception $e) {
    echo 'An error occurred: ' . $e->getMessage();
}