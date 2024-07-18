<?php
include __DIR__ . '/../../vendor/autoload.php';

use ZendOopCourse\Labs\Exceptions\User;
use ZendOopCourse\Labs\Exceptions\UserException;
use ZendOopCourse\Labs\Exceptions\UserExceptionTypes;
use ZendOopCourse\Labs\Exceptions\UserRole;

try {
    // throw UserException non-critical
     $baseUser = new User('base_user', 'passwrd');

    // throw UserException (critical)
    // $admin = new User('me', 'password', UserRole::ADMIN);
    // User::deleteUser($admin);

    // throw regular exception
    // $admin = new User('', 'somepassword');



} catch (UserException $e) {
    if (UserExceptionTypes::isCritical($e->type)) {
        // log to different file if critical exception
        error_log($e->generateLogEntry(), 3, 'logs/user_exceptions_critical.log');
        echo $e->getMessage() . PHP_EOL;
    } else {
        error_log($e->generateLogEntry(), 3, 'logs/user_exceptions.log');
        echo $e->getMessage(). PHP_EOL;
    }
} catch (Exception $e) {
    error_log(
        implode(
            ' | ',
            [
                (new DateTime())->format('Y-m-d H:i:s'),
                $e->getMessage(),
                $e->getTraceAsString()
            ]
        ),
        3,
        'logs/general_exceptions.log'
    );
} finally {
    echo 'Done, Goodbye!' . PHP_EOL;
}