<?php 
include './includes/dbc.php';
mysql_select_db("ncbs_test");
page_protect();
//print_r($HTTP_POST_VARS);
?>
 
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<title>SeasonWatch</title>
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
<script type="text/javascript" src="js/calendar/jquery-1.3.2.js"></script>
<script language="javascript" src="js/calendar/ui/ui.core.js"></script>
<script language="javascript" src="js/calendar/ui/ui.datepicker.js"></script>
<link type="text/css" href="js/calendar/demos.css" rel="stylesheet" />

<!--check for responsibility-->
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script language="javascript" src="js/jquery.bgiframe.min.js"></script> 
<script language="javascript" src="js/jquery.autocomplete.js"></script>
<link type="text/css" rel="stylesheet" href="js/jquery.autocomplete.css"></link>
<script charset="utf-8" type="text/javascript" src="js/jquery.emptyonclick.js"></script>
<script type="text/javascript" src="js/jqModal.js"></script>
<script type="text/javascript" src="js/jquery.autogrow.js"></script>
<script type="text/javascript" src="js/jquery.corner.js"></script>

<!--datepicker Script-->
<script type="text/javascript">
$(function() {
$("#obdate").datepicker({minDate: -120, maxDate: '0M +0D'});
});

$(function() {
$("#obdate1").datepicker({minDate: -120, maxDate: '0M +0D'});
});

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


<table id="table1" class="tablesorter" cellspacing="0" cellpadding="3" style="width: 930px; margin-left: auto; margin-right: auto;">
<colgroup>
<col style="width: 5px;"/>
<col style="width: 840px;"/>
<col style="width: 600px;"/>
<col style="width: 750px;"/>
<col style="width: 750px;"/>
<col style="width: 780px;"/>
<col style="width: 700px;"/>
<col style="width: 650px;"/>
<col style="width: 650px;"/>
</colgroup>
<thead>
<tr>
<th class="header">No</th>
<th class="header">Primary Common Name</th>
<th class="header">Tree Nickname</th>
<th class="header">Observation Date</th>
<th class="header">Fresh Leaf Status</th>
<th class="header">Open Flower Status</th>
<th class="header">Ripe Fruit Status</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody>

<?php 
$start_date="";
$end_date=""; 
$start_date=date("Y-m-d",strtotime($_POST['obdate']));
//echo "$start_date\n";
$end_date=date("Y-m-d",strtotime($_POST['obdate1']));
//echo "$end_date\n"; 
//echo "$_SESSION[user_id]";
if($start_date=="$start_date" AND $end_date=="$end_date")
{
$user_tree_table_settings=mysql_query("SELECT user_tree_table.user_tree_id,tree_nickname,
  user_tree_observations.observation_id,user_tree_observations.date,
  is_leaf_fresh,
  is_flower_open, 
  is_fruit_ripe, 
  Species_master.species_primary_common_name 
  FROM user_tree_observations 
  INNER JOIN 
  (users, user_tree_table,trees,Species_master) 
  ON user_tree_table.user_tree_id = user_tree_observations.user_tree_id
  AND user_tree_table.user_id='$_SESSION[user_id]' 
  AND users.user_id=user_tree_table.user_id 
  AND user_tree_table.tree_id=trees.tree_id 
  AND trees.species_id=Species_master.species_id 
  WHERE  user_tree_observations.date BETWEEN '$start_date' AND '$end_date'");
}
else
{
$user_tree_table_settings=mysql_query("SELECT user_tree_table.user_tree_id,tree_nickname,
  user_tree_observations.observation_id,user_tree_observations.date,
  is_leaf_fresh,
  is_flower_open, 
  is_fruit_ripe, 
  Species_master.species_primary_common_name 
  FROM user_tree_observations 
  INNER JOIN 
  (users, user_tree_table,trees,Species_master) 
  ON user_tree_table.user_tree_id = user_tree_observations.user_tree_id
  AND user_tree_table.user_id='$_SESSION[user_id]' 
  AND users.user_id=user_tree_table.user_id 
  AND user_tree_table.tree_id=trees.tree_id 
  AND trees.species_id=Species_master.species_id 
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


$edittreeLink = "<a class=thickbox rel=gallery-plants href=\"editobservations.php?usertreeid=".$row_settings['user_tree_id']."&observationid=".$row_settings['observation_id']."&TB_iframe=true&height=500&width=700\">Edit</a>";

print "<td>$edittreeLink</td>";

$deletetreelink="<a class=thickbox href=\"deleteobservation.php?usertreeid=".$row_settings['user_tree_id']."&observationid=".$row_settings['observation_id']."&TB_iframe=true&height=500&width=700\">Delete</a>";
print "<td>$deletetreelink</td>";
print "</tr>";
}  
echo "</tbody></table>";
?>



<html> 
<p align="center"> 
<input type=reset  value="Go Back"  class=buttonstyle onclick="javascript:window.location.href='listobservations.php';">
</p>
</div>
</div>
<div class="container bottom">
<?php mysql_close($link);?>
</div>
</body>
</html>

