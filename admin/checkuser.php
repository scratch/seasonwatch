<?php 

include '../includes/dbc.php';

if(isset($_GET['cmd']) && $_GET['cmd'] == 'check') {
$user = mysql_real_escape_string($_GET['user']);

if(empty($user) && strlen($user) <=3) {
echo "Enter 5 chars or more";
exit();
} 

$rs_duplicate = mysql_query("select count(*) as total from users where user_name='$user' ") or die(mysql_error());
list($total) = mysql_fetch_row($rs_duplicate);

	if ($total > 0)
	{
	echo "Not Available";
	} else { 
	echo "Available";
	}
}

mysql_close($link);
?>