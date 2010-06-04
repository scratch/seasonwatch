<?php 
include './includes/dbc.php';
page_protect();


?>
<html>
<head>
<title>Contributor Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="./css/styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="main">
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr> 
    <td width="160" valign="top">
<? 
/*********************** MYACCOUNT MENU ****************************
This code shows my account menu only to logged in users. 
Copy this code till END and place it in a new html or php where
you want to show myaccount options. This is only visible to logged in users
*******************************************************************/
if (isset($_SESSION['user_id'])) {?>
<div class="myaccount">
  <p><strong>My Account</strong></p>
 <!-- <a href="myaccount.php">My Account</a><br> -->
  <a href="mysettings.php">Settings</a><br>
  <a href="editcontrib.php">Tree Details</a><br>
  <a href="logout.php">Logout </a>
  <p>You can add more links here for users</p></div>
<? } 
/*******************************END**************************/
?>
      <p>&nbsp; </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="732" valign="top"><p>&nbsp;</p>
      <h3 class="titlehdr">Welcome <? echo $_SESSION['user_name'];?></h3>  
	  <?	
      if (isset($_GET['msg'])) {
	  echo "<div class=\"error\">$_GET[msg]</div>";
	  }
	  	  
	  ?>
      <p>This is the my account page</p>

	 
      </td>
    <td width="196" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
</table>

</body>
<?php mysql_close($link);?>
</html>
