<?php 
include '../includes/dbc.php';
//print_r($HTTP_POST_VARS);

$userId=($_POST['user_id']);
//echo $userId; 

if($_POST['doUpdate'] == 'Update') 
{                      $sql1 = "UPDATE users SET                                             
                `full_name`= '$_POST[full_name]',
                `user_name`='$_POST[user_name]',
       		    `user_email`= '$_POST[user_email]',
	             `address`='$_POST[address]',
	             `address1` = '$_POST[address1]',
					 `address2` = '$_POST[address2]', 
					 `city` ='$_POST[city]',
					 `district` ='$_POST[district]',
					 `state`= '$_POST[state]'
				WHERE user_id='$userId'";
		
		
		//echo "sql1"; 
mysql_query($sql1,$link)or die("Insertion Failed:" .mysql_error()); 
} 
mysql_close($link);
?>									                  
              
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<title>SeasonWatch</title>
</head>

<body>
Successfully Edited. Close this box to continue.
</body>
</html> 
