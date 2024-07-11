<?php
// Example of a row gateway class
class Customer {
    public $id;
    public $firstname;
    public $lastname;

    public function select($params){
        // Code to get a data row
    }
    public function insert($data){
        // code to insert a new data row
    }
    public function delete(){
        // code to delete a data row
    }
    public function update($data){
        // code to update an existing data row
    }
}
