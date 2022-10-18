<?php
session_start();
session_destroy();
header('location:../forms/login.html');

?>