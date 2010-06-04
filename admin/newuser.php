<?php 

session_start();
if(!isset($_SESSION['user_admin'])) {
header("Location: index.php");
exit();
} 

include '../includes/dbc.php';

if($_POST['doSubmit'] == 'Create')
{
$rs_dup = mysql_query("select count(*) as total from users where user_name='$_POST[user_name]' OR user_email='$_POST[user_email]'") or die(mysql_error());
list($dups) = mysql_fetch_row($rs_dup); 

if($dups > 0) {
	die("The user name or email already exists in the system");
	}

if(empty($_POST['pwd'])) {
 $pwd = rand(1000,9999);
 $md5pwd = md5($pwd);
 }  
 else 
 {
  $md5pwd = md5($_POST['pwd']);
  $pwd = $_POST['pwd'];
 }
 
mysql_query("INSERT INTO users (`user_name`,`user_email`,`pwd`,`approved`,`date`)
			 VALUES ('".addslashes($_POST[user_name])."','".addslashes($_POST[user_email])."','$md5pwd','1',now())
			 ") or die(mysql_error());  

$host  = $_SERVER['HTTP_HOST'];
$host_upper = strtoupper($host);
$login_path = @ereg_replace('admin','',dirname($_SERVER['PHP_SELF']));
$path   = rtrim($login_path, '/\\');

$message =  
"Thank you for registering with us. Here are your login details...\n
User Email: $_POST[user_email] \n
Passwd: $pwd \n
  
*****LOGIN LINK*****\n
http://$host$path/login.php

Thank You
 
Administrator
$host_upper
______________________________________________________
THIS IS AN AUTOMATED RESPONSE. 
***DO NOT RESPOND TO THIS EMAIL****
";
if($_POST['send'] == '1') {
 
	mail($_POST['user_email'], "Login Details", $message,
    "From: \"Member Registration\" <auto-reply@$host>\r\n" .
     "X-Mailer: PHP/" . phpversion()); 
 }
echo "User created....done"; 
}
?>
<h2>Create New User</h2>
<form name="form1" method="post" action="newuser.php">
  <p>User ID 
    <input name="user_name" type="text" id="user_name">
    (Type the username)</p>
  <p>Email 
    <input name="user_email" type="text" id="user_email">
  </p>
  <p>Password 
    <input name="pwd" type="text" id="pwd">
    (if empty a 4 digit code will be auto generated)</p>
  <p>
    <input name="send" type="checkbox" id="send" value="1" checked>
    Send Email</p>
  <p>
    <input name="doSubmit" type="submit" id="doSubmit" value="Create">
  </p>
</form> 
<p>&nbsp;</p>
