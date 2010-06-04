<?php 
include './includes/dbc.php';
page_protect();
?> 

<!--Displaying data into dropdown -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="./css/styles.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="./js/CalendarControl.css">
<link type="text/css" rel="stylesheet" href="./js/jquery.autocomplete.css">
<script language="javascript" src="./js/CalendarControl.js"></script>
<script language="javascript" src="./js/jquery.js"></script>
<link rel="stylesheet" href="blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="blueprint/print.css" type="text/css" media="print">
<link rel="stylesheet" href="blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<link rel="stylesheet" href="css/styles_new.css" type="text/css">

<script type="text/javascript">
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
function getspecies_scientific_name(species_id) {		
	//alert("speciesID : "+ species_id);
		var strURL="findscientific_name.php?primary_name="+species_id;
		//alert(strURL);
		var req = getXMLHTTP();
if (req) {
			req.onreadystatechange = function() {
			if (req.readyState == 4) {
			//alert("onreadystatechange ==4");
			// only if "style="width:200px;"OK"
			//HTTP Request req.status ==200 shows 'Everything is OK' commented by Pavanesh
if (req.status == 200) {						
		document.getElementById('species_scientific_namediv').innerHTML=req.responseText;						
		document.species.species_id.value=species_id;
			} else {
			alert("There was a problem while using XMLHTTP:\n" + req.statusText);
			}
			}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}

function getfamily(species_id1) {
	//alert("primary_name=" + species_id1 );		
	var strURL="findfamily.php?primary_name="+species_id1;
	var req = getXMLHTTP();
if (req) {   req.onreadystatechange = function() {
	if (req.readyState == 4) {
	// only if "OK"
	if (req.status == 200) {						
	document.getElementById('familydiv').innerHTML=req.responseText;						
	}
else {
	alert("There was a problem while using XMLHTTP:\n" + req.statusText);
   	}
		}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
}
}
function make_blank()
{
document.species.tree_desc.value ="";
}
</script>
<script type="text/javascript">
$(document).ready(function() {
	$("#species").validate();
});
</script>

<!-- ToolTip Script-->
<link rel="stylesheet" href="tooltip/jquery.tooltip.css" />
<link rel="stylesheet" href="tooltip/demo/screen.css" />
<script src="tooltip/lib/jquery.dimensions.js" type="text/javascript"></script>
<script src="tooltip/jquery.tooltip.js" type="text/javascript"></script>
<script src="tooltip/lib/jquery.bgiframe.js" type="text/javascript"></script>
<script src="tooltip/chili-1.7.pack.js" type="text/javascript"></script>

<script type="text/javascript">
$(function() {
$('#tooltiptest a').tooltip({
	track: true,
	delay: 0,
	showURL: false,
	showBody: " - ",
	fade: 250
});
});
</script>



</head>

<body>
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

<!-- Select tree data and display in editable fashion -->
<?php
$treeid=($_GET['treeid']);
$tree_details = mysql_query("SELECT * FROM Species_master INNER JOIN (trees,user_tree_table,tree_measurement,location_master) ON user_tree_table.tree_id = trees.tree_id AND tree_measurement.tree_id =trees.tree_id AND trees.tree_id = '$treeid' AND trees.species_id = Species_master.species_id AND user_tree_table.user_id='$_SESSION[user_id]' AND location_master.tree_location_id=trees.tree_location_id AND tree_measurement.user_id='$_SESSION[user_id]'"); 
//print_r(mysql_fetch_array($tree_details));
$one_tree_detail = mysql_fetch_array($tree_details);
?>
<table style="width: 930px; margin-left: auto; margin-right: auto;">
<tbody>
<tr>
<td class="cms" style="border-bottem: 1px solid rgb(217, 92, 21); width: 45%;">
<form action="updatetree.php" method="POST" name="species" id= "species">
<input type = "hidden" name="species_id" value=<? echo $one_tree_detail['species_id']; ?>/>
<input type = "hidden" name="tree_id" value=<? echo $treeid; ?>/>
<div align="center">
<table width=585 cellpadding=6 cellspacing=2>
</div>
<p>Please use the form below to enter part of the name of a species, and choose from the options that appear.</p>
<tr>
<td><b>Edit Tree Information</b></td>
</tr>
<tr>&nbsp;</tr> 
<tr>&nbsp;</tr> 
<tr>&nbsp;</tr> 
<tr>&nbsp;</tr> 

<tr>
<td width="150">Primary Common Name</td>
<td  width="150"><select name="species_primary_common_name" onChange="getspecies_scientific_name(this.value);getfamily(this.value);"><?php 
$sql = mysql_query("SELECT species_id,species_primary_common_name, species_scientific_name FROM Species_master ORDER BY species_primary_common_name");
while($row = mysql_fetch_array($sql))
{
if($row['species_primary_common_name']==$one_tree_detail['species_primary_common_name'])
{
$data1 .= "<option  value='".$row['species_id']."' selected>".$row['species_primary_common_name']." (".$row['species_scientific_name'].")</option>";
}
else 
{
$data1 .= "<option  value='".$row['species_id']."'>".$row['species_primary_common_name']." (".$row['species_scientific_name'].")</option>";
}
}   
echo $data1;	  
?>
</select>
<div1 id="tooltiptest">
<a title="The list contains only those species that have been selected for monitoring under SeasonWatch. Sorry if the tree you are trying to add is not on this list." href="#">(?)</a>
</div></td>


<!--<td  width="150"><input type="text" name="species_primary_common_name" 
value="<?echo $one_tree_detail['species_primary_common_name'];?>" style="width:200px;"></td>-->
</tr>
<tr style="">
<td>Scientific Name</td>
<td  width="150"><div id="species_scientific_namediv"><select disabled="disabled" name="species_scientific_name"><?php 
$sql = mysql_query("SELECT species_id,species_scientific_name FROM Species_master");

while($row = mysql_fetch_array($sql))
{
if($row['species_scientific_name']==$one_tree_detail['species_scientific_name'])
{
$data2 .= "<option  value='{$row['species_id']}' selected>{$row['species_scientific_name']}</option>";
}
else
{
$data2 .= "<option  value='{$row['species_id']}'>{$row['species_scientific_name']}</option>"; 
}
}  
echo $data2;	
?>
</select>
</div></td>
</tr>
<tr style="">


<td>Family</td>
<td  width="150"><div id="familydiv"><select disabled="disabled" name="family" onChange="getspecies_primary_common_name(this.value);getfamily(this.value);">
<?php 
$sql = mysql_query("SELECT species_id,family FROM Species_master ");
while($row = mysql_fetch_array($sql))
{
if($row['family']==$one_tree_detail['family'])
{
$data3 .= "<option  value='{$row['species_id']}' selected>{$row['family']}</option>";
}
else 
{
$data3 .= "<option  value='{$row['species_id']}'>{$row['family']}</option>"; 
}
}   
echo $data3;	  
?>
</select>
</div>
</td>
</tr>


<tr> 
<td align=right>Tree Nickname</td>
<td><input type="text" name="tree_nickname" class="required"  value="<? echo $one_tree_detail['tree_nickname'];?>" style="width:200px;">
<div1 id="tooltiptest">
<a title="Please give all your trees a unique nickname. This will help you distinguish your individual trees (e.g. “Home_Neem” from “Street_Neem”) later at the time of adding observations." href="#">(?)</a>
</div>
</td>
</tr> 

<tr> 
<td align=right>Height of the tree (m)</td>
<td><input type="text" name="tree_height" value="<? echo $one_tree_detail['tree_height'];?>"style="width:200px;">
<div1 id="tooltiptest">
<a title="Note the approximate height of the tree if possible. This can be visually approximated, or by using the height of a known reference in the vicinity (a building or pole that can be measured)." href="#">(?)</a>
</div>
</td>
</tr> 


<tr> 
<td align=right>Girth of the Tree (cm)</td>
<td><input type="text" name="tree_girth" value="<? echo $one_tree_detail['tree_girth'];?>"style="width:200px;">
<div1 id="tooltiptest">
<a title="The girth of your tree can be measured using a simple flexible measuring-tape. Select the main trunk of the tree at chest-height (approx 1.4mt or 4.5feet from the ground) and measure the girth (circumference) in cm. You can also use a length of string and measure it with a ruler." href="#">(?)</a>
</div>
</td>
</tr> 

<tr> 
<td align=right>Any damage to the tree</td>
<?php
if ($one_tree_detail['tree_damage']==0)
{
	?>
	<td>
	<input type="radio" class="radio" name="tree_damage" value="1" > Yes </input>
	&nbsp;
	<input type="radio" class="radio" name="tree_damage" value="2" > No</input>
	<?php
}
elseif ($one_tree_detail['tree_damage']==1)
{
	?>
	<td>
	<input type="radio" class="radio" name="tree_damage" value="1" checked="checked"> Yes </input>
	&nbsp;
	<input type="radio" class="radio" name="tree_damage" value="2"  > No</input>
	<?php
}
else
{
	?>
	<td>
	<input type="radio" class="radio" name="tree_damage" value="1" > Yes</input>
	&nbsp;
	<input type="radio" class="radio" name="tree_damage" value="2" checked="checked"> No </input>
	<?php
}
?>
<br/>
</td>
</tr>


<tr> 
<td align=right>Is Fertilised</td>
<?php
if ($one_tree_detail['is_fertilised']==0)
{
	?>
	<td>
	<input type="radio" class="radio" name="is_fertilised" value="1" > Yes </input>
	&nbsp;
	<input type="radio" class="radio" name="is_fertilised" value="2"> No</input>
	<?php
}
elseif ($one_tree_detail['is_fertilised']==1)
{
	?>
	<td>
	<input type="radio" class="radio" name="is_fertilised" value="1"  checked="checked" > Yes </input>
	&nbsp;
	<input type="radio" class="radio" name="is_fertilised" value="2"> No</input>
	<?php
}
else
{
	?>
	<td>
	<input type="radio" class="radio" name="is_fertilised" value="1"  > Yes</input>
	&nbsp;
	<input type="radio" class="radio" name="is_fertilised" value="2" checked="checked"> No </input>
	<?php
}
?>
<br/>
</td>
</tr>


<tr> 
<td align=right>Is Watered</td>
<?php
if ($one_tree_detail['is_watered']==0)
{
	?>
	<td>
	<input type="radio" class="radio" name="is_watered" value="1" > Yes </input>
	&nbsp;
	<input type="radio" class="radio" name="is_watered" value="2"> No</input>
	<?php
}
elseif ($one_tree_detail['is_watered']==1)
{
	?>
	<td>
	<input type="radio" class="radio" name="is_watered" value="1" checked="checked"> Yes </input>
	&nbsp;
	<input type="radio" class="radio" name="is_watered" value="2"> No</input>
	<?php
}
else
{
	?>
	<td>
	<input type="radio" class="radio" name="is_watered" value="1"  > Yes</input>
	&nbsp;
	<input type="radio" class="radio" name="is_watered" value="2" checked="checked"> No </input>
	<?php
}
?><br/>
</td>
</tr>


<!--<?php
$query = mysql_query("SELECT location_name FROM location_master WHERE tree_location_id='$one_tree_detail[tree_location_id]'");
while($row = mysql_fetch_array($query)) 
{
$locationname = $row['location_name'];
echo $locationname;
}
?>-->

<tr> 
<td align=right>Tree Location</td>
<td><input type="text" name="tree_location_name" value="<?php  
echo "$one_tree_detail[location_name]";?>" readonly="readonly" style="width:200px;">
<div1 id="tooltiptest">
<a title="Currently tree location is non-editable!!" href="#">(?)</a>
</div>

</td>
</tr> 



<!--Option to edit location & submit a new location through GMAP
<tr> 
<td align=right></td>
<td>
<a style="font-size: 13px;" title="Add a new location" class="thickbox" href="addnewlocation.php?&amp;height=450&amp;width=800&amp;TB_iframe=true">
Add a new location</a>
&nbsp;<div1 id="tooltiptest">
<a title="If you want Please edit your Location through Google Map" href="#">(?)</a>
</div>
</td> 
</tr> 
 -->






<tr> 
<td align=right>Location Type</td>
<td> 
<?php
$t1=$one_tree_detail['location_type'];
switch ($t1)
{
case "Garden/Park":
$Garden="selected";
break;
case "Avenue":
$Avenue="selected";
break;
case "Forest":
$Forest="selected";
break;
case "Campus":
$Campus="selected";
break;
case "Marsh":
$Marsh="selected";
break;
case "Grassland":
$Grassland="selected";
break;
case "Plantation":
$Plantation="selected";
break;
case "Farmland":
$Farmland="selected";
break;
case "Other":
$Other="selected";
break;
}
?>
<select id="location_type" name="location_type">
<option name="Choose" value="0">-- Choose --</option>
<option name="Garden/Park" value="Garden/Park" <? echo $Garden; ?>>Garden/Park</option>
<option name="Avenue" value="Avenue" <? echo $Avenue; ?>>Avenue</option>
<option name="Forest" value="Forest" <? echo $Forest; ?>>Forest</option>
<option name="Campus" value="Campus" <? echo $Campus; ?>>Campus</option>
<option name="Marsh" value="Marsh" <? echo $Marsh; ?>>Marsh</option> 
<option name="Grassland" value="Grassland" <? echo $Grassland; ?>>Grassland</option> 
<option name="Plantation" value="Plantation" <? echo $Plantation; ?>>Plantation</option>
<option name="Farmland" value="Farmland" <? echo $Farmland; ?>>Farmland</option>
<option name="Other" value="Other" <? echo $Other; ?>>Other</option>
</select>
</td>
</tr> 


<tr> 
<td align=right>Distance from Water (m)</td>
<td><input type="text" name="distance_from_water" value="<? echo $one_tree_detail['distance_from_water'];?>"style="width:200px;">
<div1 id="tooltiptest">
<a title="Please note the approximate distance of the plant from any major water source such as lake, river, stream, nala, pond, etc." href="#">(?)</a>
</div>
</td>
</tr> 



<tr> 
<td align=right>Degree of slope(°)</td>
<td><input type="text" name="degree_of_slope" value="<? echo $one_tree_detail['degree_of_slope'];?>"style="width:200px;">
<div1 id="tooltiptest">
<a title="If your plant is on a hill, try to note the incline of the slope in degree by visual estimation (e.g. slope of 20°). " href="#">(?)</a>
</div>
</td>
</tr> 

<tr> 
<td align=right>Aspect</td>
<td>
<?php
$t2=$one_tree_detail['aspect'];
switch ($t2)
{
//case "Don't know":
//$Dont_know="selected";
//break;
case "North":
$North="selected";
break;
case "NorthEast":
$NorthEast="selected";
break;
case "East":
$East="selected";
break;
case "SouthEast":
$SouthEast="selected";
break;
case "South":
$South="selected";
break;
case "SouthWest":
$SouthWest="selected";
break;
case "West":
$West="selected";
break;
case "NorthWest":
$NorthWest="selected";
break;
}
?>
<select id="aspect" name="aspect">
<!-- <option name="Dont know" value="Don't know" <? echo $Dont_know; ?>>Don't know</option> -->
<option name="North" value="North" <? echo $North; ?>>North</option>
<option name="NorthEast" value="NorthEast" <? echo $NorthEast; ?>>North-East</option>
<option name="East" value="East" <? echo $East; ?>>East</option>
<option name="SouthEast" value="SouthEast" <? echo $SouthEast; ?>>South-East</option>
<option name="South" value="South" <? echo $South; ?>>South</option>
<option name="SouthWest" value="SouthWest" <? echo $SouthWest; ?>>South-West</option>
<option name="West" value="West" <? echo $West; ?>>West</option>
<option name="NorthWest" value="NorthWest" <? echo $NorthWest; ?>>North-West</option>
</select>
<div1 id="tooltiptest">
<a title="If your plant is on a hill, please try and note the direction (aspect) to which the hill slope faces (e.g. South-West)" href="#">(?)</a>
</div>
</td>
</tr> 




<tr> 
<td align=right>Tree Description</td>
<td><textarea name="tree_desc" cols="40" rows="5" id=" tree_desc"><? echo $one_tree_detail['tree_desc'];?></textarea><br>
</td>
</tr>
 
<tr> 
<td align=right>Other Notes</td>
<td><textarea name="other_notes" cols="40" rows="5" id=" tree_desc"><? echo $one_tree_detail['other_notes'];?></textarea><br>
</td>
</tr> 
 
<!-- 
<tr>
<td align="right">Start Date looking for trees at this location? (in the current season, ie 1 Jan to 31 March) </td>
<td>
<input id="obdate_1" type="text" value="" name="obdate"/>
<input id= "obdate_but_1" type="button" onclick="showCalendarControl(obdate_1);" value="Choose"/>
(dd-mm-yyyy)*
</td>
</tr> -->

<tr>
<td colspan=2 align=center>
<p align="center">
<input name="doUpdate" type="submit" id="doUpdate" value="Update">
&nbsp;&nbsp;
<input type=reset  value="Cancel"  class=buttonstyle onclick="javascript:window.top.tb_remove();">
</p>
<br/>
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
