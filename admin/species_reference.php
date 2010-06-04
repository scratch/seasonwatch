<?php 
include '../includes/dbc.php';
mysql_select_db("ncbs_test");

//print_r($HTTP_POST_VARS);
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


<!--check for responsibility-->

<!--<script type="text/javascript" src="../js/jquery.validate.js"></script>
<script language="javascript" src="../js/jquery.bgiframe.min.js"></script> 
<script language="javascript" src="../js/jquery.autocomplete.js"></script>
<link type="text/css" rel="stylesheet" href="../js/jquery.autocomplete.css"></link>
<script charset="utf-8" type="text/javascript" src="../js/jquery.emptyonclick.js"></script>
<script type="text/javascript" src="../js/jqModal.js"></script>
<script type="text/javascript" src="../js/jquery.autogrow.js"></script>
<script type="text/javascript" src="../js/jquery.corner.js"></script>-->
</head>
<body>

<!--<?php 
include ("adminheader.php");
?>-->
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
<col style="width: 50px;"/>
<col style="width: 158px;"/>
<col style="width: 220px;"/>
<col style="width: 94px;"/>

</colgroup>
<thead>
<tr>
<th class="header">No</th>
<th class="header">Species Primary Name</th>
<th class="header">Species scientific name</th>
<th class="header">Family</th>
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
print "<td>".$row_settings['species_primary_common_name']."</td>";
print "<td>".$row_settings['species_scientific_name']. "</td>";
print "<td style='width:220px'>".$row_settings['family']."</td>";
print "</tr>";
}  
echo "</tbody></table>";
mysql_close($link);
?>


<html> 
<!-- <p align="center"> 
<input type=reset  value="Back"  class=buttonstyle onclick="javascript:window.location.href='species_page.php';">
</p>
</div>
</div>
<div class="container bottom">
</div>-->
</body>
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
 
