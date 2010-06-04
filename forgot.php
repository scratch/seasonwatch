<? 
include './includes/dbc.php';


/******************* ACTIVATION BY FORM**************************/
if ($_POST['doReset']=='Reset')
{
$user_email = mysql_real_escape_string($_POST['user_email']);

//check if activ code and user is valid as precaution
$rs_check = mysql_query("select id from users where user_email='$user_email'") or die (mysql_error()); 
$num = mysql_num_rows($rs_check);
  // Match row found with more than 1 results  - the user is authenticated. 
    if ( $num <= 0 ) { 
	$msg = urlencode("Error - Sorry no such account exists or registered.");
	header("Location: forgot.php?msg=$msg");
	exit();
	}
//generate 4 digit random number
$new = rand(1000,9999);
$md5_new = md5($new);	
//set update md5 of new password
$rs_activ = mysql_query("update users set pwd='$md5_new' WHERE 
						 user_email='$user_email'") or die(mysql_error());
						 
$host  = $_SERVER['HTTP_HOST'];
$host_upper = strtoupper($host);						 
						 
//send email

$message = 
"Here are your new password details ...\n
User Email: $user_email \n
Passwd: $new \n

Thank You

Administrator
$host_upper
______________________________________________________
THIS IS AN AUTOMATED RESPONSE. 
***DO NOT RESPOND TO THIS EMAIL****
";

	mail($user_email, "Reset Password", $message,
    "From: \"Member Registration\" <auto-reply@$host>\r\n" .
     "X-Mailer: PHP/" . phpversion());						 
						 
						 
						 
$msg = urlencode("Your account password has been reset and a new password has been sent to your email address.");
header("Location: forgot.php?msg=$msg");						 
exit();
}

?>
<html>
<head>
<title>Forgot Password</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script language="JavaScript" type="text/javascript" src="js/jquery.validate.js"></script>
  <script>
  $(document).ready(function(){
    $("#actForm").validate();
  });
  </script>
<link href="./css/styles_new.css" rel="stylesheet" type="text/css">
<?php
include("header_head.php");
?>
</head>


<body>
<link rel="stylesheet" href="blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="blueprint/print.css" type="text/css" media="print">
<link rel="stylesheet" href="blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<link rel="stylesheet" href="css/styles_new.css" type="text/css">
<?php
include("header_body.php");
?>
<div class="container first_image" style="-moz-border-radius-bottomleft: 10px; -moz-border-radius-bottomright: 10px;">
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
    <td width="732" valign="top">
<h3 class="titlehdr">Forgot Password</h3>

      <p> 
        <?
	  /******************** ERROR MESSAGES*************************************************
	  This code is to show error messages 
	  **************************************************************************/
      if (isset($_GET['msg'])) {
	  echo "<div class=\"msg\">$_GET[msg]</div>";
	  }
	  /******************************* END ********************************/	  
	  ?>
      </p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;
      <p>If you have forgot the account password, you can <strong>reset password</strong> 
        and a new password will be sent to your email address.</p>
	 
      <form action="forgot.php" method="post" name="actForm" id="actForm" >
        <table width="65%" border="0" cellpadding="4" cellspacing="4" class="loginform">
          <tr> 
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr> 
            <td width="36%">Your Email</td>
            <td width="64%"><input name="user_email" type="text" class="required email" id="txtboxn" size="25"></td>
          </tr>
          <tr> 
            <td colspan="2"> <div align="center"> 
                <p> 
                  <input name="doReset" type="submit" id="doLogin3" value="Reset">
                </p>
              </div></td>
          </tr>
        </table>
        <div align="center"></div>
        <p align="center">&nbsp; </p>
      </form>
	  
      <p>&nbsp;</p>
	   
      <p align="left">&nbsp; </p></td>
    <td width="196" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</div>
</div>
<div class="container bottom">
</div>
<?php mysql_close($link);?>
</body>
</html>
