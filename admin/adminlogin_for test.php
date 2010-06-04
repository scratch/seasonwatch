<?php 
include("../includes/dbc.php");
if ($_POST['doLogin']=='go')
{
$user_email = mysql_real_escape_string($_POST['usr_email']);
$md5pass = md5(mysql_real_escape_string($_POST['pwd']));


if (strpos($user_email,'@') === false) {
    $user_cond = "user_email='$user_email'";
} else {
      $user_cond = "user_email='$user_email'";
    
}


$sql = "SELECT `user_id`,`full_name`,`user_role` FROM users WHERE 
           $user_cond
			AND `pwd` = '$md5pass'
			AND `user_role` = '1'
			"; 

			
$result = mysql_query($sql) or die (mysql_error()); 
$num = mysql_num_rows($result);
  // Match row found with more than 1 results  - the user is authenticated. 
    if ( $num > 0 ) { 
	
	list($user_id,$full_name) = mysql_fetch_row($result);

       
	   session_start(); 
	   // this sets variables in the session 
		$_SESSION['user_id']= $user_id;  
		$_SESSION['user_name'] = $full_name;
		
		//set a cookie witout expiry until 60 days
		
	   if(isset($_POST['remember'])){
				  setcookie("user_id", $_SESSION['user_id'], time()+60*60*24*60, "/");
				  setcookie("user_name", $_SESSION['user_name'], time()+60*60*24*60, "/");
				   }
		
			
		header("Location: admin.php");
		}
		else
		{
		$msg = urlencode("Invalid Login");
		header("Location: login.php?msg=$msg");
		}
		
}
					 
					 

?>
<html>
<head>
<title>Seasonwatch Admin Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script language="JavaScript" type="text/javascript" src="js/jquery.validate.js"></script>
  <script>
  $(document).ready(function(){
    $("#logForm").validate();
  });
  </script>
<link href="./css/styles.css" rel="stylesheet" type="text/css">

</head>
<body>
<link rel="stylesheet" href="../blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="../blueprint/print.css" type="text/css" media="print">
<link rel="stylesheet" href="../blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<link rel="stylesheet" href="../css/styles_new.css" type="text/css">

<div class="container first_image" style="-moz-border-radius-bottomleft: 5px; -moz-border-radius-bottomright: 5px;">
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

<table style="width: 400px; margin-left: auto; margin-right: auto;">

<!--
<tr> 
<td colspan="3">&nbsp;</td>
</tr>
-->
<tr> 
<td width="160" valign="top"><p>&nbsp;</p>
<p>&nbsp; </p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p></td>
<td width="732" valign="top"><p>&nbsp;</p>
<h3 class="titlehdr" align='left'>Admin Login 
</h3>  
<p>

<?php 

/******************** ERROR MESSAGES*************************************************
This code is to show error messages 
**************************************************************************/
      if (isset($_GET['msg'])) {
	  $msg = mysql_real_escape_string($_GET['msg']);
	  echo "<div class=\"msg\">$msg</div>";
	  }
	  /******************************* END ********************************/	  
	  ?></p>
      <form action="adminlogin.php" method="post" name="adminlogForm" id="adminlogForm" >
        <table width="65%" border="0" cellpadding="4" cellspacing="4" class="loginform">
          <tr> 
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr> 
            <td width="28%">Email</td>
            <td width="69%"><input name="usr_email" type="text" class="required email" id="txtbox" size="25"></td>
          </tr>
          <tr> 
            <td>Password</td>
            <td><input name="pwd" type="password" class="required password" id="txtbox" size="25"></td>
          </tr>
          <tr> 
      
          </tr>
          <tr> 
            <td colspan="2"> <div align="center"> 
                <p> 
                  <input name="doLogin" type="submit" id="doLogin3" value="go">
                </p>
                       </div></td>
          </tr>
        </table>
        <div align="center"></div>
        <p align="center">&nbsp; </p>
      </form>
      <p>&nbsp;</p>
	   
      </td>
    <td width="196" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</div>
</div>
</body>
</html>
