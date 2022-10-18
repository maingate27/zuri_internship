<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

loginUser($email, $password);

}

function loginUser($email, $password){
 $fp=fopen("..\storage\users.csv",'r');

 $result=false;
while(($data=fgetcsv($fp,1000,','))!=false ){
    
    if ($data[1]==$email && $data[2]==$password) {
        session_start();
    $_SESSION["active_username"]=$data[0];
    $_SESSION["active_usermail"]=$data[1];
    header('location: ..\dashboard.php');
    $result=true;
    break;
    }
}

if ($result==false){
    header('location: ..\forms\login.html');
    exit();
}

}

