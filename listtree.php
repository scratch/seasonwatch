<?php 
include './includes/dbc.php';
mysql_select_db("ncbs_test");
page_protect();
//print_r($HTTP_POST_VARS);
?>

 
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<title>Added Tree List</title>
<link rel="stylesheet" href="blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="blueprint/print.css" type="text/css" media="print">
<link rel="stylesheet" href="blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<link rel="stylesheet" href="css/styles_new.css" type="text/css">
<link type="text/css" rel="stylesheet" href="js/thickbox/thickbox.css"></link>
<script language="javascript" src="js/thickbox/thickbox.js"></script>
<!--check for responsibility-->
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script language="javascript" src="js/jquery.bgiframe.min.js"></script> 
<script language="javascript" src="js/jquery.autocomplete.js"></script>
<link type="text/css" rel="stylesheet" href="js/jquery.autocomplete.css"></link>
<script charset="utf-8" type="text/javascript" src="js/jquery.emptyonclick.js"></script>
<script type="text/javascript" src="js/jqModal.js"></script>
<script type="text/javascript" src="js/jquery.autogrow.js"></script>
<script type="text/javascript" src="js/jquery.corner.js"></script>


<script type = "text/javascript">
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to delete")) {
 //alert(delUrl);
 	url = 'listtree.php?id='+delUrl; 
 	//alert(url);
   window.document.location = url;
  }
else
{
url = 'listtree.php';
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

 
<!--delete code from user-->
<?php 
if($_GET['id']!= "")
{ 
$usertreeid=($_GET['id']);  
$sql1 = "DELETE FROM user_tree_table 
               WHERE user_tree_id= '$usertreeid'";  
mysql_query($sql1,$link)or die("Insertion Failed:" .mysql_error());  
echo "<div class=\"notice\">Successfully Deleted</div>";
} 
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
<col style="width: 750px;"/>
<col style="width: 650px;"/>
<col style="width: 750px;"/>
<col style="width: 750px;"/>
<col style="width: 650px;"/>
</colgroup>
<thead>
<tr>
<th class="header">No</th>
<th class="header">Primary common Name</th>
<th class="header">Scientific name</th>
<th class="header">Tree Nickname</th>
<th class="header">Edit</th>
<th class="header">Delete</th>

</tr>
</thead>
<tbody>

<?php 
$count=0;
print "<tr class='delboxtr'>";

//$user_tree_table_settings = mysql_query("SELECT tree_nickname, tree_id FROM  user_tree_table WHERE user_id='".$_SESSION[user_id]."'");
$user_tree_table_settings = mysql_query("SELECT trees.tree_id, tree_nickname, species_scientific_name, species_primary_common_name, user_tree_table.user_tree_id FROM Species_master INNER JOIN (trees INNER JOIN user_tree_table ON trees.tree_id = user_tree_table.tree_id AND user_tree_table.user_id='$_SESSION[user_id]') ON Species_master.species_id = trees.species_id ORDER BY trees.tree_id");
  
while ($row_settings = mysql_fetch_array($user_tree_table_settings)) 
{
//print $row_settings['species_primary_common_name'];  
 
//print $row_settings['tree_id'];
print "<tr>";
$count++;  
print "<td style='width:220px'>".$count."</td>";
//$trees_settings = mysql_query("SELECT species_id FROM trees WHERE tree_id='".$row_settings['tree_id']."'");
//print $row_settings['species_id'];
//$species_settings = mysql_query("SELECT species_scientific_name,species_primary_common_name FROM Species_master WHERE species_id=".$trees_settings['species_id']);
print "<td>".$row_settings['species_primary_common_name']."</td>";
print "<td><i>".$row_settings['species_scientific_name']. "</i></td>";
print "<td style='width:220px'>".$row_settings['tree_nickname']."</td>";
$edittreeLink = "<a class=thickbox href=\"edittree.php?treeid=".$row_settings['tree_id']."&TB_iframe=true&height=500&width=700\">Edit</a>";
print "<td>$edittreeLink</td>";
//$deletetreelink="<a class=thickbox href=\"deletetree.php?usertreeid=".$row_settings['user_tree_id']."\">Delete</a>";
$var=$row_settings['user_tree_id'];
$deletetreeLink = "<a  href='listtree.php' onclick=confirmDelete('$var');>Delete</a>";
print "<td>$deletetreeLink</td>";
print "</tr>";
}  

/*
 $species_ID=($_GET['id']); 

$trees_settings = mysql_query("SELECT tree_location FROM trees WHERE species_id='$species_ID'"); 

$species_settings = mysql_query("SELECT species_scientific_name,species_primary_common_name,family FROM Species_master WHERE species_id='$species_ID'");

while ($row2_settings = mysql_fetch_array($species_settings)) 
{

print "<td>".$row2_settings{'species_primary_common_name'}."</td>";
print "<td>".$row2_settings['species_scientific_name']. "</td>";
print "<td>".$row2_settings['family']. "</td>";
}

while ($row_settings = mysql_fetch_array($user_tree_table_settings)) 
{ 
print "<td style='width:220px'>".$row_settings['tree_nickname']."</td>";
}

while ($row1_settings = mysql_fetch_array($trees_settings)) 
{
print "<td>".$row1_settings['tree_location']."</td>";
}
 
*/


  
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



