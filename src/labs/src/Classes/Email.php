<?php
namespace ZendOopCourse\Labs\Classes;

use Exception;

class Email 
{

    const WARNING_EMPTY_SUBJECT = 'Are you sure you want to send without a subject? (type "y" to continue) ';
    const ERROR_NO_RECIPIENTS = 'Please specify at least one recipient.';
    const ERROR_EMPTY_BODY = 'Email body cannot be blank.';

    public string $subject;
    public string $body;

    public function __construct(
        protected array $recipients,
        string $subject = '',
        string $body = ''
    ) 
    {
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

		$txt = '';
        $txt .= '---NEW MESSAGE---' . PHP_EOL;

        // throw error if there are no recipients
        if(count($this->recipients) < 1) {
            throw new Exception(self::ERROR_NO_RECIPIENTS);
        }

        if(empty($this->body)) {
            throw new Exception(self::ERROR_EMPTY_BODY);
        }

        // warn user if the subject field is empty
        if(empty($this->subject)) {
            $continue = readline(self::WARNING_EMPTY_SUBJECT);
            if($continue !== 'y') exit;
        }

        // mock sending the email
        $txt .= 'Message sent to ' . implode(', ', $this->recipients) . '.';
        $txt .= PHP_EOL;
        $txt .= 'Subject: ' . $this->subject;
        $txt .= PHP_EOL;
        $txt .= 'Message: ' . $this->body;

        // extra space
        $txt .= str_repeat(PHP_EOL, 2);
        return $txt;
    }

}
