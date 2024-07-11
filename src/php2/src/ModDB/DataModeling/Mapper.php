<?php
class Mapper{
    public $connection, $dataObject;
    public function __construct($conn, $dataObject){
        $this->connection = $conn;
        $this->dataObject = $dataObject;
    }
    // CRUD methods operating on the connection and data object ...
}