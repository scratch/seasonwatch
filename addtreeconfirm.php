<?php 
include './includes/dbc.php';
page_protect();
 

$speciesname=$_POST['speciesid'];
$_SESSION['speciesid']=$speciesname;
//echo $speciesname;
?> 


<!--Displaying data into dropdown -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="./css/styles.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="./js/CalendarControl.css">
<link type="text/css" rel="stylesheet" href="./js/jquery.autocomplete.css">
<script language="javascript" src="/js/CalendarControl.js"></script>


<script type='text/javascript' src='lib/jquery.ajaxQueue.js'></script>
<script type='text/javascript' src='lib/thickbox-compressed.js'></script>
<script type='text/javascript' src='./jS/localdata.js'></script>
<link rel="stylesheet" type="text/css" href="./css/main.css" />
<link rel="stylesheet" type="text/css" href="./js/thickbox/lib/thickbox.css" />
<link rel="stylesheet" href="css/styles_new.css" type="text/css"></link>
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


<?php
include ("contribheader_body.php");
?>

<div class="container first_image" style="-moz-border-radius-bottomleft: 10px; -moz-border-radius-bottomright: 10px;">
<div>
<hr/>
</div>
<h3>Please verify that this is the species you wish to add</h3>

<form name="species_image" method="POST" action="addtree.php">

<input type = "hidden" name="species_id" value="<? echo $speciesname;?>"/>

<?php
$filename = 'speciesimages/'.$speciesname.'.jpg' ;
//if (file_exists($filename)) {
//    echo "The file $filename exists";
$user_pic2 = 'speciesimages/'.$speciesname.'.jpg' ; ?>
<?php $user_pic3 = 'speciesimages/leaf/'.$speciesname.'.jpg' ; ?> 

<!--<span style="position: relative; top: 12px; left: 100px;"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tree Image</p><?php print"<img src ='".$user_pic2."'width='150px' />"; ?></span>
<span style="position: relative; top: 12px; left: 320px;">test</span>
<span style="position: relative; top: 12px; left: 100px;"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Leaf Image</p><?php print"<img src ='".$user_pic3."'width='150px' />"; ?></span>
<span style="position: relative; top: 12px; left: 320px;">test</span>-->
<table>
<!--<thead>
<th class="header">Images</th><th class="header">Tree Information</th>
</thead>-->
<tr height="15px"></tr>
<tr>
<td width="10%"></td>
<td>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=+1>Tree Image</font></p><?php print"<img src ='".$user_pic2."'width='300px' />"; ?>
</td>
<td align="left" width="50%">
<?php 
?>
<table>
<colgroup>
<col style="width: 50px;"/>
<col style="width: 50px;"/>
</colgroup>
<?php 
$result = mysql_query("SELECT * FROM Species_master WHERE species_id='$speciesname'");

while ($row_settings = mysql_fetch_array($result)) 
{
print "<tr><td><font size=+1>Tree Name: " .$row_settings['species_primary_common_name']."</font></td></tr>";
print "<tr><td><font size=+1>Scientific Name:<i> ".$row_settings['species_scientific_name']. "</font></i></td></tr>";
print "<tr><td><font size=+1>Family: ".$row_settings['family']."</font></td></tr>";
}
print "<tr><td><font size=+1><br/>Alternative Names</font></td></tr>";
$result2 = mysql_query("SELECT * FROM species_alternate_name INNER JOIN language_Master ON species_alternate_name.language_id = language_Master.language_id AND species_alternate_name.species_id='$speciesname'");
while($row_settings2 = mysql_fetch_array($result2))
{
	print "<tr><td><font size=+1>".$row_settings2['Language_name']." Name: " .$row_settings2['alternative_name']."</font></td></tr>";
}
?>
</table>
<br/>
</td>
<!-- <td width="10%"></td> -->
</tr>
<tr>
<td width="10%"></td>
<td>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=+1>Leaf Image</font></p><?php print"<img src ='".$user_pic3."'width='300px' />"; ?>
</td>
<td align="left" width="50%">

<!-- <table>
<colgroup>
<col style="width: 50px;"/>
<col style="width: 50px;"/>
</colgroup>
<?php 
$result = mysql_query("SELECT * FROM Species_master WHERE species_id='$speciesname'");
while ($row_settings = mysql_fetch_array($result)) 
{
print "<tr><td><h4><b>Tree Name: " .$row_settings['species_primary_common_name']."</b></h4></td></tr>";
print "<tr><td><h4><b>Scientific Name: ".$row_settings['species_scientific_name']. "</b></h4></td></tr>";
print "<tr><td><h4><b>Family: ".$row_settings['family']."</b></h4></td></tr>";
}  
?>
</table>
<br/> -->
</td>
<!-- <td></td> -->
</tr>
</table>

<?php 
//} else {
//echo "<div class='notice'>The file $filename does not exist, Please click Ok for adding this tree;</div>";    
//}
?>



<p align="center">
<input type="submit"  name="Submit" id="Submit" value="Yes, this is the species I want to add" style="width:300">
<input name="doRefresh" type="button" id="doRefresh" value="I'm not sure -- take me back to Tree options" onclick="javascript:window.location.href='addtree_options.php';" style="width:300">
</p>
</form>
</div>
</div>
<div class="container bottom">
</div>
</body>
</html>