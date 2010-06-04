<?php 
include '../includes/dbc.php';
mysql_select_db("ncbs_test");
//echo "coming into listspecies page : " .$_GET[id];
//echo "<br/>coming in to last". $_GET[id];

if($_GET['id']!= "")
{ 
$speciesID=($_GET['id']);  
echo $species_id;
$sql1 = "DELETE FROM Species_master 
         WHERE species_id= '$speciesID'";  
echo "<div class='notice'>You have to be logged in to access this page</div>";
mysql_query($sql1,$link)or die("Insertion Failed:" .mysql_error()); 
} 


?>
 
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<title>SeasonWatch</title>
<link type="text/css" rel="stylesheet" href="../js/thickbox/thickbox.css"></link>
<script language="javascript" src="../js/thickbox/thickbox.js"></script>
<link rel="stylesheet" href="../blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="../blueprint/print.css" type="text/css" media="print">
<link rel="stylesheet" href="../blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
<link rel="stylesheet" href="../css/styles_new.css" type="text/css">
<link type="text/css" rel="stylesheet" href="../js/thickbox/thickbox.css"></link>
<script language="javascript" src="../js/thickbox/thickbox.js"></script>

<!--alerts script-->
<script src="js/jquery.js" type="text/javascript"></script>
<script src="/js/alerts/jquery.ui.draggable.js" type="text/javascript"></script>
<!-- Core files -->
<script src="/js/alerts/jquery.alerts.js" type="text/javascript"></script>
<link href="/js/alerts/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />

<script type = "text/javascript">
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to delete")) {
 //alert(delUrl);
 	url = 'listspecies.php?id='+delUrl; 
   window.document.location = url;
  }
else
{
url = 'listspecies.php';
 window.document.location = url;
}
}
</script>
</head>

<body>
<div class="container first_image" style="-moz-border-radius-bottomleft: 10px; -moz-border-radius-bottomright: 10px;">
<table>
<tbody>
<tr>
<td><b>All added Species</b></td>
<td/>
</tr>
</tbody>
</table>
<div>
<hr/>
</div>


<table style="width: 930px; margin-left: auto; margin-right: auto;">
<tr>
<td>
<a href="admin.php" title="species_page">
<img alt="" src="./images/cpanel.png" />cpanel</a>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
</td>


<td>
<a href="species_page.php" title="species_page">
<img alt="" src="./images/addedit.png" />Add new species</a>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
</td>

<td>
<a href="listspecies.php" title="species_page">
<img alt="" src="./images/address_f2.png" />All Species List</a>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
</td>

<td>
<a href="listusers.php" title="species_page">
<img alt="" src="./images/icon-48-user.png" />User Manager</a>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
</td>


<td>
<a href="admin_logout.php" title="species_page">
<img alt="" src="./images/logout.png" />Logout</a>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
</td>


<!-- <a href="species_page.php">Add New Species</a><br>
<a href="listspecies.php" title="species_page">
<a href="admin_logout.php">Logout</a> <br></p></td>  -->
<td width="10%"><h2>Administration Page</h2></td>
</tr>
</table>




<table id="table1" class="tablesorter" cellspacing="0" cellpadding="3" style="width: 930px; margin-left: auto; margin-right: auto;">
<colgroup>
<col style="width: 50px;"/>
<col style="width: 85px;"/>
<col style="width: 180px;"/>
<col style="width: 184px;"/>
<col style="width: 90px;"/>
<col style="width: 90px;"/>
<col style="width: 110px;"/>
</colgroup>
<thead>
<tr>
<th class="header">No</th>
<th class="header">Species ID</th>
<th class="header">Species Primary Name</th>
<th class="header">Species scientific Name</th>
<th class="header">Family</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>
<tbody>


<?php 
$count=0;
print "<tr class='delboxtr'>";
$result = mysql_query("SELECT * FROM Species_master");
while ($row_settings = mysql_fetch_array($result)) 
{
print "<tr>"; 
$count++; 
print "<td style='width:56px'>".$count."</td>";
//print $row_settings['species_id'];
print "<td>".$row_settings['species_id']."</td>";
print "<td>".$row_settings['species_primary_common_name']."</td>";
print "<td>".$row_settings['species_scientific_name']. "</td>";
print "<td style='width:220px'>".$row_settings['family']."</td>";
$edittreeLink = "<a class=thickbox href=\"editspecies.php?speciesid=".$row_settings['species_id']."&TB_iframe=true&height=500&width=700\">Edit</a>";
print "<td>$edittreeLink</td>"; 

$var=$row_settings['species_id'];
$deletetreeLink = "<a  href='listspecies.php' onclick=confirmDelete('$var');>Delete</a>";
//$deletetreeLink = "<a  href='listspecies.php?id=$var' >Delete</a>";
print "<td>$deletetreeLink</td>";
print "</tr>";  
}  
echo "</tbody></table>";

?>
</body>

<p align="center">
<input name="doRefresh" type="button" id="doRefresh" value="Refresh All" onClick="location.reload();">
<input type=reset  value="Back"  class=buttonstyle onclick="javascript:window.location.href='admin.php';">
</p>   

</html>


<!--Previous Code for Testing
echo "<table border='1'></table>
<tr>
<td align=right><b>Already Defined species</b></td>
</tr>";
echo "<table border='1' bgcolor=	#F5FFFA>
<tr>
<th>species primary common name</th>
<th>species scientific name</th>
<th>family</th>
<th>vegetation Type</th> 
<th>status in india</th>
<th>habitat type</th>
<th>distribution in india</th>
<th>leaf shape category</th>
<th>size description</th>
<!-- <th>flower description</th>
<th>bark description</th>
<th>fruit description</th>
<th>leaf type</th>
<th>spine thorn description</th>
<th>flowering time</th>
<th>fruiting time</th>
<th>time of leaf flush</th>
<th>special notes on phenology</th>
<th>similar species</th>
<th>known pollinators</th>
<th>Known Seed Dispersers</th>
<th>Uses by humans</th>
<th>list_of_references</th>
<th>Special Notes on the Species</th>  
</tr>";
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['species_primary_common_name'] . "</td>";
  echo "<td>" . $row['species_scientific_name'] . "</td>";
  echo "<td>" . $row['family'] . "</td>";
  //echo "<td>" . $row['vegetation_type'] . "</td>"; 
  echo "<td>" . $row['status_in_india'] . "</td>";
  echo "<td>" . $row['habitat_type'] . "</td>"; 
  echo "<td>" . $row['distribution_in_india'] . "</td>";
  //echo "<td>" . $row['leaf_shape_category'] . "</td>";
  echo "<td>" . $row['size_description'] . "</td>";
  echo "<td>" . $row['flower_description'] . "</td>";
  echo "<td>" . $row['bark_description'] . "</td>";
 // echo "<td>" . $row['fruit_description'] . "</td>";
  //echo "<td>" . $row['leaf_type'] . "</td>"; 
  //echo "<td>" . $row['spine_thorn_description'] . "</td>";
  //echo "<td>" . $row['flowering_time'] . "</td>"; 
  //echo "<td>" . $row['fruiting_time'] . "</td>";
  //echo "<td>" . $row['time_of_leaf_flush'] . "</td>";
  //echo "<td>" . $row['special_notes_on_phenology'] . "</td>";
  //echo "<td>" . $row['similar_species'] . "</td>";
  //echo "<td>" . $row['known_pollinators'] . "</td>"; 
 // echo "<td>" . $row['Known_Seed_Dispersers'] . "</td>";
  //echo "<td>" . $row['Uses_by_humans'] . "</td>";
 //echo "<td>" . $row['list_of_references'] . "</td>";
//  echo "<td>" . $row['Special_Notes_on_the_Species'] . "</td>";
echo "</tr>"; 
}
echo "</table>";--> 
 
