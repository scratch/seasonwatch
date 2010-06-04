<?php 
include '../includes/dbc.php';
page_protect();

$speciesID=($_GET['speciesid']);
//echo $speciesID;


$sql1 = "DELETE FROM Species_master 
               WHERE species_id= '$speciesID'";  
echo "sql1";
mysql_query($sql1,$link)or die("Insertion Failed:" .mysql_error()); 
mysql_close($link);
?> 
 
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<title>SeasonWatch</title>
<script>
window.location.href="listspecies.php";
</script>
</head>
<body>
Successfully Deleted. Close this box to continue.
   
</body>
</html>



