<?php 
include './includes/dbc.php';
page_protect();
?> 

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Weekly Observation</title> 
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

<!--for tooltip--> 
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

<!--for date--> 
<link type="text/css" href="js/calendar/themes/blitzer/ui.datepicker.css" rel="stylesheet"></link>
<script language="javascript" src="js/calendar/ui/ui.datepicker.js"></script>
<script type="text/javascript">
$(function() { 
$("#obdate").datepicker({minDate: -120, maxDate: '0M +0D', dateFormat: 'yy-mm-dd'});
});
</script> 

<!--for emptyonclick-->
<script type="text/javascript" src="js/jquery.emptyonclick.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.emptyonclick').emptyonclick();
});
</script>

<!--for radio button dependencies-->
<script type="text/javascript">
function enablecount(name)
{
//alert(name);
if(name == 'is_leaf_fresh'){
document.getElementById('freshfmf').style.display='block';
//document.species1.freshleaf_count[1].disabled=false;
//document.species1.freshleaf_count[0].disabled=false;
//document.species1.freshleaf_count[2].disabled=false; 
}

if(name == 'is_leaf_mature'){ 
document.getElementById('maturefmf').style.display='block';
//document.species1.matureleaf_count[1].disabled=false;
//document.species1.matureleaf_count[0].disabled=false;
//document.species1.matureleaf_count[2].disabled=false; 
}
 
if(name == 'is_flower_bud'){
document.getElementById('budfmf').style.display='block';
//document.species1.bud_count[1].disabled=false;
//document.species1.bud_count[0].disabled=false;
//document.species1.bud_count[2].disabled=false; 
}

if(name == 'is_flower_open'){ 
document.getElementById('flowerfmf').style.display='block';
//document.species1.open_flower_count[1].disabled=false;
//document.species1.open_flower_count[0].disabled=false;
//document.species1.open_flower_count[2].disabled=false; 
}

if(name == 'is_fruit_unripe'){
document.getElementById('unripefmf').style.display='block';
//document.species1.fruit_unripe_count[1].disabled=false;
//document.species1.fruit_unripe_count[0].disabled=false;
//document.species1.fruit_unripe_count[2].disabled=false;
} 

if(name == 'is_fruit_ripe'){
document.getElementById('ripefmf').style.display='block';
//document.species1.fruit_ripe_count[1].disabled=false;
//document.species1.fruit_ripe_count[0].disabled=false;
//document.species1.fruit_ripe_count[2].disabled=false;
}
}

function disablecount(name)
{
if(name == 'is_leaf_fresh'){
document.getElementById('freshfmf').style.display='none';
//document.species1.freshleaf_count[1].disabled=true;
//document.species1.freshleaf_count[0].disabled=true;
//document.species1.freshleaf_count[2].disabled=true;

document.species1.freshleaf_count[1].checked=false;
document.species1.freshleaf_count[0].checked=false;
document.species1.freshleaf_count[2].checked=false;
} 

if(name == 'is_leaf_mature'){
document.getElementById('maturefmf').style.display='none';
//document.species1.matureleaf_count[1].disabled=true;
//document.species1.matureleaf_count[0].disabled=true;
//document.species1.matureleaf_count[2].disabled=true;

document.species1.matureleaf_count[1].checked=false;
document.species1.matureleaf_count[0].checked=false;
document.species1.matureleaf_count[2].checked=false; 
}

if(name == 'is_flower_open'){
document.getElementById('flowerfmf').style.display='none';
//document.species1.open_flower_count[1].disabled=true;
//document.species1.open_flower_count[0].disabled=true;
//document.species1.open_flower_count[2].disabled=true;

document.species1.open_flower_count[1].checked=false;
document.species1.open_flower_count[0].checked=false;
document.species1.open_flower_count[2].checked=false; 
}

if(name == 'is_flower_bud'){ 
document.getElementById('budfmf').style.display='none';
//document.species1.bud_count[1].disabled=true;
//document.species1.bud_count[0].disabled=true;
//document.species1.bud_count[2].disabled=true;

document.species1.bud_count[1].checked=false;
document.species1.bud_count[0].checked=false;
document.species1.bud_count[2].checked=false; 
}
 
if(name == 'is_fruit_unripe'){
document.getElementById('unripefmf').style.display='none';
//document.species1.fruit_unripe_count[1].disabled=true;
//document.species1.fruit_unripe_count[0].disabled=true;
//document.species1.fruit_unripe_count[2].disabled=true; 
 
document.species1.fruit_unripe_count[1].checked=false;
document.species1.fruit_unripe_count[0].checked=false;
document.species1.fruit_unripe_count[2].checked=false; 
}
 
if(name == 'is_fruit_ripe'){
document.getElementById('ripefmf').style.display='none';
//document.species1.fruit_ripe_count[1].disabled=true;
//document.species1.fruit_ripe_count[0].disabled=true;
//document.species1.fruit_ripe_count[2].disabled=true; 

document.species1.fruit_ripe_count[1].checked=false;
document.species1.fruit_ripe_count[0].checked=false;
document.species1.fruit_ripe_count[2].checked=false; 
}
}
</script> 


<script type="text/javascript">  
function validate_required(field,alerttxt)
{ 
with (field)
  { 
  if (value==null||value=="")
    { 
    alert(alerttxt);return false;
    } 
  else 
    { 
    return true; 
    } 
  } 
} 

function validate_form(thisform)
{
with (thisform)
{
if (validate_required(obdate,"Date must be filled out!")==false)
{
obdate.focus();return false;}
}


is_leaf_fresh = -1;	 
for (i=0;i < thisform.is_leaf_fresh.length;  i++)
{	
if (thisform.is_leaf_fresh[i].checked == true) 
{
//alert("coming into "+thisform.is_leaf_fresh[i].checked);
is_leaf_fresh = 1;
}
} 

if ((is_leaf_fresh == -1)) 
{
alert("You must select an option for Fresh Leaf!");
return false;
}



is_leaf_mature = -1;	 
for (i=0;i < thisform.is_leaf_mature.length;  i++)
{	
if (thisform.is_leaf_mature[i].checked == true) 
{
//alert("coming into "+thisform.is_leaf_mature[i].checked);
is_leaf_mature = 1;
}
} 

if ((is_leaf_mature == -1)) 
{
alert("You must select an option for Mature Leaf!");
return false;
}

is_flower_bud = -1;	 
for (i=0;i < thisform.is_flower_bud.length;  i++)
{	
if (thisform.is_flower_bud[i].checked == true) 
{
//alert("coming into "+thisform.is_flower_bud[i].checked);

is_flower_bud = 1;
}
} 

if ((is_flower_bud == -1)) 
{
alert("You must select an option for Flower Bud!");
return false;
}

is_flower_open = -1;	 
for (i=0;i < thisform.is_flower_open.length;  i++)
{	
if (thisform.is_flower_open[i].checked == true) 
{
//alert("coming into "+thisform.is_flower_open[i].checked);
is_flower_open = 1;
}
} 

if ((is_flower_open == -1)) 
{
alert("You must select an option for Open Flower!");
return false;
}


is_fruit_unripe = -1;	 
for (i=0;i < thisform.is_fruit_unripe.length;  i++)
{	
if (thisform.is_fruit_unripe[i].checked == true) 
{
//alert("coming into "+thisform.is_fruit_unripe[i].checked);
is_fruit_unripe = 1;
}
} 

if ((is_fruit_unripe == -1)) 
{
alert("You must select an option for Unripe Fruit!");
return false;
}


is_fruit_ripe = -1;	 
for (i=0;i < thisform.is_fruit_ripe.length;  i++)
{	
if (thisform.is_fruit_ripe[i].checked == true) 
{
//alert("coming into "+thisform.is_fruit_ripe[i].checked);
is_fruit_ripe = 1;
}
} 

if ((is_fruit_ripe == -1)) 
{
alert("You must select an option for Ripe Fruit!");
return false;
}



var temp_max;
temp_max = document.getElementById("temperature_max").value;

var temp_min;
temp_min = document.getElementById("temperature_min").value;

var rainfall;
rainfall = document.getElementById("rainfall_mm").value;


var humidity;
humidity = document.getElementById("humidity_mm").value;


if (temp_max != '' )
{
var numericExpression = /^[0-9]+$/;
	if(temp_max.match(numericExpression) && (temp_max>=0) && (temp_max<=50)){
	//return true;
	}
	else{
		alert("Max Temperature value should be Numeric & between 0 to 50");
		document.getElementById("temperature_max").focus();
		return false;
	}
} 


if (temp_min != '' )
{
//alert("coming");
var numericExpression = /^[0-9]+$/;
	if(temp_min.match(numericExpression) && (temp_min>=0 && temp_min<=50)){
	//return true;
	}
	else{
		alert("Min Temperature value should be Numeric & between 0 to 50!");
		document.getElementById("temperature_min").focus();
		return false;
	}
} 

if (rainfall != '' )
{
var numericExpression = /^[0-9]+$/;
	if(rainfall.match(numericExpression) && (rainfall>=0 && rainfall<=200)){
	//return true;
	}
	else{
		alert("Rainfall value should be Numeric & between 0 to 200!");
		document.getElementById("rainfall_mm").focus();
		return false;
	}
} 

if (humidity != '' )
{
var numericExpression = /^[0-9]+$/;
	if(humidity.match(numericExpression) && (humidity>=0 && humidity<=100)){
	//return true;
	}
	else{
		alert("Humidity value should be Numeric & between 0 to 50!");
		document.getElementById("humidity_mm").focus();
		return false;
	}
}
return true; 
}
</script>
</head>

<body>
<!-- div used to be of class = container first_image. but since this required a different width changed. haven't yet made a class for this-->
<div style="-moz-border-radius-bottomleft: 10px; -moz-border-radius-bottomright: 10px;background-color:#fffff9;
 background-image: url('../images/gradientbg.png');
 background-repeat: repeat-x;
 background-position: bottom left;
 width:705px;
 padding-bottom:5px;">
<table style="width: 705px;">
<tbody>
<tr>
<td/>
</tr>
</tbody>
</table>

<form method="POST" action= "trackobservations.php" name="species1" id= "species1"  onsubmit="return validate_form(this);">
<!--<?php echo $usertreeid=$_GET['usertreeid'];?> -->
<input type="hidden" name="usertreeid" value="<? echo $usertreeid=$_GET['usertreeid'];?>" />


<table style="width: 705px;margin:0;cellspacing:0;cellpadding:0;">
<p><b>Phenology Observation Form</b></p>
<tr>&nbsp;</tr> 
<tr>&nbsp;</tr> 
<tr>&nbsp;</tr> 
<tr>&nbsp;</tr> 



<tr> 
<td align="right">Date of Observation<font color="#CC0000">*</font></td>
<td>
<div class="demo">
<input id="obdate" name="obdate"  type="text"/>
</div>
<br/>
</td>
</tr>


<tr bgcolor="#C3D9FF" > 
<td align=right style="bold">Fresh Leaf<font color="#CC0000">*</font></td>
<td>
<input type="radio" class="radio" name="is_leaf_fresh" value="1" onClick = "enablecount(this.name);"/> Yes
&nbsp;
<input type="radio" class="radio" name="is_leaf_fresh" value="0" onClick = "disablecount(this.name);"/> No
&nbsp;
<input type="radio" class="radio" name="is_leaf_fresh" value="2" onClick = "disablecount(this.name);"/> Don't know
<br/><br/>
<div id="freshfmf" style="display:none;">
<input type="radio" class="radio" name="freshleaf_count"  value="Few" /> Few
<input type="radio" class="radio" name="freshleaf_count"  value="Many" /> Many
<input type="radio" class="radio" name="freshleaf_count"  value="Full" /> Full
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
<div1 id="tooltiptest">
<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
</div>
</div>
<br/>
</td>
</tr>

<tr> 
<td align=right style="bold">Mature Leaf<font color="#CC0000">*</font></td>
<td>
<input type="radio" class="radio" name="is_leaf_mature" value="1" onClick = "enablecount(this.name);" /> Yes
&nbsp;
<input type="radio" class="radio" name="is_leaf_mature" value="0" onClick = "disablecount(this.name);" /> No
&nbsp;
<input type="radio" class="radio" name="is_leaf_mature" value="2" onClick = "disablecount(this.name);" /> Don't know
<br/><br/>
<div id="maturefmf" style="display:none;">
<input type="radio" class="radio" name="matureleaf_count" value="Few" /> Few
<input type="radio" class="radio" name="matureleaf_count" value="Many" /> Many
<input type="radio" class="radio" name="matureleaf_count" value="Full" /> Full
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
<div1 id="tooltiptest">
<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
</div>
</div>
<br/>
</td>
</tr>


<tr bgcolor="#C3D9FF" > 
<td align=right style="bold">Flower Bud<font color="#CC0000">*</font></td>
<td>
<input type="radio" class="radio" name="is_flower_bud" value="1" onClick = "enablecount(this.name);"/> Yes
&nbsp;
<input type="radio" class="radio" name="is_flower_bud" value="0"  onClick = "disablecount(this.name);"/> No
&nbsp;
<input type="radio" class="radio" name="is_flower_bud" value="2"  onClick = "disablecount(this.name);"/> Don't know
<br/><br/>
<div id="budfmf" style="display:none;">
<input type="radio" class="radio" name="bud_count"  value="Few" /> Few
<input type="radio" class="radio" name="bud_count"  value="Many" /> Many
<input type="radio" class="radio" name="bud_count"  value="Full" /> Full
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
<div1 id="tooltiptest">
<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
</div>
</div>
<br/>
</td>
</tr>

<tr> 
<td align=right style="bold">Open Flower<font color="#CC0000">*</font></td>
<td>
<input type="radio" class="radio" name="is_flower_open" value="1" onClick = "enablecount(this.name);"  /> Yes
&nbsp;
<input type="radio" class="radio" name="is_flower_open" value="0" onClick = "disablecount(this.name);" /> No
&nbsp;
<input type="radio" class="radio" name="is_flower_open" value="2"  onClick = "disablecount(this.name);"/> Don't know
<br/><br/>
<div id="flowerfmf" style="display:none;">
<input type="radio" class="radio" name="open_flower_count" value="Few" /> Few
<input type="radio" class="radio" name="open_flower_count" value="Many" /> Many
<input type="radio" class="radio" name="open_flower_count" value="Full" /> Full
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
<div1 id="tooltiptest">
<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
</div>
</div>
<br/>
</td>
</tr>


<tr bgcolor="#C3D9FF" > 
<td align=right style="bold">Unripe Fruit<font color="#CC0000">*</font></td>
<td>
<input type="radio" class="radio" name="is_fruit_unripe" value="1"  onClick = "enablecount(this.name);" /> Yes
&nbsp;
<input type="radio" class="radio" name="is_fruit_unripe" value="0" onClick = "disablecount(this.name);" /> No
&nbsp;
<input type="radio" class="radio" name="is_fruit_unripe" value="2"  onClick = "disablecount(this.name);" /> Don't know
<br/><br/>
<div id="unripefmf" style="display:none;">
<input type="radio" class="radio" name="fruit_unripe_count" value="Few" /> Few
<input type="radio" class="radio" name="fruit_unripe_count" value="Many" /> Many
<input type="radio" class="radio" name="fruit_unripe_count" value="Full" /> Full
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
<div1 id="tooltiptest">
<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
</div>
</div>
<br/>
</td>
</tr>


<tr> 
<td align=right style="bold">Ripe Fruit<font color="#CC0000">*</font></td>
<td>
<input type="radio" class="radio" name="is_fruit_ripe" value="1"  onClick = "enablecount(this.name);" /> Yes
&nbsp;
<input type="radio" class="radio" name="is_fruit_ripe" value="0" onClick = "disablecount(this.name);"  /> No
&nbsp;
<input type="radio" class="radio" name="is_fruit_ripe" value="2" onClick = "disablecount(this.name);" /> Don't know
<br/><br/>
<div id="ripefmf" style="display:none;">
<input type="radio" class="radio" name="fruit_ripe_count"  value="Few" /> Few
<input type="radio" class="radio" name="fruit_ripe_count"  value="Many" /> Many
<input type="radio" class="radio" name="fruit_ripe_count"  value="Full" /> Full
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
<div1 id="tooltiptest">
<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
</div>
</div>
<br/>
</td>
</tr>

<!--

<tr>  
<td align=right>Unripe</td>
<td>
<input type="radio" name="is_fruit_unripe" value="1"  onClick = "enablecount();" /> Yes
&nbsp;
<input type="radio" name="is_fruit_unripe" value="0" onClick = "disablecount();" /> No
&nbsp;
<input type="radio" name="is_fruit_unripe" value="2"  onClick = "disablecount();" /> Don't know

</td>

</tr> 

<tr> 
<td align=right></td>
<td><input type="radio" name="fruit_unripe_count" disabled="disabled" value="Few" /> Few
<input type="radio" name="fruit_unripe_count"  disabled="disabled" value="Many" /> Many
<input type="radio" name="fruit_unripe_count" disabled="disabled" value="Full" /> Full</td>
</tr>


<tr> 
<td align=right style="bold">Ripe</td>
</tr>
<td align=right></td>
<td>
<input type="radio" name="is_fruit_ripe" value="1"  onClick = "enablecount();" /> Yes
&nbsp;
<input type="radio" name="is_fruit_ripe" value="0" onClick = "disablecount();"  /> No
&nbsp;
<input type="radio" name="is_fruit_ripe" value="2" onClick = "disablecount();" /> Don't know
<br/>
</td>
</tr>

<td align=right></td>
<td><input type="radio" name="fruit_ripe_count" disabled="disabled" value="Few" /> Few
<input type="radio" name="fruit_ripe_count" disabled="disabled" value="Many" /> Many
<input type="radio" name="fruit_ripe_count" disabled="disabled" value="Full" /> Full</td>
</tr>-->

<tr> 
<td align=right>Animal /Bird /Insect Description</td>
<td><textarea id="animal_desc" name="animal_desc" cols="40" rows="5"  value='Enter your comments here'  class="emptyonclick">
Enter your comments here
</textarea><div1 id="tooltiptest">
<a title="Please also look for any birds, insects or other creatures (including humans) that might be using the tree in any way (e.g. drinking nectar, eating fruits, collecting leaves and so on) at the time of observation and record these in the database." href="#">(?)</a>
</div><br> </td>
</tr> 

<!--<tr> 
<td align=right>Bird Description</td>
<td><textarea name="birds_desc" cols="40" rows="5" value='Enter your comments here'  onclick="make_blank2(this.value);">
Enter your comments here
</textarea><br> </td>
</tr> 


<tr>  
<td align=right>Insect Desc</td>
<td><textarea name="insect_desc" cols="40" rows="5" value='Enter your comments here'  onclick="make_blank3(this.value);">
Enter your comments here
</textarea><br> </td> 
</textarea><br> </td>
</tr> -->



<!-- <tr> 
<td align=right>Temperature Max (°C) </td>
<td align=left><input type="text" id="temperature_max" name="temperature_max" style="width:200px;">
<div1 id="tooltiptest">
<a title="Weather information 
is available in all leading newspapers, through the Indian 
Meteorological Department’s toll-free number (1800 180 1717), and on the 
Internet (http://www.imd.ernet.in/main_new.htm; 
http://www.imd.ernet.in/section/nhac/dynamic/current.htm)
" href="#">(?)</a>
</div>
</td>
</tr>


<tr>
<td align=left>Temperature Min (°C) </td>
<td><input type="text" id="temperature_min" name="temperature_min" style="width:200px;">
</td>
</tr>  

<tr> 
<td align=right>Rainfall (mm)</td>
<td><input type="text" id="rainfall_mm" name="rainfall_mm" style="width:200px;"></td>
</tr> 

<tr> 
<td align=right>Humidity (%)</td>
<td><input type="text" id="humidity_mm" name="humidity_mm" style="width:200px;"></td>
</tr>   -->

<tr>
<td></td>
<td>
<input type="submit"  name="Submit" id="Submit" value="Submit"/> 
<input type="reset"  value="Clear" />
<input type=reset  value="Cancel"  class=buttonstyle onclick="javascript:window.top.tb_remove();">
</td>
</tr>
</table>
</form>
</div>
</div>
<?php mysql_close($link);?>
</body>
</html>