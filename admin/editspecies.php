<?php 
include '../includes/dbc.php';
?>
<html>
<head>
<title>Edit Species Page</title>
</head>
<body>
<link rel="stylesheet" href="../css/styles_new.css" type="text/css"></link>
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


<?php
$speciesID = $_GET['speciesid'];
//echo $speciesID; 
$species_details = mysql_query("SELECT * FROM Species_master Where species_id='$speciesID'"); 
//print_r(mysql_fetch_array($tree_details));
$one_species_detail = mysql_fetch_array($species_details);
?>

<table style="width: 930px; margin-left: auto; margin-right: auto;">
<tbody>
<tr>
<td class="cms" style="border-bottem: 1px solid rgb(217, 92, 21); width: 45%;">
<form action="updatespecies.php" method="POST" name="frm2" id= "frm2">
<input type = "hidden" name="species_id" value=<? echo $one_species_detail['species_id']; ?>/>

<div align="center">
<table width=585 cellpadding=6 cellspacing=2>
</div>
<p>Please use the form below to enter part of the name of a species, and choose from the options that appear.</p>
<tr>
<td><b>Edit Species</b></td>
</tr>
<tr>&nbsp;</tr> 
<tr>&nbsp;</tr> 
<tr>&nbsp;</tr> 
<tr>&nbsp;</tr> 

<tr>
<td align=right>Primary Common Name</td>
<td><input type="text" name="species_primary_common_name" value="<? echo $one_species_detail['species_primary_common_name'];?>" style="width:200px;">
</td>
</tr>

<tr>
<td align=right>Scientific Name:</td>
<td>
<input type="text" name="species_scientific_name" value="<? echo $one_species_detail['species_scientific_name'];?>" style="width:200px;">
</td>
</tr>

<tr>
<td align=right>Family:</td>
<td><input type="text" name="family" value="<? echo $one_species_detail['family'];?>" style="width:200px;"></td>
</tr>


<tr>
<td align=right>Vegetation Type:</td>
<td>
<?php
$t1=$one_species_detail['vegetation_type'];
switch ($t1)
{
case "Deciduous":
$Deciduous="selected";
break;
case "Evergreen":
$Evergreen="selected";
break;
case "Near Deciduous":
$Near_Deciduous="selected";
break;
case "Near Evergreen":
$Near_Evergreen="selected";
break;
}
?>
<select id="vegetation_type" name="vegetation_type">
<option name="Choose" value="0">-- Choose --</option>
<option name="Deciduous" value="Deciduous" <? echo $Deciduous; ?>>Deciduous</option>
<option name="Evergreen" value="Evergreen" <? echo $Evergreen; ?>>Evergreen</option>
<option name="Near Deciduous" value="Near Deciduous" <? echo $Near_Deciduous; ?>>Near Deciduous</option>
<option name="Near Evergreen" value="Near Evergreen" <? echo $Near_Evergreen; ?>>Near Evergreen</option>
</select>
 
</td>
</tr>

<tr>
<td align=right>Status in India:</td>
<td>
<?php
$t1=$one_species_detail['status_in_india'];
switch ($t1)
{
case "Indigenous":
$Indigenous="selected";
break;
case "Exotic":
$Exotic="selected";
break;
case "Invasive":
$Invasive="selected";
break;
case "Naturalized":
$Naturalized="selected";
break;
}
?>
<select id="status_in_india" name="status_in_india"  style="width:200px;">
<option name="Choose" value="0">-- Choose --</option>
<option name="Indigenous" value="Indigenous" <? echo $Indigenous; ?>>Indigenous</option>
<option name="Exotic" value="Exotic"<? echo $Exotic; ?>>Exotic</option>
<option name="Invasive" value="Invasive"<? echo $Invasive; ?>>Invasive</option>
<option name="Naturalized" value="Naturalized"<? echo $Naturalized; ?>>Naturalized</option>
</select>


</tr> 

<tr>
<td align=right>Habitat Type:</td>
<td><input type="text" name="habitat_type" value="<? echo $one_species_detail['habitat_type'];?>" style="width:200px;"></td>
</tr>

<tr>
<td align=right>Distribution in India:</td>
<td><input type="text" name="distribution_in_india" value="<? echo $one_species_detail['distribution_in_india'];?>" style="width:200px;"></td>
</tr>

<tr>
<td align=right>Leaf shape Category:</td>
<td>
<input type="text" name="leaf_shape_category" value="<? echo $one_species_detail['leaf_shape_category'];?>" style="width:200px;">
</td>
</tr>


<tr>
<td align=right>Size Description:</td>
<td><textarea name="size_description" cols="40" rows="5">
<? echo $one_species_detail['size_description'];?>
</textarea><br> </td>
</tr>

<tr>
<td align=right>Flower Description:</td>
<td><textarea name="flower_description" cols="40" rows="5" >
<? echo $one_species_detail['flower_description'];?>
</textarea><br> </td> 
</tr>

<tr>
<td align=right>Bark Description:</td>
<td><textarea name="bark_description" cols="40" rows="5" >
<? echo $one_species_detail['bark_description'];?>
</textarea><br> </td> 
</tr>

<tr>
<td align=right>Fruit Description:</td>
<td><textarea name="fruit_description" cols="40" rows="5" >
<? echo $one_species_detail['fruit_description'];?>
</textarea><br> </td> 
</tr>

<tr>
<td align=right>Leaf Type:</td>
<td><input type="text" name="leaf_type" value="<? echo $one_species_detail['leaf_type'];?>" style="width:200px;"></td>
</tr>

<tr>
<td align=right>Flowering Time:</td>
<td><input type="text" name="flowering_time" value="<? echo $one_species_detail['flowering_time'];?>" style="width:200px;"></td>
</tr>

<tr>
<td align=right>Fruiting Time:</td>
<td><input type="text" name="fruiting_time" value="<? echo $one_species_detail['fruiting_time'];?>" style="width:200px;"></td>
</tr>

<tr>
<td align=right>Time of leaf Flush:</td>
<td><input type="text" name="time_of_leaf_flush" value="<? echo $one_species_detail['time_of_leaf_flush'];?>" style="width:200px;"></td>
</tr>

<tr>
<td align=right>Similar Species:</td>
<td><input type="text" name="similar_species" value="<? echo $one_species_detail['similar_species'];?>" style="width:200px;"></td>
</tr>

<tr>
<td align=right>Known Pollinators:</td>
<td><input type="text" name="known_pollinators" value="<? echo $one_species_detail['known_pollinators'];?>" style="width:200px;"></td>
</tr>

<tr>
<td align=right>known Seed Dispersers:</td>
<td><input type="text" name="known_seed_dispersers" value="<? echo $one_species_detail['known_seed_dispersers'];?>" style="width:200px;"></td>
</tr>

<tr>
<td align=right>Uses by humans:</td>
<td><input type="text" name="uses_by_humans" value="<? echo $one_species_detail['uses_by_humans'];?>" style="width:200px;"></td>
</tr>

<tr>
<td align=right>List of references:</td>
<td><input type="text" name="list_of_references" value="<? echo $one_species_detail['list_of_references'];?>" style="width:200px;"></td>
</tr>

<tr>
<td align=right>Spine Thorn Description:</td>
<td><textarea name="spine_thorn_description" cols="40" rows="5">
<? echo $one_species_detail['spine_thorn_description'];?>
</textarea><br> </td>
</tr>

<tr>
<td align=right>Special Notes on the Species:</td>
<td><textarea name="special_notes_on_the_species" cols="40" rows="5">
<? echo $one_species_detail['special_notes_on_the_species'];?>
</textarea><br> </td>
</tr>

<tr>
<td align=right>Special notes on phenology:</td>
<td><textarea name="special_notes_on_phenology" cols="40" rows="5">
<? echo $one_species_detail['special_notes_on_phenology'];?>
</textarea><br> </td>
</tr>



<tr>
<td colspan=2 align=center>
<br>
<input name="doUpdate" type="submit" id="doUpdate" value="Update">
&nbsp;&nbsp;
</br>
</td>
</tr>
</table>
</table>
</form>
</div>
</div>
<?php mysql_close($link);?>
</body>
</html>

