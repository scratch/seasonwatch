<?php 

include './includes/dbc.php';
					 
if($_POST['doRegister'] == 'Register') 
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
header("Location: register.php?msg=$err");
exit();
}

// Validate User Name
if (!isUserID($data['user_name'])) {
$err = urlencode("ERROR: Invalid user name. It can contain alphabet, number and underscore.");
header("Location: register.php?msg=$err");
exit();
}

// Validate Email
if(!isEmail($data['usr_email'])) {
$err = urlencode("ERROR: Invalid email.");
header("Location: register.php?msg=$err");
exit();
}
// Check User Passwords
if (!checkPwd($data['pwd'],$data['pwd2'])) {
$err = urlencode("ERROR: Invalid Password or mismatch. Enter 3 chars or more");
header("Location: register.php?msg=$err");
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
$activ_code = rand(1000,9999);

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
header("Location: register.php?msg=$err");
exit();
}
/***************************************************************************/

$sql_insert = "INSERT into `users`
  			(`full_name`,`user_email`,`pwd`,`address`,`tel`,`date`,`users_ip`,`activation_code`,`state`,`user_name`
			)
		    VALUES
		    ('$data[full_name]','$usr_email','$md5pass','$data[address]','$data[tel]'
			,now(),'$user_ip','$activ_code','$data[state]','$user_name'
			)
			";

mysql_query($sql_insert,$link) or die("Insertion Failed:" . mysql_error());
$user_id = mysql_insert_id($link);  
$md5_id = md5($user_id);
mysql_query("update users set md5_id='$md5_id' where id='$user_id'");
//	echo "<h3>Thank You</h3> We received your submission.";

$message = 
"Thank you for registering with NCBS. Here are your login details...\n

User ID: $user_name
Email: $usr_email \n 
Passwd: $data[pwd] \n
Activation code: $activ_code \n

*****ACTIVATION LINK*****\n
http://$host$path/activate.php?user=$md5_id&activ_code=$activ_code

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
<title>PHP Login :: Free Registration/Signup Form</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script language="JavaScript" type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script language="JavaScript" type="text/javascript" src="js/jquery.validate.js"></script>

  <script>
  $(document).ready(function(){
    $.validator.addMethod("username", function(value, element) {
        return this.optional(element) || /^[a-z0-9\_]+$/i.test(value);
    }, "Username must contain only letters, numbers, or underscore.");

    $("#regForm").validate();
  });
  </script>

<link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<img style="border-style: none;" alt="SeasonWatch banner" src="images/mainimage.png" usemap="#mainImg"><br>
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="main">
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
	  echo "<h2>Thank you</h2> Your registration is now complete and you can <a href=\"login.php\">login here</a>";
	  exit();
	  }
	?></p>
      <h3 class="titlehdr">Participant Registration Form</h3>
      <p>Please register a free account,Please note that fields marked <span class="required">*</span> 
        are required.</p>
	 <?	
      if (isset($_GET['msg'])) {
	  $msg = mysql_real_escape_string($_GET['msg']);
	  echo "<div class=\"msg\">$msg</div>";
	  }
	  if (isset($_GET['done'])) {
	  echo "<div><h2>Thank you</h2> Your registration is now complete and you can <a href=\"login.php\">login here</a></div>";
	  exit();
	  }
	  
	  ?> 
	  <br>
      <form action="register.php" method="post" name="regForm" id="regForm" >
        <table width="95%" border="0" cellpadding="3" cellspacing="3" class="forms">
</tr>
		<tr><td bgcolor="dedede" colspan=2><b>Personal Details</b></td></tr>
		<tr>
          
          <tr> 
            <td colspan="2">Your Full Name<span class="required"><font color="#CC0000">*</font></span><br> 
              <input name="full_name" type="text" id="full_name" size="40" class="required"></td>
          </tr>

          <tr> 
            <td>Username<span class="required"><font color="#CC0000">*</font></span></td>
            <td><input name="user_name" type="text" id="user_name" class="required username" minlength="5" > 
              <input name="btnAvailable" type="button" id="btnAvailable" 
			  onclick='$("#checkid").html("Please wait..."); $.get("checkuser.php",{ cmd: "check", user: $("#user_name").val() } ,function(data){  $("#checkid").html(data); });'
			  value="Check Availability"> 
			    <span style="color:red; font: bold 12px verdana; " id="checkid" ></span> 
            </td>
          </tr>
          <tr> 
            <td>Email Address<span class="required"><font color="#CC0000">*</font></span> 
            </td>
            <td><input name="usr_email" type="text" id="usr_email3" class="required email"> 
              <span class="example">* Valid email please..</span></td>
          </tr>
          <tr> 
            <td>Enter a Password<span class="required"><font color="#CC0000">*</font></span> 
            </td>
            <td><input name="pwd" type="password" class="required password" minlength="5" id="pwd"> 
              <span class="example">* 5 chars minimum..</span></td>
          </tr>
          <tr> 
            <td>Reenter the Password<span class="required"><font color="#CC0000">*</font></span> 
            </td>
            <td><input name="pwd2"  id="pwd2" class="required password" type="password" minlength="5" equalto="#pwd"></td>
          </tr> 
          <tr> 
            <td colspan="2">&nbsp;</td>
          </tr>         
<tr> 
            <td colspan="2"><h4><strong>Where do you live</strong></h4></td>
          </tr>
          
         <tr> 
            <td colspan="2">Contact Address (with ZIP)<span class="required"><font color="#CC0000">*</font></span><br> 
              <textarea name="address" cols="40" rows="4" id="address" class="required"></textarea> 
              <span class="example">Valid Contact Details</span> </td>
          </tr>           
          
                    <tr> 
            <td>State<font color="#CC0000">*</font></span></td>
            <td><select name="state" class="required" id="select8">
                <option value="" selected></option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                <option value="Daman and Diu">Daman and Diu</option>
                <option value="Delhi">Delhi </option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Orissa">Orissa</option>
                <option value="Puducherry">Puducherry</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
                <option value="Not In India">Not In India</option>
                </select>          
            </td>
          </tr>
         <tr><td align=left>Country<font color="#CC0000">*</font></td>
			<td>
				<input type=text name=country size=20 value = "India" /> 
			</td>

		</tr>
          <tr> 
            <td>Phone<span class="required"><font color="#CC0000">*</font></span> 
            </td>
            <td><input name="tel" type="text" id="tel" class="required"></td>
          </tr>
          
          <tr> 
            <td colspan="2">&nbsp;</td>
          </tr>
          
         
          <tr> 
            <td colspan="2">&nbsp;</td>
          </tr>
          
        </table>
        <p align="center">
          <input name="doRegister" type="submit" id="doRegister" value="Register">
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

</body>
</html>
