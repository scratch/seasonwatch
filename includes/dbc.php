<?php
/******************** MAIN SETTINGS - PHP LOGIN SCRIPT V2.1 **********************
Please complete wherever marked xxxxxxxxx
**********************************************************************************/

/************* MYSQL DATABASE SETTINGS *****************
1. Specify Database name in $dbname
2. MySQL host (localhost or remotehost)
3. MySQL user name with ALL previleges assigned.
4. MySQL password

Note: If you use cpanel, the name will be like account_database
*************************************************************/
$dbname = 'ncbs_test';
$link = mysql_connect("localhost","root","dbpass01") or die("Couldn't make connection.");
$db = mysql_select_db($dbname, $link) or die("Couldn't select database");

/*****************ADMIN SECTION PASSWORD***************************/
/****** SET A STRONG PASSWORD WITH ATLEAST 6-8 CHARS***************/
$admin_user = 'admin';
$admin_pass = 'admin';

/*************** reCAPTCHA KEYS****************/
$publickey = "xxxxxxxxxxxxxxxxxxxxxxx";
$privatekey = "xxxxxxxxxxxxxxxxxxxx";

/**************** EMAIL SETTINGS **************************
This script needs class.phpmailer.php and class.smtp.php files from PHPMailer library.
Download here: http://phpmailer.sourceforge.net

Upload class.phpmailer.php and class.smtp.php to your phplogin script folder.

1. Create email account for auto-reply@domain.com in your hosting account. Specify here
2. Enter SMTP hostname 
3. Enter SMTP password
4. Specify FROM email addres, 
5. Specify FROM label and subject (optional).
***********************************************************/
/* DISABLED
$smtp_host = "xxxxxxxxxxxx";  // SMTP server Example: mail.example.com
$smtp_user = "xxxxxxxxxxxxxx";  // SMTP Username - Example: auto-reply@domain.com
$smtp_passwd = "xxxxxxxxxxxx"; // SMTP password

$smtp_from     = "xxxxxxxxxxxxx"; // Example: auto-reply@example.com
$smtp_from_name = "Member Registration"; // Label for FROM address
$smtp_subject = "Login Details"; // Message Subject
*/

/**** PAGE PROTECT CODE  ********************************
This code protects pages to only logged in users. If users have not logged in then it will redirect to login page.
If you want to add a new page and want to login protect, COPY this from this to END marker.
Remember this code must be placed on very top of any html or php page.
********************************************************/
function page_protect() {
session_start();

//check for cookies

if(isset($_COOKIE['user_id']) && isset($_COOKIE['user_name'])){
      $_SESSION['user_id'] = $_COOKIE['user_id'];
      $_SESSION['user_name'] = $_COOKIE['user_name'];
   }


if (!isset($_SESSION['user_id']))
{
header("Location: login.php");
}
/*******************END********************************/
}


function filter($data) {
	$data = trim(htmlentities(strip_tags($data)));
	
	if (get_magic_quotes_gpc())
		$data = stripslashes($data);
	
	$data = mysql_real_escape_string($data);
	
	return $data;
}



function EncodeURL($url)
{
$new = strtolower(ereg_replace(' ','_',$url));
return($new);
}

function DecodeURL($url)
{
$new = ucwords(ereg_replace('_',' ',$url));
return($new);
}

function ChopStr($str, $len) 
{
    if (strlen($str) < $len)
        return $str;

    $str = substr($str,0,$len);
    if ($spc_pos = strrpos($str," "))
            $str = substr($str,0,$spc_pos);

    return $str . "...";
}	

function isEmail($email){
  return preg_match('/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU', $email) ? TRUE : FALSE;
}

function isUserID($username)
{
	if (preg_match('/^[a-z\d_]{5,20}$/i', $username)) {
		return true;
	} else {
		return false;
	}
 }	
 
function isURL($url) 
{
	if (preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $url)) {
		return true;
	} else {
		return false;
	}
} 

function checkPwd($x,$y) 
{
if(empty($x) || empty($y) ) { return false; }
if (strlen($x) < 4 || strlen($y) < 4) { return false; }

if (strcmp($x,$y) != 0) {
 return false;
 } 
return true;
}

?>
