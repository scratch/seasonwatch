<?
session_start();
if(!isset($_SESSION['user_admin'])) {
header("Location: index.php");
exit();
}
?>
<title>Ban / Remove Bans</title><form name="form1" method="post" action="">
  <h3>Ban/Unban Users</h3>
  <p>To ban/unban multiple users type <strong>EMAILS</strong> separated by <strong>spaces. 
    </strong>Banned users will not be able to login.<strong> <br>
    </strong>To ban/unban a single user, just enter one email. </p>
  <p><strong>*Note:</strong> Once the user is banner, he/she will never be able 
    to register new account with same email address.</p>
  <p> 
    <textarea name="id" cols="40" id="id"></textarea>
  </p>
  <p> 
    <input type="submit" name="Submit" value="Ban">
    <input name="Submit" type="submit" id="Submit" value="Unban">
  </p>
</form>
<?php
include('../includes/dbc.php');

if (($_POST['Submit'] == 'Ban') )
{
$did = explode(' ',$_POST['user_id']);

	foreach ($did as $del)
	{
	if (!empty($del))
	{
	 mysql_query("update users set banned='1'
				  WHERE `user_email`='$del'
	 			   ",$link) or die("Failed:" . mysql_error());
		}		   
	 }
	 echo "done..";
 }
if (($_POST['Submit'] == 'Unban') )
{
$did = explode(' ',$_POST['user_id']);

	foreach ($did as $del)
	{
	if (!empty($del))
	{
	 mysql_query("update users set banned='0'
				  WHERE `user_email`='$del'
	 			   ",$link) or die("Failed:" . mysql_error());
		}		   
	 }
	 echo "<h3>done..</h3>";
 }
?>
<br>
Back to <a href="admin_main.php">Admin main</a>