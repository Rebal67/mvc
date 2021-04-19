<?php

class Reservation
{
    private $database;
    public function __construct()
    {
        $this->database = new Database;
    }



    public function readAll(){
       $query = "Select * from reservations";
       $this->database->prepare($query);
       return $this->database->getArray();
    }
}