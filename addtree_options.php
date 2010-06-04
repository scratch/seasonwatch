<?php 
include './includes/dbc.php';
page_protect();
?> 

<!--Displaying data into dropdown -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="blueprint/screen.css" type="text/css" media="screen, projection"></link>
<link rel="stylesheet" href="blueprint/print.css" type="text/css" media="print"></link>
<link rel="stylesheet" href="blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection"><link>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<link rel="stylesheet" href="css/styles_new.css" type="text/css"></link>
<script type="text/javascript" src="js/jquery.js"></script>
<script type='text/javascript' src='js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="js/jquery.autocomplete.css" />

<script type="text/javascript">
$().ready(function() {
	$("#speciesname").autocomplete("rpc.php", {
		width: 260,
		matchContains: true,
		selectFirst: false
	});

	 $("#speciesname").result(function(event, data, formatted) {
    $("#speciesid").val(data[1]);
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
function validatelist(thisform)
{
if(document.speciessearch.speciesid.value == 0)
{
alert("Please choose a valid tree name!!");
return false;
}
return true;
}
</script>

<script type="text/javascript">
function validatebox(firstform)
{
//alert('coming');
if((document.search_frm.speciesname.value == "Type your tree name")||(document.search_frm.speciesname.value == ""))
{
alert("Please type a tree name!");
return false;
}
if(document.search_frm.speciesid.value == "speciesname")
{
alert("Please type a valid tree name!");
return false;
}
return true;
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
<div class="container first_image" style="-moz-border-radius-bottomleft: 10px; -moz-border-radius-bottomright: 10px;">
<div>
<hr/>
</div>



<!-- <h3>Identify a species using any of the 3 options below</h3> -->
<table style="width: 930px; margin-left: auto; margin-right: auto;">
<tbody>
<tr>
<td  width="450px">
<h3>Add a Tree through Keyword Search</h3>

<div id="content"> 
<form name="search_frm" action="addtreeconfirm.php" method="POST" autocomplete="off" onSubmit="return validatebox();">
<input type="hidden" name="speciesid" id="speciesid" value="speciesname"/>
<p>
Tree Name
<input id="speciesname" class="emptyonclick" class="ac_input" type="text" name="speciesname" autocomplete="off" value="Type your tree name" />
<!--<input type="button" value="Get Value"/>-->
<input type="submit"  name="Submit" id="Submit" value="Submit"> 
</p>
</form>
</div>


<!--<tr>
<form name="kwdsearch" method="POST" action="keywordsearch.php">
<p>2. Find a Species through Leaf Type </p>
Feathered <input type="radio" name="leaf_type"/><br/>
Camel's Hoof-shaped<input type="radio" name="leaf_type"/><br/>
Plamately compund<input type="radio" name="leaf_type"/><br/>
Feather compound<input type="radio" name="leaf_type"/>
<input type="submit"  name="Submit" id="Submit" value="Submit" class=buttonstyle> 
</form>
<br/><br/><br/>
</tr>-->

<br/><br/><br/>
</td>
</tr>
<tr>&nbsp;&nbsp;&nbsp;&nbsp;</tr>
<tr>
<h6>"This list contains only those species selected for being
monitored under SeasonWatch. If you want to suggest additional species
for this list, please write to sw@seasonwatch.in"</h6>
</tr>
<tr>&nbsp;&nbsp;</tr>

<tr>
<td  width="450px">
<h3>Add a Tree by selecting from the list below</h3>
<form name="speciessearch" method="POST" action="addtreeconfirm.php" onSubmit="return validatelist();">
<input type = "hidden" name="species_id" value="name"/>

<!--This is old technique, not required now commented by Pavanesh
<select name="speciesid" onChange="getspecies_scientific_name(this.value);getfamily(this.value);">-->




<select name="speciesid" id="speciesid"><?php 
$sql = mysql_query("SELECT species_id,species_primary_common_name, species_scientific_name FROM Species_master ORDER BY species_primary_common_name");
while($row = mysql_fetch_array($sql))
{
$data1.= "<option  value='".$row['species_id']."'>".$row['species_primary_common_name']." (".$row['species_scientific_name'].")</option>";
}  
echo "<option value='0' SELECTED>------Chosse a Tree------</option>";
echo $data1;	
?>

</select>
<input type="submit"  name="Submit" id="Submit" value="Submit" class=buttonstyle> 
&nbsp;&nbsp;
</form>

</td>
</tr>

</tbody>
</table>
</div>
</div>
<div class="container bottom">
</div>
</body>
</html>
