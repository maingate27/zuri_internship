<?php


logout();


function logout(){
   session_destroy();
   header('location: ..\forms\login.html');
   exit();
}



