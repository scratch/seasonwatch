<?php 
include './includes/dbc.php';
page_protect();
?> 

<html>
<head>
<title>Edit Weekly Observation</title>
<script>
function make_blank1()
{
document.species1.animal_desc.value ="";
}
function make_blank2()
{
document.species1.birds_desc.value ="";
}
function make_blank3()
{
document.species1.insect_desc.value ="";
}
</script>


<!-- <link type="text/css" rel="stylesheet" href="./js/CalendarControl.css">
<script language="javascript" src="./js/CalendarControl.js"></script> -->

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

 
 
 
</head>

<body>
<link rel="stylesheet" href="blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="blueprint/print.css" type="text/css" media="print">
<link rel="stylesheet" href="blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<link rel="stylesheet" href="css/styles_new.css" type="text/css">
<!--for Date should be inside body--> 
<link type="text/css" href="js/calendar/themes/blitzer/ui.datepicker.css" rel="stylesheet" />
<script language="javascript" src="js/calendar/ui/ui.core.js"></script>
<script language="javascript" src="js/calendar/ui/ui.datepicker.js"></script>
<script type="text/javascript">
$(function() { 
$("#obdate").datepicker({minDate: -120, maxDate: '0M +0D', dateFormat: 'yy-mm-dd'});

});
</script> 
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

<form action="updateobservations.php" method="POST" name="species1" id= "species1">
<!--<?php echo $usertreeid=$_GET['usertreeid'];?> -->
<input type="hidden" name="usertreeid" value="<? echo $usertreeid=$_GET['usertreeid'];?>" />
<input type="hidden" name="observationid" value="<? echo $obsid=$_GET['observationid'];?>" />
<input type="hidden" name="is_flower_bud" value="<? echo $obsid=$_GET['observationid'];?>" />

<?php 
$obsdetails = mysql_query("SELECT * FROM user_tree_observations WHERE user_tree_id = '$usertreeid' AND observation_id='$obsid'"); 
$usr_obs_detail = mysql_fetch_array($obsdetails);
//echo $usr_obs_detail['animal_desc'];
//echo $usertreeid;
//echo $obsid;
//echo $usr_obs_detail['date'];
?> 
<table style="width: 705px;margin:0;cellspacing:0;cellpadding:0;">
<p><b>Phenology Observation Form</b></p>
<tr>&nbsp;</tr> 
<tr>&nbsp;</tr> 
<tr>&nbsp;</tr> 
<tr>&nbsp;</tr> 



<tr> 
<td align="right">Date of Observation<font color="#CC0000">*</font></td>
<td align="left">
<div class="demo">
<input id="obdate" name="obdate" type="text" value="<?php
$editdate=date("Y-m-d",strtotime($usr_obs_detail['date'])); 
echo $editdate;
?>" style="width:200px;"/>(yyyy-mm-dd)*
</div>
<br/>
</td>
</tr>


<tr bgcolor="#C3D9FF" > 
<td align=right>Is Leaf Fresh</td>
<?php
if ($usr_obs_detail['is_leaf_fresh']==1)
{ 
	?>
	<td>
	<input type="radio" class="radio" name="is_leaf_fresh" value="1"  checked="checked" onClick = "enablecount(this.name);" > Yes </input>
	&nbsp;
	<input type="radio" class="radio" name="is_leaf_fresh" value="0" onClick = "disablecount(this.name);" > No </input>
	&nbsp;	
	<input type="radio" class="radio" name="is_leaf_fresh" value="2"  onClick = "disablecount(this.name);" > Don't know</input>
	<?php
}
else
{
if($usr_obs_detail['is_leaf_fresh']==0)
{
	?>
	<td>
	<input type="radio" class="radio" name="is_leaf_fresh" value='1' onClick = "enablecount(this.name);" > Yes</input>
	&nbsp;
	<input type="radio" class="radio" name="is_leaf_fresh" value='0' checked="checked" onClick = "disablecount(this.name);"> No </input>
	&nbsp;
	<input type="radio" class="radio" name="is_leaf_fresh" value='2' onClick = "disablecount(this.name);" > Don't know</input>
	<?php
	}
else 
{
?>
<td>
	<input type="radio" class="radio" name="is_leaf_fresh" value='1'  onClick = "enablecount(this.name);" > Yes</input>
	&nbsp;
	<input type="radio" class="radio" name="is_leaf_fresh" value='0' onClick = "disablecount(this.name);"> No </input>
	&nbsp;
	<input type="radio" class="radio" name="is_leaf_fresh" value='2' checked="checked" onClick = "disablecount(this.name);"> Don't know</input>
<?php
}
}
?>	
<br/><br/>
<?php
if ($usr_obs_detail['freshleaf_count']=='Few')
{
	?>
	<div id="freshfmf" style="display:block;">
	<input type="radio" class="radio" name="freshleaf_count" value='Few' checked="checked"> Few </input>
	&nbsp;
	<input type="radio" class="radio" name="freshleaf_count" value='Many'> Many </input>
	&nbsp;	
	<input type="radio" class="radio" name="freshleaf_count" value='Full'  > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
}
else
{
if($usr_obs_detail['freshleaf_count']=='Many')
{
	?>
	<div id="freshfmf" style="display:block;">
	<input type="radio" class="radio" name="freshleaf_count" value='Few'  > Few</input>
	&nbsp;
	<input type="radio" class="radio" name="freshleaf_count" value='Many' checked="checked"> Many </input>
	&nbsp;
	<input type="radio" class="radio" name="freshleaf_count" value='Full'  > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
	}
else 
{
if($usr_obs_detail['freshleaf_count']=='Full')
{
	?>
	<div id="freshfmf" style="display:block;">
	<input type="radio" class="radio" name="freshleaf_count" value='Few'  > Few</input>
	&nbsp;
	<input type="radio" class="radio" name="freshleaf_count" value='Many' > Many </input>
	&nbsp;
	<input type="radio" class="radio" name="freshleaf_count" value='Full' checked="checked" > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
	}
	else
	{
	?>
	<div id="freshfmf" style="display:none;">
	<input type="radio" class="radio" name="freshleaf_count" value='Few'  > Few</input>
	&nbsp;
	<input type="radio" class="radio" name="freshleaf_count" value='Many' > Many </input>
	&nbsp;
	<input type="radio" class="radio" name="freshleaf_count" value='Full' > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
	}
}
}
?>	
<br/>
</td>
</tr>



<tr> 
<td align=right>Is Leaf Mature</td>
<td>
<?php
if ($usr_obs_detail['is_leaf_mature']==1)
{ 
	?>
	<input type="radio" class="radio" name="is_leaf_mature" value="1"  checked="checked" onClick = "enablecount(this.name);" > Yes </input>
	&nbsp;
	<input type="radio" class="radio" name="is_leaf_mature" value="0" onClick = "disablecount(this.name);" > No </input>
	&nbsp;	
	<input type="radio" class="radio" name="is_leaf_mature" value="2"  onClick = "disablecount(this.name);" > Don't know</input>
	<?php
}
else
{
if($usr_obs_detail['is_leaf_mature']==0)
{
	?>
	<input type="radio" class="radio" name="is_leaf_mature" value='1' onClick = "enablecount(this.name);" > Yes</input>
	&nbsp;
	<input type="radio" class="radio" name="is_leaf_mature" value='0' checked="checked" onClick = "disablecount(this.name);"> No </input>
	&nbsp;
	<input type="radio" class="radio" name="is_leaf_mature" value='2' onClick = "disablecount(this.name);" > Don't know</input>
	<?php
	}
else 
{
?>
	<input type="radio" class="radio" name="is_leaf_mature" value='1'  onClick = "enablecount(this.name);" > Yes</input>
	&nbsp;
	<input type="radio" class="radio" name="is_leaf_mature" value='0' onClick = "disablecount(this.name);"> No </input>
	&nbsp;
	<input type="radio" class="radio" name="is_leaf_mature" value='2' checked="checked" onClick = "disablecount(this.name);"> Don't know</input>
<?php
}
}
?>	
<br/><br/>
<?php
if ($usr_obs_detail['matureleaf_count']=='Few')
{
	?>
	<div id="maturefmf" style="display:block;">
	<input type="radio" class="radio" name="matureleaf_count" value='Few' checked="checked"> Few </input>
	&nbsp;
	<input type="radio" class="radio" name="matureleaf_count" value='Many'> Many </input>
	&nbsp;	
	<input type="radio" class="radio" name="matureleaf_count" value='Full'  > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
}
else
{
if($usr_obs_detail['matureleaf_count']=='Many')
{
	?>
	<div id="maturefmf" style="display:block;">
	<input type="radio" class="radio" name="matureleaf_count" value='Few'  > Few</input>
	&nbsp;
	<input type="radio" class="radio" name="matureleaf_count" value='Many' checked="checked"> Many </input>
	&nbsp;
	<input type="radio" class="radio" name="matureleaf_count" value='Full'  > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
	}
else 
{
if($usr_obs_detail['matureleaf_count']=='Full')
{
	?>
	<div id="maturefmf" style="display:block;">
	<input type="radio" class="radio" name="matureleaf_count" value='Few'  > Few</input>
	&nbsp;
	<input type="radio" class="radio" name="matureleaf_count" value='Many' > Many </input>
	&nbsp;
	<input type="radio" class="radio" name="matureleaf_count" value='Full' checked="checked" > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
	}
	else
	{
	?>
	<div id="maturefmf" style="display:none;">
	<input type="radio" class="radio" name="matureleaf_count" value='Few'  > Few</input>
	&nbsp;
	<input type="radio" class="radio" name="matureleaf_count" value='Many' > Many </input>
	&nbsp;
	<input type="radio" class="radio" name="matureleaf_count" value='Full' > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
	}
}
}
?>	
<br/><br/>
</td>
</tr>


<tr bgcolor="#C3D9FF" > 
<td align=right>Is Flower Bud</td>
<td>
	<?php
if ($usr_obs_detail['is_flower_bud']==1)
{ 
	?>
	<input type="radio" class="radio" name="is_flower_bud" value="1"  checked="checked" onClick = "enablecount(this.name);" > Yes </input>
	&nbsp;
	<input type="radio" class="radio" name="is_flower_bud" value="0" onClick = "disablecount(this.name);" > No </input>
	&nbsp;	
	<input type="radio" class="radio" name="is_flower_bud" value="2"  onClick = "disablecount(this.name);" > Don't know</input>
	<?php
}
else
{
if($usr_obs_detail['is_flower_bud']==0)
{
	?>
	<input type="radio" class="radio" name="is_flower_bud" value='1' onClick = "enablecount(this.name);" > Yes</input>
	&nbsp;
	<input type="radio" class="radio" name="is_flower_bud" value='0' checked="checked" onClick = "disablecount(this.name);"> No </input>
	&nbsp;
	<input type="radio" class="radio" name="is_flower_bud" value='2' onClick = "disablecount(this.name);" > Don't know</input>
	<?php
	}
else 
{
?>
	<input type="radio" class="radio" name="is_flower_bud" value='1'  onClick = "enablecount(this.name);" > Yes</input>
	&nbsp;
	<input type="radio" class="radio" name="is_flower_bud" value='0' onClick = "disablecount(this.name);"> No </input>
	&nbsp;
	<input type="radio" class="radio" name="is_flower_bud" value='2' checked="checked" onClick = "disablecount(this.name);"> Don't know</input>
<?php
}
}
?>	
<br/><br/>
<?php
if ($usr_obs_detail['bud_count']=='Few')
{
	?>
	<div id="budfmf" style="display:block;">
	<input type="radio" class="radio" name="bud_count" value='Few' checked="checked"> Few </input>
	&nbsp;
	<input type="radio" class="radio" name="bud_count" value='Many'> Many </input>
	&nbsp;	
	<input type="radio" class="radio" name="bud_count" value='Full'  > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
}
else
{
if($usr_obs_detail['bud_count']=='Many')
{
	?>
	<div id="budfmf" style="display:block;">
	<input type="radio" class="radio" name="bud_count" value='Few'  > Few</input>
	&nbsp;
	<input type="radio" class="radio" name="bud_count" value='Many' checked="checked"> Many </input>
	&nbsp;
	<input type="radio" class="radio" name="bud_count" value='Full'  > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
	}
else 
{
if($usr_obs_detail['bud_count']=='Full')
{
	?>
	<div id="budfmf" style="display:block;">
	<input type="radio" class="radio" name="bud_count" value='Few'  > Few</input>
	&nbsp;
	<input type="radio" class="radio" name="bud_count" value='Many' > Many </input>
	&nbsp;
	<input type="radio" class="radio" name="bud_count" value='Full' checked="checked" > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
	}
	else
	{
	?>
	<div id="budfmf" style="display:none;">
	<input type="radio" class="radio" name="bud_count" value='Few'  > Few</input>
	&nbsp;
	<input type="radio" class="radio" name="bud_count" value='Many' > Many </input>
	&nbsp;
	<input type="radio" class="radio" name="bud_count" value='Full' > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
	}
}
}
?>	
<br/>
</td>
</tr>




<tr> 
<td align=right>Is Flower Open</td>
<td>
	<?php
if ($usr_obs_detail['is_flower_open']==1)
{ 
	?>
	<input type="radio" class="radio" name="is_flower_open" value="1"  checked="checked" onClick = "enablecount(this.name);" > Yes </input>
	&nbsp;
	<input type="radio" class="radio" name="is_flower_open" value="0" onClick = "disablecount(this.name);" > No </input>
	&nbsp;	
	<input type="radio" class="radio" name="is_flower_open" value="2"  onClick = "disablecount(this.name);" > Don't know</input>
	<?php
}
else
{
if($usr_obs_detail['is_flower_open']==0)
{
	?>
	<input type="radio" class="radio" name="is_flower_open" value='1' onClick = "enablecount(this.name);" > Yes</input>
	&nbsp;
	<input type="radio" class="radio" name="is_flower_open" value='0' checked="checked" onClick = "disablecount(this.name);"> No </input>
	&nbsp;
	<input type="radio" class="radio" name="is_flower_open" value='2' onClick = "disablecount(this.name);" > Don't know</input>
	<?php
	}
else 
{
?>
	<input type="radio" class="radio" name="is_flower_open" value='1'  onClick = "enablecount(this.name);" > Yes</input>
	&nbsp;
	<input type="radio" class="radio" name="is_flower_open" value='0' onClick = "disablecount(this.name);"> No </input>
	&nbsp;
	<input type="radio" class="radio" name="is_flower_open" value='2' checked="checked" onClick = "disablecount(this.name);"> Don't know</input>
<?php
}
}
?>	
<br/><br/>
<?php
if ($usr_obs_detail['open_flower_count']=='Few')
{
	?>
	<div id="flowerfmf" style="display:block;">
	<input type="radio" class="radio" name="open_flower_count" value='Few' checked="checked"> Few </input>
	&nbsp;
	<input type="radio" class="radio" name="open_flower_count" value='Many'> Many </input>
	&nbsp;	
	<input type="radio" class="radio" name="open_flower_count" value='Full'  > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
}
else
{
if($usr_obs_detail['open_flower_count']=='Many')
{
	?>
	<div id="flowerfmf" style="display:block;">
	<input type="radio" class="radio" name="open_flower_count" value='Few'  > Few</input>
	&nbsp;
	<input type="radio" class="radio" name="open_flower_count" value='Many' checked="checked"> Many </input>
	&nbsp;
	<input type="radio" class="radio" name="open_flower_count" value='Full'  > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
	}
else 
{
if($usr_obs_detail['open_flower_count']=='Full')
{
	?>
	<div id="flowerfmf" style="display:block;">
	<input type="radio" class="radio" name="open_flower_count" value='Few'  > Few</input>
	&nbsp;
	<input type="radio" class="radio" name="open_flower_count" value='Many' > Many </input>
	&nbsp;
	<input type="radio" class="radio" name="open_flower_count" value='Full' checked="checked" > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
	}
	else
	{
	?>
	<div id="flowerfmf" style="display:none;">
	<input type="radio" class="radio" name="open_flower_count" value='Few'  > Few</input>
	&nbsp;
	<input type="radio" class="radio" name="open_flower_count" value='Many' > Many </input>
	&nbsp;
	<input type="radio" class="radio" name="open_flower_count" value='Full' > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
	}
}
}
?>	
<br/>
</td>
</tr>



<tr bgcolor="#C3D9FF" > 
<td align=right>Unripe Fruit</td>
<td>
<?php
if ($usr_obs_detail['is_fruit_unripe']==1)
{ 
	?>
	<input type="radio" class="radio" name="is_fruit_unripe" value="1"  checked="checked" onClick = "enablecount(this.name);" > Yes </input>
	&nbsp;
	<input type="radio" class="radio" name="is_fruit_unripe" value="0" onClick = "disablecount(this.name);" > No </input>
	&nbsp;	
	<input type="radio" class="radio" name="is_fruit_unripe" value="2"  onClick = "disablecount(this.name);" > Don't know</input>
	<?php
}
else
{
if($usr_obs_detail['is_fruit_unripe']==0)
{
	?>
	<input type="radio" class="radio" name="is_fruit_unripe" value='1' onClick = "enablecount(this.name);" > Yes</input>
	&nbsp;
	<input type="radio" class="radio" name="is_fruit_unripe" value='0' checked="checked" onClick = "disablecount(this.name);"> No </input>
	&nbsp;
	<input type="radio" class="radio" name="is_fruit_unripe" value='2' onClick = "disablecount(this.name);" > Don't know</input>
	<?php
	}
else 
{
?>
	<input type="radio" class="radio" name="is_fruit_unripe" value='1'  onClick = "enablecount(this.name);" > Yes</input>
	&nbsp;
	<input type="radio" class="radio" name="is_fruit_unripe" value='0' onClick = "disablecount(this.name);"> No </input>
	&nbsp;
	<input type="radio" class="radio" name="is_fruit_unripe" value='2' checked="checked" onClick = "disablecount(this.name);"> Don't know</input>
<?php
}
}
?>	
<br/><br/>
<?php
if ($usr_obs_detail['fruit_unripe_count']=='Few')
{
	?>
	<div id="unripefmf" style="display:block;">
	<input type="radio" class="radio" name="fruit_unripe_count" value='Few' checked="checked"> Few </input>
	&nbsp;
	<input type="radio" class="radio" name="fruit_unripe_count" value='Many'> Many </input>
	&nbsp;	
	<input type="radio" class="radio" name="fruit_unripe_count" value='Full'  > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
}
else
{
if($usr_obs_detail['fruit_unripe_count']=='Many')
{
	?>
	<div id="unripefmf" style="display:block;">
	<input type="radio" class="radio" name="fruit_unripe_count" value='Few'  > Few</input>
	&nbsp;
	<input type="radio" class="radio" name="fruit_unripe_count" value='Many' checked="checked"> Many </input>
	&nbsp;
	<input type="radio" class="radio" name="fruit_unripe_count" value='Full'  > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
	}
else 
{
if($usr_obs_detail['fruit_unripe_count']=='Full')
{
	?>
	<div id="unripefmf" style="display:block;">
	<input type="radio" class="radio" name="fruit_unripe_count" value='Few'  > Few</input>
	&nbsp;
	<input type="radio" class="radio" name="fruit_unripe_count" value='Many' > Many </input>
	&nbsp;
	<input type="radio" class="radio" name="fruit_unripe_count" value='Full' checked="checked" > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
	}
	else
	{
	?>
	<div id="unripefmf" style="display:none;">
	<input type="radio" class="radio" name="fruit_unripe_count" value='Few'  > Few</input>
	&nbsp;
	<input type="radio" class="radio" name="fruit_unripe_count" value='Many' > Many </input>
	&nbsp;
	<input type="radio" class="radio" name="fruit_unripe_count" value='Full' > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
	}
}
}
?>	
<br/>
</td>
</tr>






<tr> 
<td align=right>Ripe Fruit</td>
<td>
<?php
if ($usr_obs_detail['is_fruit_ripe']==1)
{ 
	?>
	<input type="radio" class="radio" name="is_fruit_ripe" value="1"  checked="checked" onClick = "enablecount(this.name);" > Yes </input>
	&nbsp;
	<input type="radio" class="radio" name="is_fruit_ripe" value="0" onClick = "disablecount(this.name);" > No </input>
	&nbsp;	
	<input type="radio" class="radio" name="is_fruit_ripe" value="2"  onClick = "disablecount(this.name);" > Don't know</input>
	<?php
}
else
{
if($usr_obs_detail['is_fruit_ripe']==0)
{
	?>
	<input type="radio" class="radio" name="is_fruit_ripe" value='1' onClick = "enablecount(this.name);" > Yes</input>
	&nbsp;
	<input type="radio" class="radio" name="is_fruit_ripe" value='0' checked="checked" onClick = "disablecount(this.name);"> No </input>
	&nbsp;
	<input type="radio" class="radio" name="is_fruit_ripe" value='2' onClick = "disablecount(this.name);" > Don't know</input>
	<?php
	}
else 
{
?>
	<input type="radio" class="radio" name="is_fruit_ripe" value='1'  onClick = "enablecount(this.name);" > Yes</input>
	&nbsp;
	<input type="radio" class="radio" name="is_fruit_ripe" value='0' onClick = "disablecount(this.name);"> No </input>
	&nbsp;
	<input type="radio" class="radio" name="is_fruit_ripe" value='2' checked="checked" onClick = "disablecount(this.name);"> Don't know</input>
<?php
}
}
?>	
<br/><br/>
<?php
if ($usr_obs_detail['fruit_ripe_count']=='Few')
{
	?>
	<div id="ripefmf" style="display:block;">
	<input type="radio" class="radio" name="fruit_ripe_count" value='Few' checked="checked"> Few </input>
	&nbsp;
	<input type="radio" class="radio" name="fruit_ripe_count" value='Many'> Many </input>
	&nbsp;	
	<input type="radio" class="radio" name="fruit_ripe_count" value='Full'  > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
}
else
{
if($usr_obs_detail['fruit_ripe_count']=='Many')
{
	?>
	<div id="ripefmf" style="display:block;">
	<input type="radio" class="radio" name="fruit_ripe_count" value='Few'  > Few</input>
	&nbsp;
	<input type="radio" class="radio" name="fruit_ripe_count" value='Many' checked="checked"> Many </input>
	&nbsp;
	<input type="radio" class="radio" name="fruit_ripe_count" value='Full'  > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
	}
else 
{
if($usr_obs_detail['fruit_ripe_count']=='Full')
{
	?>
	<div id="ripefmf" style="display:block;">
	<input type="radio" class="radio" name="fruit_ripe_count" value='Few'  > Few</input>
	&nbsp;
	<input type="radio" class="radio" name="fruit_ripe_count" value='Many' > Many </input>
	&nbsp;
	<input type="radio" class="radio" name="fruit_ripe_count" value='Full' checked="checked" > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
	}
	else
	{
	?>
	<div id="ripefmf" style="display:none;">
	<input type="radio" class="radio" name="fruit_ripe_count" value='Few'  > Few</input>
	&nbsp;
	<input type="radio" class="radio" name="fruit_ripe_count" value='Many' > Many </input>
	&nbsp;
	<input type="radio" class="radio" name="fruit_ripe_count" value='Full' > Full</input>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#d95c15">Optional</font>
	<div1 id="tooltiptest">
	<a title="Please opt for “Few” if you find that approximately 1-30% of the canopy/crown-cover is covered by these; “Many” if approximately 30-60% & “Full” if 60-100% of the branches are covered by these. " href="#">(?)</a>
	</div>
	</div>
	<?php
	}
}
}
?>	
<br/>
</td>
</tr>


 

<tr> 
<td align=right>Animal /Bird /Insect Desc</td>
<td><textarea name="animal_desc" cols="40" rows="5" id="animal_desc"><? echo $usr_obs_detail['animal_desc'];?> </textarea><br>
</td>
</tr>

 
<!-- <tr> 
<td align=right>Temperature Max (°C) </td>
<td align=left><input type="text" name="temperature_max" value="<? echo $usr_obs_detail['temperature_max'];?>"style="width:200px;">
</tr>
<tr>
<td align=left>Temperature Min (°C) </td>
<td><input type="text" name="temperature_min" value="<? echo $usr_obs_detail['temperature_min'];?>"  style="width:200px;"></td>
</tr> 

<tr> 
<td align=right>Rainfall (mm)</td>
<td><input type="text" name="rainfall_mm"  value="<? echo $usr_obs_detail['rainfall_mm'];?>" style="width:200px;"></td>
</tr> 

<tr> 
<td align=right>Humidity (%)</td>
<td><input type="text" name="humidity_mm" value="<? echo $usr_obs_detail['humidity_mm'];?>" style="width:200px;"></td>
</tr>  -->

<tr> 
<td>
<p align="center">
<input name="doUpdate" type="submit" id="doUpdate" value="Update">
&nbsp;
<input type=reset  value="Cancel"  class=buttonstyle onclick="javascript:window.top.tb_remove();">
</p>
</td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>
