<?php
// A simple email() example.
// A working MTA (mail server) is required to complete the delivery and appropriate php.ini configuration

if ($_POST) {

    // collect data from $_POST
    $to      = (isset($_POST['eadd'])) ? filter_var($_POST['eadd'], FILTER_SANITIZE_EMAIL) : '';
    $subject = (isset($_POST['subject'])) ? trim(strip_tags($_POST['subject'])) : '';
    $msg     = (isset($_POST['msg'])) ? trim(strip_tags($_POST['msg'])) : '';

    // if validation fails, return early
    $valid = FALSE;
    if (!($to && $subject && $msg))
    {
        $error1 = __FILE__ . ':' . __LINE__ . ': To, subject or message not set';
        $error2 = 'There was a problem sending the email [' . __LINE__ . ']';
    } elseif (!(ctype_alnum($subject) && ctype_alnum($msg)))
    {
        $error1 = __FILE__ . ':' . __LINE__ . ': Form posting failed validation';
        $error2 = 'There was a problem sending the email [' . __LINE__ . ']';
    } else {
        $valid = TRUE;
    }
    if (!$valid) {
        error_log($error1);
        die($error2);
    }

    // if "email" form is filled out, send email
    try {
        // Example using all parameters; note: the @ is used here to suppress errors.
        $headers[] = 'From: test@example.com';
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: Text/html; charset=UTF-8';
        $params = '-f test@example.com';
        $result = @mail($to, $subject, $msg, implode("\r\n", $headers), $params);
        echo '<br>' . PHP_EOL;
        echo 'Full Example: ';
        echo ($result) ? 'Mail Sent' : 'Mail not sent';

        // Example using minimum required parameters:
        $result = @mail($to, $subject, $msg);
        echo '<br>' . PHP_EOL;
        echo 'Minimal Example: ';
        echo ($result) ? 'Mail Sent' : 'Mail not sent';

    } catch (Throwable $e) {
        error_log($e->getMessage() . PHP_EOL . $e->getTraceAsString());
        die('Something bogus in the submittal');
    }

} else { // if "email" is not filled out, display the form
    echo "<form method='post' action='Email.php'>
				Email: <input name='eadd' type='email' /><br />
				Subject: <input name='subject' type='text' /><br />
				Message:<br />
				<textarea name='msg' rows='15' cols='40'>
				</textarea><br />
				<input type='submit' />
			</form>";
}
