<?php 
include_once './includes/dbc.php';
page_protect();
?> 

<!--Displaying data into dropdown -->
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
<title>Add Tree page</title>
<link href="./css/styles.css" rel="stylesheet" type="text/css">
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
	   var strURL="tracktrees.php?species_id="+species_id;
	   document.species.species_id.value = species_id;
	    
	    var strURL="edittree.php?species_id="+species_id;
	   document.species.species_id1.value = species_id;
	  // alert(document.species.species_id1.value);

	  	//alert(document.species.species_id.value);
	  //alert(strURL);
	
	var strURL="findscientific_name.php?primary_name="+species_id;
		//alert(strURL);
		var req = getXMLHTTP();
if (req) {
			req.onreadystatechange = function() {
			if (req.readyState == 4) {
			//alert("onreadystatechange ==4");
			// only if "OK"
			//HTTP Request req.status ==200 shows 'Everything is OK' commented by Pavanesh
if (req.status == 200) {						
		document.getElementById('species_scientific_namediv').innerHTML=req.responseText;						
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

<!-- script for accesing session info through AJAX -->
<script type="text/javascript">
function getlocname() {
//alert('in getlocname');
	var req = getXMLHTTP();
if (req) {   req.onreadystatechange = function() {
	if (req.readyState == 4) {
	// only if "OK"
	if (req.status == 200) {						
	document.getElementById('treelocationname').value=req.responseText;						
	}
else {
	alert("There was a problem while using XMLHTTP:\n" + req.statusText);
   	}
		}				
		}			
		req.open("GET", "return_session_locname.php", true);
		req.send(null);
}
}
</script>

<link rel="stylesheet" href="blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="blueprint/print.css" type="text/css" media="print">
<link rel="stylesheet" href="blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<link rel="stylesheet" href="css/styles_new.css" type="text/css"></link>
<link type="text/css" rel="stylesheet" href="js/thickbox/thickbox.css"></link>
<script language="javascript" src="js/thickbox/thickbox.js"></script>
<script type='text/javascript' src='js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />


<!-- for tree location Auto complete features
<script type="text/javascript">
$().ready(function() {
	$("#treelocationname").autocomplete("getlocation.php", {
		width: 260,
		matchContains: true,
		selectFirst: false
	});
	 $("#treelocationname").result(function(event, data, formatted) {
    $("#treelocationid").val(data[1]);
      });
   	});
</script>--> 

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




<!--for emptyonclick-->
<script type="text/javascript" src="js/jquery.emptyonclick.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.emptyonclick').emptyonclick();
});
</script>

<script type="text/javascript">
function validate_form(thisform)
{

var height;
height = document.getElementById("tree_height").value;
var girth;
girth = document.getElementById("tree_girth").value;
var distance;
distance = document.getElementById("distance_from_water").value;
var slope;
slope = document.getElementById("degree_of_slope").value;




if (height != '' )
{
//alert("The value is "+height);
var numericExpression = /^[0-9]+$/;
	if(height.match(numericExpression) && (height>0 && height<=50)){
//	return true;
}
else{
		alert("tree height value should be Numeric & between 1 to 50");
		document.getElementById("tree_height").focus();
		return false;
}
} 

if(girth != '' )
{
//alert("Hello");
//alert("The value of girth is "+girth);
var numericnew= /^[0-9]+$/;
	if(girth.match(numericnew) && (girth>4 && girth<=10000)){
	//return true;
}
else{
		alert("tree girth value should be Numeric & between 5 to 10000");
		document.getElementById("tree_girth").focus();
		return false;
}
} 

if(distance != '' )
{
var numericdistance= /^[0-9]+$/;
	if(distance.match(numericdistance)){
	//return true;
}
else{
		alert("Distance value should be Numeric");
		document.getElementById("distance_from_water").focus();
		return false;
}
} 


if(slope != '' )
{
var numericslope= /^[0-9]+$/;
	if(distance.match(numericslope) && (slope>=0 && slope<=90))
{
}
else
{
alert("Slope value should be Numeric & between 0 to 90");
document.getElementById("degree_of_slope").focus();
return false;
}
} 

return true;
}
</script>


<script type="text/javascript">
$(document).ready(function() {
	$("#species").validate();
});
</script>

<!-- <script type="text/javascript">
function setLocation(){
alert("in setLocation");
}
</script> -->

<?php
include ("contribheader_head.php");
?>
</head>

<!--<?php
if ($_POST['speciesid'] == undefined)
{
$query=mysql_query("SELECT species_id FROM Species_master ORDER BY species_id ASC limit 1");
while($row = mysql_fetch_array($query))
$speciesid=mysql_insert_id();	
}
else 
{
$speciesid=$_POST['species_id'];	
}
?>-->
<?
$speciesid=$_SESSION['speciesid'];
//echo $speciesid;
?>
<body onLoad="getspecies_scientific_name(<? echo $_SESSION['speciesid'];?>);getfamily(<? echo $_SESSION['speciesid']; ?>);" onfocus="getlocname();">
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

<table style="width: 930px; margin-left: auto; margin-right: auto;">
<tbody>

<tr>
<td class="cms" style="border-bottem: 1px solid rgb(217, 92, 21); width: 45%;">
<form action="tracktrees.php" method="POST" name="species" id= "species" onsubmit="return validate_form(this);">
<input type = "hidden" name="species_id" value="name"/>
<input type = "hidden" name="species_id1" value="name"/>

<div align="center">
<table width=585 cellpadding=6 cellspacing=2>
</div>

<p>Please use the form below to enter part of the name of a species, and choose from the options that appear.</p>

<tr>
<td><b>Add Tree for Observation</b></td>
</tr>
<tr>&nbsp;</tr> 
<tr>&nbsp;</tr> 
<tr>&nbsp;</tr> 
<tr>&nbsp;</tr> 

<tr>
<td width="150">Primary Common Name<font color="#CC0000">*</font></td>
<td  width="150">
<?php
$sql = mysql_query("SELECT species_id,species_primary_common_name FROM Species_master WHERE species_id='$_SESSION[speciesid]'");
while($row=mysql_fetch_array($sql))
{
if ($row['species_id'] == $speciesid)
{ 
?>
<input type="text" readonly="readonly" value='<?=$row['species_primary_common_name']?>' style="width:200px;"/>
<?php 
}
else
{
?>
<input type="text" readonly="readonly" value='<?=$row['species_primary_common_name']?>' style="width:200px;"/>
<?php 
}
}
?> 
<div1 id="tooltiptest">
<a title="The list contains only those species that have been selected for monitoring under SeasonWatch. Sorry if the tree you are trying to add is not on this list." href="#">(?)</a>
</div>
</td>
</tr>
<tr style="">

<td>Scientific Name<font color="#CC0000">*</font></td>
<td ><div id="species_scientific_namediv"><input type="text"  name="species_scientific_name" readonly="readonly">
</input></div></td>
</tr>
<tr style="">

<td>Family<font color="#CC0000">*</font></td>
<td ><div id="familydiv"><input type="text" readonly="readonly"  name="family"></input></div></td>
</tr>


<tr> 
<td align=right>Tree Location<font color="#CC0000">*</font></td>
<?php
 //echo "treelocation = ". $_SESSION['treelocation'];
 ?>
 <!-- simple add class="ac_input" after class="required"--> 
<td>
<!-- <input type="text" id="treelocationname" readonly="readonly" class="required" name="treelocationname" autocomplete="off" style="width:200px;" 
onfocus="setLocation();"></input> -->
<!--<div id="treelocationname">-->
<input type="text" id="treelocationname" name="treelocationname" readonly="readonly" class="required" name="treelocationname" autocomplete="off" style="width:200px;"></input>
<!--</div>-->
<!-- "<?php 
//echo $_SESSION['treelocation'];
//unset($_SESSION['treelocation']);
?>" -->
 </td>
</tr>

<tr> 
<td align=right></td>
<td>
<a style="font-size: 13px;" title="Add a new location" class="thickbox" href="addnewlocation.php?&amp;height=450&amp;width=800&amp;TB_iframe=true">
Add a new location</a>
&nbsp;<div1 id="tooltiptest">
<a title="Use a map to tell us where your tree is" href="#">(?)</a>
</div>
</td>
</tr> 

<tr> 
<td align=right>Location Type</td>
<td>
<select id="location_type" name="location_type" class="required">
<option name="Choose" value="Choose">-- Choose --</option>
<option name="Garden/Park" value="Garden/Park">Garden/Park</option>
<option name="Avenue" value="Avenue">Avenue</option>
<option name="Forest" value="Forest">Forest</option>
<option name="Campus" value="Campus">Campus</option>
<option name="Marsh" value="Marsh">Marsh</option>
<option name="Grassland" value="Grassland">Grassland</option>
<option name="Plantation" value="Plantation">Plantation</option>
<option name="Farmland" value="Farmland">Farmland</option>
<option name="Other" value="Other">Other</option>
</select>
</td>
</tr> 


<tr> 
<td align=right>Tree Nickname<font color="#CC0000">*</font></td>
<td><input type="text" name="tree_nickname" class="required" style="width:200px;">
<div1 id="tooltiptest">
<a title="Please give all your trees a unique nickname. This will help you distinguish your individual trees (e.g. “Home_Neem” from “Street_Neem”) later at the time of adding observations." href="#">(?)</a>
</div>
</td>
</tr> 



<tr> 
<td align=right>Height of the tree (m)</td>
<td><input type="text" id="tree_height" name="tree_height" style="width:200px;">
<div1 id="tooltiptest">
<a title="Note the approximate height of the tree if possible. This can be visually approximated, or by using the height of a known reference in the vicinity (a building or pole that can be measured)." href="#">(?)</a>
</div>
</td>
</tr> 


<tr> 
<td align=right>Girth of the Tree (cm)</td>
<td><input type="text" id="tree_girth" name="tree_girth" style="width:200px;">
<div1 id="tooltiptest">
<a title="The girth of your tree can be measured using a simple flexible measuring-tape. Select the main trunk of the tree at chest-height (approx 1.4mt or 4.5feet from the ground) and measure the girth (circumference) in cm. You can also use a length of string and measure it with a ruler." href="#">(?)</a>
</div>
</td>
</tr> 

<tr> 
<td align=right>Any damage to the tree</td>
<td>
<input type="radio" class="radio" name="tree_damage" value="1" /> Yes
&nbsp;
<input type="radio" class="radio" name="tree_damage" value="2" /> No
<br/>
</td>
</tr>


<tr> 
<td align=right>Is this tree fertilised</td>
<td>
<input type="radio" class="radio" name="is_fertilised" value="1" /> Yes
&nbsp;
<input type="radio" class="radio" name="is_fertilised" value="2" /> No
<br/>
</td>
</tr>


<tr> 
<td align=right>Is this tree watered</td>
<td>
<input type="radio" class="radio" name="is_watered" value="1" /> Yes
&nbsp;
<input type="radio" class="radio" name="is_watered" value="2" /> No
<br/>
</td>
</tr>

<!--<tr> 
<td align=right>Tree Location</td>
<td><input type="text" name="tree_location" style="width:200px;"></td>
</tr>--> 

<tr> 
<td align=right>Distance from Water (m)</td>
<td><input type="text" id="distance_from_water" name="distance_from_water" style="width:200px;">
<div1 id="tooltiptest">
<a title="Please note the approximate distance of the plant from any major water source such as lake, river, stream, nala, pond, etc." href="#">(?)</a>
</div>
</td>
</tr> 


<tr> 
<td align=right>Degree of slope(°)</td>
<td><input type="text" id="degree_of_slope" name="degree_of_slope" style="width:200px;">
<div1 id="tooltiptest">
<a title="If your plant is on a hill, try to note the incline of the slope in degree by visual estimation (e.g. slope of 20°). " href="#">(?)</a>
</div>
</td>
</tr>

<tr> 
<td align=right>Aspect</td>
<td>
<select id="aspect" name="aspect">
<!-- <option value="Don't Know">Don't Know</option> -->
<option name="North" value="North">North</option>
<option name="NorthEast" value="NorthEast">North-East</option>
<option name="East" value="East">East</option>
<option name="SouthEast" value="SouthEast">South-East</option>
<option name="South" value="South">South</option>
<option name="SouthWest" value="SouthWest">South-West</option>
<option name="West" value="West">West</option>
<option name="NorthWest" value="NorthWest">North-West</option>
</select>
<div1 id="tooltiptest">
<a title="If your plant is on a hill, please try and note the direction (aspect) to which the hill slope faces (e.g. South-West)" href="#">(?)</a>
</div>
</td>
</tr>

<tr> 
<td align=right>Tree Description</td>
<td><textarea id="tree_desc" name="tree_desc" cols="40" rows="5" class="emptyonclick">
Enter your comments here
</textarea><br> </td>
</tr>

<tr> 
<td align=right>Other Notes</td>
<td><textarea id="other_notes" name="other_notes" class="emptyonclick" >
Enter your comments here
</textarea><br> </td>
</tr>
</table>

<p align="center">
<input type="submit"  name="Submit" id="Submit" value="Submit" /> 
&nbsp;&nbsp;
<input type=reset  value="Clear"  class=buttonstyle/>
&nbsp;
<input type=reset  value="Cancel"  class=buttonstyle onclick="javascript:window.location.href='addtree_options.php';"/>
</p>

</table>
</form>
</div>
</div>
<div class="container bottom">
</div>
</body>
</html>
