<?php
session_start(); 
/************ Delete the sessions****************/
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);

/* Delete the cookies*******************/
setcookie("user_id", '', time()-60*60*24*60, "/");
setcookie("user_name", '', time()-60*60*24*60, "/");

session_unset();
/******************* After Logout set this to any redirect page you want*************/
header("Location: login.php");
?> 