<?php 
include './includes/dbc.php';
mysql_select_db("ncbs_test");
page_protect();
//print_r($HTTP_POST_VARS);
?>
 
<!--delete code from user-->
<?php 
if($_GET['id']!= "")
{ 
$usertreeid=($_GET['id']);  
$observationid=($_GET['observationId']);
//echo observationid;

$sql1 = "DELETE FROM user_tree_observations
               WHERE user_tree_id= '$usertreeid' AND observation_id='$observationid'";  
//echo "sql1";
mysql_query($sql1,$link)or die("Insertion Failed:" .mysql_error()); 
echo  "<div class=\"notice\">Successfully Deleted</div>";
} 
?> 
 
 
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<title>Edit Observation</title>
<link type="text/css" rel="stylesheet" href="js/thickbox/thickbox.css"></link>
<script language="javascript" src="js/thickbox/thickbox.js"></script>
<link rel="stylesheet" href="blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="blueprint/print.css" type="text/css" media="print">
<link rel="stylesheet" href="blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<link rel="stylesheet" href="css/styles_new.css" type="text/css">
<link type="text/css" rel="stylesheet" href="js/thickbox/thickbox.css"></link>
<script language="javascript" src="js/thickbox/thickbox.js"></script>
<link type="text/css" href="js/calendar/themes/blitzer/ui.datepicker.css" rel="stylesheet" />
<script language="javascript" src="js/calendar/ui/ui.core.js"></script>
<script language="javascript" src="js/calendar/ui/ui.datepicker.js"></script>
<link type="text/css" href="js/calendar/demos.css" rel="stylesheet" />



<!--datepicker Script-->
<script type="text/javascript">
$(function() {
$("#obdate").datepicker({minDate: -120, maxDate: '0M +0D', dateFormat: 'yy-mm-dd'});
});

$(function() {
$("#obdate1").datepicker({minDate: -120, maxDate: '0M +0D', dateFormat: 'yy-mm-dd'});
});

</script>


<script type = "text/javascript">
function confirmDelete(delUrl,observationid) {
  if (confirm("Are you sure you want to delete")) {
// alert(observationid);
 	url = 'listobservations.php?id='+delUrl+'&observationId='+observationid; 
 	//alert(url);
   window.document.location = url;
  }
else
{
url = 'listobservations.php';
 window.document.location = url;
}
}
</script>
<?php 
include ("contribheader_head.php");
?>

</head>

<body>
<?php 
include ("contribheader_body.php");
?>

<div class="container first_image" style="-moz-border-radius-bottomleft: 10px; -moz-border-radius-bottomright: 10px;">
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

<table>
<tr>

<td>
<p>Filter by Tree Name</p>
<form method="POST" action=<?php echo $_SERVER['PHP_SELF'];?> name="filterform"> 
<?php

$sql=mysql_query("SELECT DISTINCT(species_primary_common_name), Species_master.species_id FROM Species_master JOIN (trees, user_tree_table) ON trees.tree_id = user_tree_table.tree_id AND trees.species_id = Species_master.species_id AND user_tree_table.user_id = '$_SESSION[user_id]'");

$data1="<SELECT name=species_control>";
while($row=mysql_fetch_array($sql))
{
$data1 .= "<option value=".$row['species_id'].">".$row['species_primary_common_name']."</option>";
}
$data1 .= "</select>";
echo $data1;
?>
<input type="submit"  name="Submit" id="Submit" value="Submit" class=buttonstyle> 
</td>
</form>

<td>
<div>Filter By Date</div>
<form method="POST" action="datefilter.php" name="filterform1"> 
<div class="demo">
From-:<input id="obdate" name="obdate" type="text"/>
</div>
<div style="display: none;" class="demo-description">
</div>
</td>
<td>
<div class="demo1">
To-:<input id="obdate1" name="obdate1" type="text"/>
</div>
<div style="display: none;" class="demo-description">
</div>
</td>
<td>
<input type="submit"  name="Submit" id="Submit" value="Submit" class=buttonstyle> 
</td>
</tr>
</table>
</form>




<table id="table1" class="tablesorter" cellspacing="0" cellpadding="3" style="width: 930px; margin-left: auto; margin-right: auto;">
<colgroup>
<col style="width: 5px;"/>
<col style="width: 790px;"/>
<col style="width: 650px;"/>
<col style="width: 750px;"/>
<col style="width: 750px;"/>
<col style="width: 650px;"/>
<col style="width: 650px;"/>
<col style="width: 650px;"/>
<col style="width: 650px;"/>
</colgroup>
<thead>
<tr>
<th class="header">No</th>
<th class="header">Primary Common Name</th>
<th class="header">Tree Nickname</th>
<th class="header">Observation Date</th>
<th class="header">Is Leaf Fresh</th>
<th class="header">Is Flower Open</th>
<th class="header">Is Fruit Ripe</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody>

<?php 
$speciesid="";
$speciesid=$_POST['species_control'];
//echo $speciesid;
$count=0;
print "<tr class='delboxtr'>";

//$user_tree_table_settings = mysql_query("SELECT tree_nickname, tree_id FROM  user_tree_table WHERE user_id='".$_SESSION[user_id]."'");
if($speciesid=="")
{
$user_tree_table_settings = mysql_query("SELECT user_tree_table.user_tree_id,tree_nickname, 
user_tree_observations.observation_id, 
user_tree_observations.date,
is_leaf_fresh, is_flower_open, is_fruit_ripe, 
Species_master.species_primary_common_name 
FROM user_tree_observations 
INNER JOIN (users, user_tree_table, trees,Species_master) 
ON user_tree_table.user_tree_id = user_tree_observations.user_tree_id 
AND user_tree_table.user_id='$_SESSION[user_id]' 
AND users.user_id=user_tree_table.user_id 
AND user_tree_table.tree_id=trees.tree_id 
AND trees.species_id=Species_master.species_id  
ORDER BY user_tree_table.tree_id");
}
else
{
	$user_tree_table_settings = mysql_query("SELECT user_tree_table.user_tree_id,tree_nickname,
   user_tree_observations.observation_id,user_tree_observations.date, 
	is_leaf_fresh, is_flower_open, is_fruit_ripe,
	 Species_master.species_primary_common_name 
	   FROM user_tree_observations INNER JOIN (users, user_tree_table, trees,Species_master)
	   ON user_tree_table.user_tree_id = user_tree_observations.user_tree_id 
	   AND user_tree_table.user_id='$_SESSION[user_id]' 
	   AND users.user_id=user_tree_table.user_id 
	   AND user_tree_table.tree_id=trees.tree_id 
	   AND trees.species_id=Species_master.species_id
	   AND trees.species_id='$speciesid' 
       ORDER BY user_tree_table.tree_id");
} 
while ($row_settings = mysql_fetch_array($user_tree_table_settings)) 
{
print "<tr>";
$count++;  
print "<td style='width:220px'>".$count."</td>";
print "<td>".$row_settings['species_primary_common_name']."</td>";
print "<td>".$row_settings['tree_nickname']."</td>";

$printdate = date("d-m-Y",strtotime($row_settings['date']));
//echo $printdate;


print "<td>".$printdate. "</td>";
//print "<td>".$row_settings[observation_id]. "</td>";
//print "<td>".$row_settings['user_tree_id']. "</td>";

$fresh_status = $row_settings['is_leaf_fresh'];
if($fresh_status == '1')
{
$fresh_status = 'Yes';
}
else
{
if($fresh_status == '0')
{
$fresh_status = 'No';
}
else
$fresh_status='Dont know';
}
echo "<td>" . $fresh_status . "</td>";
//print "<td>".$row_settings['is_leaf_fresh']. "</td>";

$open_status = $row_settings['is_flower_open'];
if($open_status == '1')
$open_status = 'Yes';
else
if($open_status == '0')
$open_status = 'No';
else
if($open_status == '2')
$open_status = 'Dont know';
echo "<td>" . $open_status . "</td>";
//print "<td>".$row_settings['is_flower_open']. "</td>";


$ripe_status = $row_settings['is_fruit_ripe'];
if($ripe_status == '1')
$ripe_status = 'Yes';
else
if($ripe_status == '0')
$ripe_status = 'No';
else
if($ripe_status== '2')
$ripe_status = 'Dont know';

echo "<td>" . $ripe_status . "</td>";


//print "<td>".$row_settings['is_fruit_ripe']. "</td>";


$editobservationLink = "<a class=thickbox rel=gallery-plants href=\"editobservations.php?usertreeid=".$row_settings['user_tree_id']."&observationid=".$row_settings['observation_id']."&TB_iframe=true&height=500&width=700\">Edit</a>";

print "<td>$editobservationLink</td>";

$var=$row_settings['user_tree_id'];
$var1=$row_settings['observation_id'];
$deleteobservationLink = "<a  href='listobservations.php' onclick=confirmDelete('$var','$var1');>Delete</a>";
//$deletetreelink="<a class=thickbox href=\"deleteobservation.php?usertreeid=".$row_settings['user_tree_id']."&observationid=".$row_settings['observation_id']."&TB_iframe=true&height=500&width=700\">Delete</a>";
print "<td>$deleteobservationLink</td>";
print "</tr>";
}  
echo "</tbody></table>";
?>



<html> 
<p align="center"> 
<input name="doRefresh" type="button" id="doRefresh" value="Refresh All" onClick="location.reload();">
</p>
</div>
</div>
<div class="container bottom">
<?php mysql_close($link);?>
</div>
</body>
</html>



