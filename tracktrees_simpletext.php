<?php 
include './includes/dbc.php';
mysql_select_db("ncbs_test");
page_protect();

//print_r($HTTP_POST_VARS);

$speciesId=($_POST['species_id']);
//echo "$speciesId";
//Retrive tree_location_id by using tree location name
$query = mysql_query("SELECT tree_location_id FROM location_master WHERE location_name='$getlocationname'");
while($row = mysql_fetch_array($query)) 
{
$treelocid = $row['tree_location_id'];
}

if($_POST['Submit'] == 'Submit')  
{                     foreach($_POST as $key => $value)
{ 
$data[$key] = filter($value);
} 
$sql1 = "INSERT INTO trees  
              (tree_desc,is_fertilised,
              is_watered,species_id,tree_location_id,location_type,distance_from_water,degree_of_slope, aspect)  
              VALUES
              ('$_POST[tree_desc]',
              '$_POST[is_fertilised]',
              '$_POST[is_watered]', 
              '$speciesId',  
              '$treelocid', 
              '$_POST[location_type]',
              '$_POST[distance_from_water]',
              '$_POST[degree_of_slope]',
              '$_POST[aspect]'  
              )";  
mysql_query($sql1,$link)or die("Insertion Failed:" .mysql_error()); 

$tree_id = mysql_insert_id();

$sql2 = "INSERT INTO user_tree_table 
         (tree_id,tree_nickname,user_id) 
         VALUES
         ('$tree_id', 
         '$_POST[tree_nickname]',
         '$_SESSION[user_id]'
         )";
       mysql_query($sql2,$link) or die("Insertion Failed:" .mysql_error()); 

$sql3 = "INSERT INTO tree_measurement 
	            (tree_id,user_id,date_of_measurement,tree_girth,tree_height,tree_damage,other_notes) 
               VALUES 
               ('$tree_id',
               '$_SESSION[user_id]',
               now(),
               '$_POST[tree_girth]', 
               '$_POST[tree_height]', 
               '$_POST[tree_damage]', 
               '$_POST[other_notes]' 
               )";   
					mysql_query($sql3,$link) or die("Insertion Failed:" .mysql_error()); 
}
?>  
 
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<title>SeasonWatch</title>
<?php 
include ("contribheader_head.php");
?>
</head>

<body>
<link rel="stylesheet" href="blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="blueprint/print.css" type="text/css" media="print">
<link rel="stylesheet" href="blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<link rel="stylesheet" href="css/styles_new.css" type="text/css">
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
<colgroup>
<col style="width: 50px;"/>
<col style="width: 50px;"/>
</colgroup>
<?php 
$species_scientific_nameID=$_POST['species_id'];
//echo "<td>" . $species_scientific_nameID . "</td>";
//echo $_POST['species_id']; 

echo "<td><h3>You have just added a tree with the following details -: </h3></td>";

$tree_nickname=$_POST['tree_nickname'];
echo "<tr><td><font size=+1>Tree Nick Name:" . $tree_nickname . "</font></tr></td>";
 
$query1 = mysql_query("SELECT * FROM Species_master WHERE species_id=$species_scientific_nameID");
while($row_settings = mysql_fetch_array($query1)) 
{
print "<tr><td><font size=+1>Primary Name: " .$row_settings['species_primary_common_name']."</font></td></tr>";
print "<tr><td><font size=+1>Scientific Name: ".$row_settings['species_scientific_name']. "</font></td></tr>";
print "<tr><td><font size=+1>Family: ".$row_settings['family']."</font></td></tr>";
}
$getlocationname= $_POST[treelocationname];  
echo "<tr><td><font size=+1>Tree Location: " . $getlocationname . "</font></td></tr>";

mysql_close($link);
?>
</table>
<br/>


<html> 
<p align="center"> 
<input type=reset  value="Add a new tree"  class=buttonstyle onclick="javascript:window.location.href='addtree_options.php';">
&nbsp;&nbsp;
<input type=reset  value="Edit tree details"  class=buttonstyle onclick="javascript:window.location.href='listtree.php';">

</p>
</div>
</div>
<div class="container bottom">
</div>
</body>
</html>



