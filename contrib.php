<?php
include './includes/dbc.php'; 
page_protect();
?>

<html>
<head>
<title>Contributor Homepage </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!-- <link rel='stylesheet' type='text/css' href='css/fullcalendar.css' /> -->
<!-- <script type='text/javascript' src='js/jquery/jquery.js'></script> -->
<link rel="stylesheet" href="blueprint/screen.css" type="text/css" media="screen, projection"></link>
<link rel="stylesheet" href="blueprint/print.css" type="text/css" media="print"></link>
<link rel="stylesheet" href="blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection"></link>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<link rel="stylesheet" href="css/styles_new.css" type="text/css"></link>

<script type="text/javascript">
function validatelist(thisform)
{
if(document.filterform.tree_control.value == 0)
{
alert("Please choose a valid tree name!!");
return false;
}
return true;
}
</script>

<?php
include ("contribheader_head.php");
?>

<!-- GMAP scripts  
<script type="text/javascript" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/208a/maps2.api/main.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps?file=api&v=2&sensor=true&key=ABQIAAAAD7le_JdD5K74PSSUBnObehRsHoBIMdGoj7fYMR4ZU5G-PLcp5xQErnuU0KTDUg_ffjopaA7ztNS01g"></script>
<script type="text/javascript" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/208a/maps2.api/main.js"></script>
<script type="text/javascript" charset="UTF-8" src="http://maps.gstatic.com/cat_js/intl/en_ALL/mapfiles/208a/maps2.api/%7Bmod_drag,mod_ctrapi,mod_scrwh,mod_kbrd,mod_api_gc%7D.js"></script>
<script type="text/javascript" charset="UTF-8" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/208a/maps2.api/mod_apiiw.js"/></script>
<script type="text/javascript" charset="UTF-8" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/208a/maps2.api/mod_exdom.js"/></script>
<style type="text/css">
@media print{.gmnoprint{display:none}}@media screen{.gmnoscreen{display:none}}
</style>
<style>
.error { color: red; }
</style> 

		
<script type="text/javascript">
			google.load("jquery", '1.2.6');
			google.load("maps", "2.x");
</script>
		

<script type="text/javascript" charset="utf-8">
$(function(){
			var map = new GMap2(document.getElementById('map'));
    		var burnsvilleMN = new GLatLng(20.920397,78.222656);
	   	map.setCenter(burnsvilleMN, 3);
			var bounds = new GLatLngBounds();
		   var geo = new GClientGeocoder(); 
		   map.setUIToDefault();
				
var reasons=[];
reasons[G_GEO_SUCCESS]            = "Success";
reasons[G_GEO_MISSING_ADDRESS]    = "Missing Address";
reasons[G_GEO_UNKNOWN_ADDRESS]    = "Unknown Address.";
reasons[G_GEO_UNAVAILABLE_ADDRESS]= "Unavailable Address";
reasons[G_GEO_BAD_KEY]            = "Bad API Key";
reasons[G_GEO_TOO_MANY_QUERIES]   = "Too Many Queries";
reasons[G_GEO_SERVER_ERROR]       = "Server error";
				

// initial load points

	$.getJSON("contribmap-service.php?action=listpoints", function(json) {
	if (json.Locations.length > 0) {
	for (i=0; i<json.Locations.length; i++) {
	var location = json.Locations[i];
	addLocation(location);
	}
zoomToBounds();
}
});
				
$("#add-point").submit(function(){
geoEncode();
return false;
});
				
function savePoint(geocode) {
var data = $("#add-point :input").serializeArray();
data[data.length] = { name: "lng", value: geocode[0] };
data[data.length] = { name: "lat", value: geocode[1] };
$.post($("#add-point").attr('action'), data, function(json){
$("#add-point .error").fadeOut();
if (json.status == "fail") {
$("#add-point .error").html(json.message).fadeIn();
}
if (json.status == "success") {
							$("#add-point :input[name!=action]").val("");
							var location = json.data;
							addLocation(location);
							zoomToBounds();
						}
					}, "json");
				}
				
function geoEncode() {
	var address = $("#add-point input[name=address]").val();
	geo.getLocations(address, function (result){
	if (result.Status.code == G_GEO_SUCCESS) {
	geocode = result.Placemark[0].Point.coordinates;
	savePoint(geocode);
	} else {
		var reason="Code "+result.Status.code;
	if (reasons[result.Status.code]) {
	reason = reasons[result.Status.code]
							} 
							$("#add-point .error").html(reason).fadeIn();
							geocode = false;
						}
					});
				}
				
				function addLocation(location) {
					var point = new GLatLng(location.lat, location.lng);		
					var marker = new GMarker(point);
					map.addOverlay(marker);
					bounds.extend(marker.getPoint());
					
$("<li />")
.html(location.name) 
.click(function(){
showMessage(marker, location.name);
})
.appendTo("#list");
					
GEvent.addListener(marker, "click", function(){
showMessage(this, location.name);
});
}
				
function zoomToBounds() {
	map.setCenter(bounds.getCenter());
    
    //for zoom india locations 	
	//map.setZoom(map.getBoundsZoomLevel(bounds)-1);
	map.setZoom(map.getBoundsZoomLevel(bounds));
	}
	
$("#message").appendTo( map.getPane(G_MAP_FLOAT_SHADOW_PANE) );
				
function showMessage(marker, text){
var markerOffset = map.fromLatLngToDivPixel(marker.getPoint());
$("#message").hide().fadeIn()
.css({ top:markerOffset.y, left:markerOffset.x })
.html(text);
}
});
</script>

<style media="screen" type="text/css"> 
#map { float:left; width:700px; height:350px;margin:0;padding:0; border: solid 0.2px; }
#list { float:right; width:150px;height:350px; background:#fff;
list-style:none; padding:0;margin:0;margin-right:8px; 
background-image:url('images/boxshadow.gif'); 
background-position:bottom left; 
background-repeat:no-repeat;
font-size:12px;}
#list li { padding:10px; } 
#list li:hover { background:#555; color:#fff; cursor:pointer; cursor:hand; } 
#message { background:#555; color:#fff; font-size:10px; position:absolute; display:none; width:100px; padding:5px; }
#add-point { float:left; }
div.input { padding:3px  0; }
label { display:block; font-size:13px; }
input, select { width:150px; }
button { float:right; }
div.error { color:red; font-weight:bold; }
</style>
-->
</head>


<body>
<?php
include ("contribheader_body.php");
?> 
<div class="container first_image" style=" background-color:#fffff9; background-image: url('images/gradientbg.png'); background-repeat: repeat-x; background-position: bottom left; width:950px; padding-bottom:5px;"><!-- style="-moz-border-radius-bottomleft: 10px; -moz-border-radius-bottomright: 10px;"> -->
<table>
<tbody>
<tr>
<td/>
</tr>
</tbody>
</table>
<div>
</div>

<table style="width: 930px; margin-left: auto; margin-right: auto;">
<tbody>
<tr>
<td colspan="2">
<hr/>
</td>
</tr>
<tr>
<td class="cms" style="border-right: 1px solid rgb(217, 92, 21); width: 50%;">
<h3>About SeasonWatch</h3>
<p>
<span style="">SeasonWatch is a new citizen volunteer network that monitors plant phenology (the timing of seasonal events like flowering and fruiting) across India. Observations collected through this network will contribute to an understanding of the effects of climate change on plant ecology.
SeasonWatch will be launched in end-January 2010. If you wish to volunteer with this project, coordinate a local chapter, or help with publicity, please write to citizenscience(at)ncbs.res.in.
<p/>&nbsp;
</td>

<!-- For GMap  
<td class="cms" style="width: 65%; padding-left: 15px;">
<h3>My Trees</h3>
<div id="map" style="margin-left: 8px; position: relative; background-color: rgb(229, 227, 223); display: block;">
</div>
<ul id="list" style="display: none;"></ul>
<div id="message"></div>  
</td>-->
<td class="cms" style="solid rgb(217, 92, 21); width: 50%;">
<h3>About SeasonWatch</h3>
<p>
<span style="">SeasonWatch is a new citizen volunteer network that monitors plant phenology (the timing of seasonal events like flowering and fruiting) across India. Observations collected through this network will contribute to an understanding of the effects of climate change on plant ecology.
SeasonWatch will be launched in end-January 2010. If you wish to volunteer with this project, coordinate a local chapter, or help with publicity, please write to citizenscience(at)ncbs.res.in.
<p/>&nbsp;
</td>

</tr>


<tr>
<td colspan="2">
<hr/>
</td>
</tr>
<tr>
<td class="cms" colspan="2">
<h3>My Observations (for the previous 1 year)</h3>
<p>Choose one of your trees below</p>
<a name="my_observations"></a>
<form method="POST" action=<?php echo $_SERVER['PHP_SELF']."#my_observations";?> name="filterform" onSubmit="return validatelist();"> 
<?php
$tree_id=$_POST['tree_control'];
$sql=mysql_query("SELECT DISTINCT(tree_nickname), user_tree_table.tree_id FROM Species_master JOIN (trees, user_tree_table) ON trees.tree_id = user_tree_table.tree_id AND trees.species_id = Species_master.species_id AND user_tree_table.user_id = '$_SESSION[user_id]'");

echo "<SELECT name='tree_control' id='tree_control'>";
if($tree_id=='') {
	echo "<option value='0' SELECTED>------Chosse a Tree------</option>";
} else {
	echo "<option value='0'>------Chosse a Tree------</option>";
}
while($row=mysql_fetch_array($sql))
{
if($tree_id==$row['tree_id']) {
	echo "<option value=".$row['tree_id']." SELECTED>".$row['tree_nickname']."</option>";
} else {
	echo "<option value=".$row['tree_id'].">".$row['tree_nickname']."</option>";
}
}
echo "</select>";

//echo $tree_id;
?>
<input type="submit"  name="Submit" id="Submit" value="Submit" class=buttonstyle> 
</td>
</form>
<p>
<?php

$end_date=date('Y-m-d');
$m= date("m"); // Month value
$de= date("d"); //today's date
$y= date("Y")-1; // Year value
$start_date= date('Y-m-d', mktime(0,0,0,$m,$de,$y)); 
//echo $end_date, $start_date;
echo "<table border='1' width='50%'><tr><td width='7%'></td><td width='1%'></td><td><b>$start_date</b></td><td width='9%'><b>$end_date</b></td></tr></table>";
echo "<table border='1' width='50%'>";
echo "<tr><td>Fruit Unripe: </td>";
while ($start_date <= $end_date)
{
//echo $start_date;
$de+=7;
$next_week_date= date('Y-m-d', mktime(0,0,0,$m,$de,$y));
//echo $next_week_date;

$user_tree_table_settings = mysql_query("SELECT DISTINCT(user_tree_observations.is_fruit_unripe) 
	   FROM user_tree_observations INNER JOIN (users, user_tree_table, trees,Species_master)
	   ON user_tree_table.user_tree_id = user_tree_observations.user_tree_id 
	   AND user_tree_table.user_id='$_SESSION[user_id]' 
	   AND users.user_id=user_tree_table.user_id 
	   AND user_tree_table.tree_id=trees.tree_id 
	   AND trees.species_id=Species_master.species_id
	   AND user_tree_table.tree_id='$tree_id'
	   AND user_tree_observations.date >='$start_date'
	   AND user_tree_observations.date <='$next_week_date'
       ORDER BY user_tree_observations.date");

$row_settings = mysql_fetch_array($user_tree_table_settings);

//echo "in the inner loop";
//echo $row_settings['is_fruit_unripe']."<br/>";

if($row_settings['is_fruit_unripe']=='0')
{
echo "<td bgcolor='red'></td>";
}
elseif($row_settings['is_fruit_unripe']=='1')
{
echo "<td bgcolor='green'></td>";
}
else
{
echo "<td bgcolor='white'></td>";
}

$start_date=$next_week_date;
}
echo "</tr>";
echo "<tr><td colspan=12></td></tr>";
$m= date("m"); // Month value
$de= date("d"); //today's date
$y= date("Y")-1; // Year value
$start_date= date('Y-m-d', mktime(0,0,0,$m,$de,$y)); 
echo "<tr><td>Fruit Ripe: </td>";
while ($start_date <= $end_date)
{
//echo $start_date;
$de+=7;
$next_week_date= date('Y-m-d', mktime(0,0,0,$m,$de,$y));
//echo $next_week_date;

$user_tree_table_settings = mysql_query("SELECT DISTINCT(user_tree_observations.is_fruit_ripe) 
	   FROM user_tree_observations INNER JOIN (users, user_tree_table, trees,Species_master)
	   ON user_tree_table.user_tree_id = user_tree_observations.user_tree_id 
	   AND user_tree_table.user_id='$_SESSION[user_id]' 
	   AND users.user_id=user_tree_table.user_id 
	   AND user_tree_table.tree_id=trees.tree_id 
	   AND trees.species_id=Species_master.species_id
	   AND user_tree_table.tree_id='$tree_id'
	   AND user_tree_observations.date >='$start_date'
	   AND user_tree_observations.date <='$next_week_date'
       ORDER BY user_tree_observations.date");

$row_settings = mysql_fetch_array($user_tree_table_settings);

//echo "in the inner loop";
//echo $row_settings['is_fruit_unripe']."<br/>";

if($row_settings['is_fruit_ripe']=='0')
{
echo "<td bgcolor='red'></td>";
}
elseif($row_settings['is_fruit_ripe']=='1')
{
echo "<td bgcolor='green'></td>";
}
else
{
echo "<td bgcolor='white'></td>";
}

$start_date=$next_week_date;
}
echo "</tr>";

echo "<tr><td colspan=12></td></tr>";
$m= date("m"); // Month value
$de= date("d"); //today's date
$y= date("Y")-1; // Year value
$start_date= date('Y-m-d', mktime(0,0,0,$m,$de,$y)); 
echo "<tr><td>Flower Open: </td>";
while ($start_date <= $end_date)
{
//echo $start_date;
$de+=7;
$next_week_date= date('Y-m-d', mktime(0,0,0,$m,$de,$y));
//echo $next_week_date;

$user_tree_table_settings = mysql_query("SELECT DISTINCT(user_tree_observations.is_flower_open) 
	   FROM user_tree_observations INNER JOIN (users, user_tree_table, trees,Species_master)
	   ON user_tree_table.user_tree_id = user_tree_observations.user_tree_id 
	   AND user_tree_table.user_id='$_SESSION[user_id]' 
	   AND users.user_id=user_tree_table.user_id 
	   AND user_tree_table.tree_id=trees.tree_id 
	   AND trees.species_id=Species_master.species_id
	   AND user_tree_table.tree_id='$tree_id'
	   AND user_tree_observations.date >='$start_date'
	   AND user_tree_observations.date <='$next_week_date'
       ORDER BY user_tree_observations.date");

$row_settings = mysql_fetch_array($user_tree_table_settings);

//echo "in the inner loop";
//echo $row_settings['is_fruit_unripe']."<br/>";

if($row_settings['is_flower_open']=='0')
{
echo "<td bgcolor='red'></td>";
}
elseif($row_settings['is_flower_open']=='1')
{
echo "<td bgcolor='green'></td>";
}
else
{
echo "<td bgcolor='white'></td>";
}

$start_date=$next_week_date;
}
echo "</tr>";


echo "<tr><td colspan=12></td></tr>";
$m= date("m"); // Month value
$de= date("d"); //today's date
$y= date("Y")-1; // Year value
$start_date= date('Y-m-d', mktime(0,0,0,$m,$de,$y)); 
echo "<tr><td>Flower Bud: </td>";
while ($start_date <= $end_date)
{
//echo $start_date;
$de+=7;
$next_week_date= date('Y-m-d', mktime(0,0,0,$m,$de,$y));
//echo $next_week_date;

$user_tree_table_settings = mysql_query("SELECT DISTINCT(user_tree_observations.is_flower_bud) 
	   FROM user_tree_observations INNER JOIN (users, user_tree_table, trees,Species_master)
	   ON user_tree_table.user_tree_id = user_tree_observations.user_tree_id 
	   AND user_tree_table.user_id='$_SESSION[user_id]' 
	   AND users.user_id=user_tree_table.user_id 
	   AND user_tree_table.tree_id=trees.tree_id 
	   AND trees.species_id=Species_master.species_id
	   AND user_tree_table.tree_id='$tree_id'
	   AND user_tree_observations.date >='$start_date'
	   AND user_tree_observations.date <='$next_week_date'
       ORDER BY user_tree_observations.date");

$row_settings = mysql_fetch_array($user_tree_table_settings);

//echo "in the inner loop";
//echo $row_settings['is_fruit_unripe']."<br/>";

if($row_settings['is_flower_bud']=='0')
{
echo "<td bgcolor='red'></td>";
}
elseif($row_settings['is_flower_bud']=='1')
{
echo "<td bgcolor='green'></td>";
}
else
{
echo "<td bgcolor='white'></td>";
}

$start_date=$next_week_date;
}
echo "</tr>";
echo "<tr><td><br/></td></tr>";
echo "</table>";
echo "<table style='width:70%;'>";
echo "<tr>";
echo "<td>Color Legend: </td>
<td bgcolor='white' width='25%'>No Data / Don't Know</td>
<td bgcolor='red' width='23%'>No</td>
<td bgcolor='green' width='23%'>Yes</td>";
echo "</tr>";
echo "</table>";
//echo "out of loop";
?>

</p>
</td>
</tr>
</tbody>
</table>
</div>
</div>

<div class="container bottom">
<?php mysql_close($link);?>
</div>
</body>
</html>

