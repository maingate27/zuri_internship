<?php
class Dbh{
   
    private    $host = "127.0.0.1";
    private    $user = "root";
    private    $db = "zuriphp";
    private    $password = "";   
protected function connect(){

//establishing connection to the DB
    $conn = new mysqli($this->host,$this->user,$this->password,$this->db);
    if(!$conn){
     echo "<script> alert('Error connecting to the database') </script>";
    }
    return $conn;
}

}
 

