<?php

namespace ZendCourse;

class Email {

    const WARNING_EMPTY_SUBJECT = "Are you sure you want to send without a subject? (type 'y' to continue) ";
    const ERROR_NO_RECIPIENTS = "Please specify at least one recipient.";
    const ERROR_EMPTY_BODY = "Email body cannot be blank.";

    public string $subject;
    public string $body;

    public function __construct(
        protected array $recipients,
        string $subject = '',
        string $body = ''
    ) {
        $this->subject = $subject;
        $this->body = $body;
    }

    public function setSubject(string $subject) {
        $this->subject = $subject;
        return $this;
    }

    public function setBody(string $body) {
        $this->body = $body;
        return $this;
    }

    public function addRecipients(array $recipients) {
        foreach($recipients as $recipient) {
            $this->recipients[] = $recipient;
        }
        return $this;
    }

    public function send() {

        echo "---NEW MESSAGE---" . PHP_EOL;

        // throw error if there are no recipients
        if(count($this->recipients) < 1) {
            throw new \Error(self::ERROR_NO_RECIPIENTS);
        }

        if(empty($this->body)) {
            throw new \Error(self::ERROR_EMPTY_BODY);
        }

        // warn user if the subject field is empty
        if(empty($this->subject)) {
            $continue = readline(self::WARNING_EMPTY_SUBJECT);
            if($continue !== "y") exit;
        }

        // mock sending the email
        echo "Message sent to " . implode(", ", $this->recipients) . ".";
        echo PHP_EOL;
        echo "Subject: " . $this->subject;
        echo PHP_EOL;
        echo "Message: " . $this->body;

        // extra space
        echo str_repeat(PHP_EOL, 2);
    }

}


// Instance 1

try {

    $email_subject = "Introductions";
    $email_body = "Hello, how are you?";
    $email = new Email(["bart@test.com"]);
    $email
        ->setSubject($email_subject)
        ->setBody($email_body)
        ->addRecipients(["marge@test.com", "lisa@test.com"])
        ->send();

} catch (\Error $e) {
    echo "An error occurred: " . $e->getMessage();
}


// Instance 2 (no subject provided)

try {

    $email_subject = "";
    $email_body = "Your order has left our shipping facility and will arrive within 3 business days.";
    $email = new Email(
        ["someuser@test.com"],
        $email_subject,
        $email_body
    );
    $email->send();

} catch (\Error $e) {
    echo "An error occurred: " . $e->getMessage();
}


// Instance 3 (ERROR: no recipients provided)

try {

    $email_subject = "Error Notification";
    $email_body = "Error connecting to database: incorrect username or password.";
    $email = new Email([]); // passed empty recipients array to trigger error
    $email
        ->setSubject($email_subject)
        ->setBody($email_body)
        ->send();

} catch (\Error $e) {
    echo "An error occurred: " . $e->getMessage();
}