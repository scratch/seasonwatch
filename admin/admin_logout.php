<?php
session_start(); 
/************ Delete the sessions****************/
unset($_SESSION['user_admin']);
header("Location: index.php");

?>