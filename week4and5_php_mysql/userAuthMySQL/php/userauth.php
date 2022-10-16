<?php

require_once "../config.php";

//register users
function registerUser($fullnames, $email, $password, $gender, $country){
    //create a connection variable using the db function in config.php
    $conn = db();
   //check if user with this email already exist in the database
   $sql = "SELECT * FROM `students` WHERE `Email`='$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
     echo "<script> alert('User already exist')</script>";
    
    }else{
        $sql ="INSERT INTO `students`( `Full_names`, `Country`, `Email`, `Gender`, `password`)
         VALUES ('$fullnames','$country','$email','$gender','$password')";
         $result = mysqli_query($conn, $sql);
         echo "<script> alert('User Successfully registered')</script>";

    }
}


//login users
function loginUser($email, $password){
    //create a connection variable using the db function in config.php
    $conn = db();

    //echo "<h1 style='color: red'> LOG ME IN (IMPLEMENT ME) </h1>";
    //open connection to the database and check if username exist in the database
    //if it does, check if the password is the same with what is given
    //if true then set user session for the user and redirect to the dasbboard

    $sql = "SELECT * FROM `students` WHERE `Email`='$email' AND `password`='$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
     session_start();
     while($data = mysqli_fetch_assoc($result)){
      
        $_SESSION['username']=$data['Full_names'];
         header('location: ../dashboard.php');
         exit();
     }
    }else{
        //wrong uername or password
        header('location: ../forms/login.html');
        exit();

    }
}


function resetPassword($email, $password){
    //create a connection variable using the db function in config.php
    $conn = db();
   // echo "<h1 style='color: red'>RESET YOUR PASSWORD (IMPLEMENT ME)</h1>";
    //open connection to the database and check if username exist in the database
    //if it does, replace the password with $password given
    $sql = "SELECT * FROM `students` WHERE `Email`='$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
    $sql = "UPDATE `students` SET `password`='$password' WHERE `Email`='$email'";
    $result = mysqli_query($conn, $sql);
    echo "<script>alert('Password updated successfully')</script>";
    
}else{
        echo "<script>alert('User does not exist')</script>";
    }

}

function getusers(){
    $conn = db();
    $sql = "SELECT * FROM Students";
    $result = mysqli_query($conn, $sql);
    echo"<html>
    <head></head>
    <body>
    <center><h1><u> ZURI PHP STUDENTS </u> </h1> 
    <table border='1' style='width: 700px; background-color: magenta; border-style: none'; >
    <tr style='height: 40px'><th>ID</th><th>Full Names</th> <th>Email</th> <th>Gender</th> <th>Country</th> <th>Action</th></tr>";
    if(mysqli_num_rows($result) > 0){
        while($data = mysqli_fetch_assoc($result)){
            //show data
            echo "<tr style='height: 30px'>".
                "<td style='width: 50px; background: blue'>" . $data['Id'] . "</td>
                <td style='width: 150px'>" . $data['Full_names'] .
                "</td> <td style='width: 150px'>" . $data['Email'] .
                "</td> <td style='width: 150px'>" . $data['Gender'] . 
                "</td> <td style='width: 150px'>" . $data['Country'] . 
                "</td>
                <form action='action.php' method='post'>
                <input type='hidden' name='id'" .
                 "value=" . $data['Id'] . ">".
                "<td style='width: 150px'> <button type='submit', name='delete'> DELETE </button>".
                "</tr>";
        }
        echo "</table></table></center></body></html>";
    }
    //return users from the database
    //loop through the users and display them on a table
}

 function deleteaccount($id){
     $conn = db();
     //delete user with the given id from the database

     $sql = "DELETE FROM `students` WHERE `Id`='$id'";

     $result = mysqli_query($conn, $sql);
     header('location:../php/action.php?all=');
 }
