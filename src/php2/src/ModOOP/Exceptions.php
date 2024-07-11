<?php

try {
    if(true)throw new Exception('Something bad happened', 500);
    //or
    if(true) throw new ModelException('The model is bad', 500);
} catch (Exception $e) {
    $logEntry = time() . '|' . $e->getMessage() . '|' . $e->getCode();
    error_log($logEntry, 3, 'path/to/model_error_log.php');
} catch (ModelException $e) {
    $logEntry = time() . '|' . $e->getMessage() . '|' . $e->getCode();
    error_log($logEntry, 3, 'path/to/model_error_log.php');
} finally{
    //code to run ...
}