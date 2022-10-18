<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

registerUser($username, $email, $password);
   
}


function registerUser($username, $email, $password){
    $fp=fopen('..\storage\users.csv','a');
    $data=array($username,$email,$password);
    fputcsv($fp,$data);
    fclose($fp);
}



echo "<h1>User Succesfully Registered</h1>";