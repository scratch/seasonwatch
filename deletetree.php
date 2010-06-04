<?php 
include './includes/dbc.php';
mysql_select_db("ncbs_test");
page_protect();
//print_r($HTTP_POST_VARS);

$usertreeid=($_GET['usertreeid']);
//echo $treeid;

$sql1 = "DELETE FROM user_tree_table 
               WHERE user_tree_id= '$usertreeid'";  
//echo "sql1";
mysql_query($sql1,$link)or die("Insertion Failed:" .mysql_error()); 
mysql_close($link);
//echo "ID of last inserted record is: " . mysql_insert_id();
//$tree_id = mysql_insert_id();
//echo "$tree_id";
?> 
 
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<title>SeasonWatch</title>
</head>

<body>
<?php
echo "<div class='notice'>Please choose a location only from India</div>";
?>
</body>
</html>



