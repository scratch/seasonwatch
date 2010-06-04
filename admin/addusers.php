<?php 
include '../includes/dbc.php';

if($_POST['doAdd'] == 'Add') 
{ 
/******************* Filtering/Sanitizing Input *****************************
This code filters harmful script code and escapes data of all POST data
from the user submitted form.
*****************************************************************/
foreach($_POST as $key => $value) {
	$data[$key] = filter($value);
}
  
/************************ SERVER SIDE VALIDATION **************************************/
/********** This validation is useful if javascript is disabled in the browswer ***/

if(empty($data['full_name']) || strlen($data['full_name']) < 4)
{
$err = urlencode("ERROR: Invalid name. Please enter atleast 3 or more characters for your name");
header("Location: addusers.php?msg=$err");
exit();
}

// Validate User Name
if (!isUserID($data['user_name'])) {
$err = urlencode("ERROR: Invalid user name. It can contain alphabet, number and underscore.");
header("Location: addusers.php?msg=$err");
exit();
}

// Validate Email
if(!isEmail($data['usr_email'])) {
$err = urlencode("ERROR: Invalid email.");
header("Location: addusers.php?msg=$err");
exit();
}
// Check User Passwords
if (!checkPwd($data['pwd'],$data['pwd2'])) {
$err = urlencode("ERROR: Invalid Password or mismatch. Enter 3 chars or more");
header("Location: addusers.php?msg=$err");
exit();
}
	  
$user_ip = $_SERVER['REMOTE_ADDR'];

// stores md5 of password
$md5pass = md5($data['pwd']);
// Automatically collects the hostname or domain  like example.com) 
$host  = $_SERVER['HTTP_HOST'];
$host_upper = strtoupper($host);
$path   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

// Generates activation code simple 4 digit number
//$activ_code = rand(1000,9999);

$usr_email = $data['usr_email'];
$user_name = $data['user_name'];

/************ USER EMAIL CHECK ************************************
This code does a second check on the server side if the email already exists. It 
queries the database and if it has any existing email it throws user email already exists
*******************************************************************/

$rs_duplicate = mysql_query("select count(*) as total from users where user_email='$usr_email' OR user_name='$user_name'") or die(mysql_error());
list($total) = mysql_fetch_row($rs_duplicate);

if ($total > 0)
{
$err = urlencode("ERROR: The username/email already exists. Please try again with different username and email.");
header("Location: addusers.php?msg=$err");
exit();
}
/***************************************************************************/

$sql_insert = "INSERT into `users`
  			(`full_name`,`user_email`,`pwd`,`address`,
  			`address1`,`address2`,`city`,`district`,`zip`,`landline_stdcode`,
  			`landline_num`,`mobile`,`date`,`users_ip`,`state_id`,`user_name`
			)
		    VALUES
		    ('".addslashes($data[full_name])."','".addslashes($usr_email)."','$md5pass',
		    '".addslashes($data[address])."','".addslashes($data[address1])."','".addslashes($data[address2])."',
		    '".addslashes($data[city])."','".addslashes($data[dist])."','".addslashes($data[zip])."','".addslashes($data[landline_stdcode])."','".addslashes($data[landline_num])."',
		    '".addslashes($data[mobile])."',now(),'$user_ip','$data[state_id]','".addslashes($user_name)."')
			";

mysql_query($sql_insert,$link) or die("Insertion Failed:" . mysql_error());
$user_id = mysql_insert_id($link);  
$md5_id = md5($user_id);
mysql_query("update users set md5_id='$md5_id' where user_id='$user_id'");
//echo "<h3>Thank You</h3> We received your submission.";

$message = 
"Thank you for registering with NCBS. Here are your login details...\n

User ID: $user_name
Email: $usr_email \n 
Passwd: $data[pwd] \n

// Activation code: $activ_code \n 

*****ACTIVATION LINK*****\n
//http://$host$path/activate.php?user=$md5_id&activ_code=$activ_code

Thank You

Administrator
$host_upper
______________________________________________________
THIS IS AN AUTOMATED RESPONSE. 
***DO NOT RESPOND TO THIS EMAIL****
";

	mail($usr_email, "Login Details", $message,
    "From: \"Member Registration\" <auto-reply@$host>\r\n" .
     "X-Mailer: PHP/" . phpversion());


/********************* SMTP EMAIL WITH PHPMAILER LIBRARY *********************
i have heard lots of complaints that users not able to receive email using mail() function
so i am using alternate SMTP emailing which is quite fast and reliable. Before you use this you should
create POP/SMTP email in your hosting account 

This script needs class.phpmailer.php and class.smtp.php files from PHPMailer library.
Download here: http://phpmailer.sourceforge.net
********************************************************************************/

/*
require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();        
$mail->Host = $smtp_host;
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = $smtp_user;  // SMTP username
$mail->Password = $smtp_passwd; // SMTP password


$mail->From     = $smtp_from;
$mail->FromName = $smtp_from_name;
$mail->AddAddress($usr_email);

$mail->Subject  = $smtp_subject;
$mail->Body     = $message;
$mail->WordWrap = 50;

$mail->Send();
*/
  header("Location: thankyou.php");  
  exit();
	 
	 } 
?>



<html>
<head>
<title>Add new User</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
<script language="JavaScript" type="text/javascript" src="../js/jquery.validate.js"></script>

<script>
$(document).ready(function(){
$.validator.addMethod("username", function(value, element) {
return this.optional(element) || /^[a-z0-9\_]+$/i.test(value);
}, "Username must contain only letters, numbers, or underscore.");
$("#addusersForm").validate();
});
</script>
</head>
<body>
<link media="screen, projection" type="text/css" href="../blueprint/screen.css" rel="stylesheet"></link>
<link media="print" type="text/css" href="../blueprint/print.css" rel="stylesheet"></link>
<link media="screen, projection" type="text/css" href="../blueprint/plugins/fancy-type/screen.css" rel="stylesheet"></link>
<link type="text/css" href="../css/styles_new.css" rel="stylesheet"></link>
<!--<link rel="stylesheet" href="../css/styles.css" type="text/css">-->




<div class="container first_image" style="-moz-border-radius-bottomleft: 10px; -moz-border-radius-bottomright: 10px;">
<table>
<tbody>
<tr>
<td/>
</tr>
</tbody>
</table>
<div>
<hr/>
</div>

<table style="width: 930px; margin-left: auto; margin-right: auto;">
<tbody>

<tr>
<td>
<a href="admin.php" title="species_page">
<img alt="" src="./images/cpanel.png" />cpanel</a>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
</td>

<td>
<!-- <a href="newuser.php">Create User</a><br>
<a href="admin_ban.php">Ban/Unban </a><br>-->
<a href="species_page.php" title="species_page">
<img alt="" src="./images/addedit.png" />Add new species</a>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
</td>

<td>
<a href="listspecies.php" title="species_page">
<img alt="" src="./images/address_f2.png" />All Species List</a>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
</td>

<td>
<a href="listusers.php" title="species_page">
<img alt="" src="./images/icon-48-user.png" />User Manager</a>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
</td>

<td>
<a href="admin_logout.php" title="species_page">
<img alt="" src="./images/logout.png" />Logout</a>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
</td>

<td width="10%"><h2>Administration Page</h2></td>
</tr> 
</table>


<link type="text/css" href="../css/register.css" rel="stylesheet"></link>
<style>
.error { color: red; font-weight:normal }
</style>

<table width="100%" border="0" cellspacing="0" cellpadding="5" class="main" align="left">
<tr> 
<td colspan="3">&nbsp;</td>
</tr>
<tr> 
<td width="160" valign="top"><p>&nbsp;</p>
     <p>&nbsp; </p>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
     <p>&nbsp;</p></td> 
<td width="732" valign="top"><p>
    <? 
	 if (isset($_GET['done'])) {
	  echo "<h2>Thank you</h2> User has been added successfully and you can <a href=\"login.php\">login here</a>";
	  exit();
	  }
	?></p>
      <h3 class="titlehdr">Add User Form</h3>
      <p>Please Add a new user account,Please note that fields marked <span class="required">*</span> 
        are required.</p>
	 <?	
      if (isset($_GET['msg'])) {
	  $msg = mysql_real_escape_string($_GET['msg']);
	  echo "<div class=\"msg\">$msg</div>";
	  }
	  if (isset($_GET['done'])) {
	  echo "<div><h2>Thank you</h2> User has been added successfully and you can <a href=\"login.php\">login here</a></div>";
	  exit();
	  }
	  
	  ?> 
	  <br>
	
<form action="addusers.php" method="post" name="addusersForm" id="addusersForm">
<table class="register" cellspacing="2" cellpadding="2">
<tbody>

<tr>
<td align="right" style="color: red; font-weight: bold;"> </td>
</tr>

<tr>
<td>Your Full Name</td>
<td>
<input name="full_name" type="text" id="full_name" value="<?php echo $_POST['full_name'];?>"  size="40" class="required"/>
</td>
</tr>

<tr> 
<td>Username<span class="required"><font color="#CC0000">*</font></span></td>
<td><input name="user_name" type="text" id="user_name" class="required username" minlength="5" > 
<input name="btnAvailable" type="button" id="btnAvailable" 
onclick='$("#checkid").html("Please wait..."); $.get("checkuser.php",{ cmd: "check", user: $("#user_name").val() } ,function(data){  $("#checkid").html(data); });'
value="Check Availability"> 
<span style="color:red; font: normal 12px verdana; " id="checkid" ></span> 
</td>
</tr>

<tr> 
<td>Email Address<span class="required"><font color="#CC0000">*</font></span> 
</td>
<td><input name="usr_email" type="text" id="usr_email3" class="required email" autocomplete="off"> 
<!-- <span class="example">* Please enter a Valid email</span> -->
</td>
</tr>

<tr> 
<td>Enter a Password<span class="required"><font color="#CC0000">*</font></span> 
</td>
<td><input name="pwd" type="password" autocomplete="off" class="required password" minlength="5" id="pwd"> 
<!-- <span class="example">* 5 chars minimum</span> -->
</td>
</tr>
<tr> 
<td>Reenter the Password<span class="required"><font color="#CC0000">*</font></span> 
</td>
<td><input name="pwd2"  id="pwd2" class="required password" type="password" minlength="5" equalto="#pwd"></td>
</tr> 
<tr>
<td align="right">Mailing Address </td>
<td>
<input type="text" name="address" id="address"/>
</td>
</tr>
<tr>
<td align="right">Address (line 2) (optional)</td>
<td>
<input type="text" name="address1"/>
</td>
</tr>
<tr>
<td align="right">Address (line 3) (optional)</td>
<td>
<input type="text" name="address2"/>
</td>
</tr>
<tr>
<td align="right">City/Town/Village<font color="#CC0000">*</font></td>
<td>
<input type="text" id="city" name="city" class="required"/>
</td>
</tr>
<tr>
<td align="right">District<font color="#CC0000">*</font> </td>
<td>
<input type="text" id="dist" name="dist" class="required"/>
</td>
</tr>
<tr>
<td>State or Union Territory<font color="#CC0000">*</font> </td>
<td>
<select id="state" name="state" class="required" ><?php
$result= mysql_query("SELECT * FROM seswatch_states ORDER BY state_id");
echo "<option value='' SELECTED>------Choose your State------</option>";
while($nt=mysql_fetch_array($result))
{
echo "<option value=$nt[state_id]>$nt[state]</option>";
} 
echo "</select>";
?>
</td>
</tr>

<tr>
<td>Country</td>
<td>
<input class="" type="text" value="India" name="country"/>
</td>
</tr>

<tr>
<td align="right">Post code (PIN code)</td>
<td>
<input type="text" name="zip"/>
</td>
</tr>


<tr>
<td align="right">Landline phone</td>
<td align="left">
STD<input type="text" name="landline_stdcode" style="width: 50px;"/>
&nbsp;-&nbsp;<input type="text" name="landline_num" style="width:108px;"/>
</td>
</tr>

<tr>
<td align="right">Mobile</td>
<td>
<input type="text" name="mobile"/>
</td>
</tr>

</tbody>
</table>
<p align="center">
<input name="doAdd" type="submit" id="doAdd" value="Add">
<input type=reset  value="Clear"  class=buttonstyle>
<input type=reset  value="Cancel"  class=buttonstyle onclick="javascript:window.location.href='admin.php';">
</p>
</form>
<p align="right"><span style="font: normal 9px verdana">Seasonwatch Page <a href="http://www.ncbs.res.in/"> NCBS </a></span></p>


</td> 
<td width="196" valign="top">&nbsp;</td>
</tr>
<tr> 
<td colspan="3">&nbsp;</td>
</tr>
</table>
</form>
</div>
</div>
</div>
<?php mysql_close($link);?>
</body>
</html>
