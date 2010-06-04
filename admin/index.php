<?php
/* -- nk. Newly added; hypelink to "Create Species"
 */
 
include '../includes/dbc.php';

if($_POST['adminLogin'] == 'Login') {
$admin = mysql_real_escape_string($_POST['admin_user']);
$pass =  mysql_real_escape_string($_POST['admin_pass']);

 if(($admin_user == $admin) && ($admin_pass == $pass) ) {
session_start(); 
	   // this sets variables in the session 
$_SESSION['user_admin']= $admin;  
header("Location: admin.php");
}

 }

?>

<html>
<head>
<title>Admin Panel</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<p>&nbsp;</p>
  <form action="index.php" method="post" name="adminForm" id="adminForm" >
<table width="40%" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#bcddfa" class="loginform">
  <tr> 
    <td colspan="2"><div align="center">
          <h2><strong>Admin Control Panel</strong></h2>
        </div></td>
  </tr>
  <tr> 
    <td colspan="2"><div align="center"></div></td>
  </tr>
  <tr> 
      <td width="31%"><div align="center">Admin user</div></td>
    <td width="69%"><input name="admin_user" type="text" class="required email" id="txtbox" size="25"></td>
  </tr>
  <tr> 
    <td><div align="center">Password</div></td>
    <td><input name="admin_pass" type="password" class="required password" id="txtbox" size="25"></td>
  </tr>
  <tr> 
    <td colspan="2"><div align="center"></div></td>
  </tr>
  <tr> 
    <td colspan="2"> <div align="center"> 
          <p> 
            <input name="adminLogin" type="submit" id="doLogin3" value="Login">
          </p>
         <p><span style="font: normal 9px verdana">Seasonwatch Test <a href="http://localhost/seasonwatch"> 
                 NCBS</a></span></p>
      </div></td>
  </tr>
</table>
</form>
<?php mysql_close($link);?>
</body>
</html>
