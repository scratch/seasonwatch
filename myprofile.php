<?php 
include './includes/dbc.php';
page_protect();
 
    
if( !$_SESSION['user_id'] ) {
echo "<div class='notice'>You have to be logged in to access this page</div>";
exit();
}
  
 
   $lat = 22.97;
   $lng = 77.56;
 
?>
   $user_id = $_GET['id'];

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>SeasonWatch : MyProfile</title>
<link rel="stylesheet" href="blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="blueprint/print.css" type="text/css" media="print">
<link rel="stylesheet" href="blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<link rel="stylesheet" href="css/styles_new.css" type="text/css"></link>
<link rel="stylesheet" href="css/sighting.css" type="text/css"></link>
<script type="text/javascript" src="jquery.validate.js"></script>
<script type="text/javascript" src="jquery.form.js"></script>
<!--<script type="text/javascript" src="http://maps.google.com/maps?file=api&v=2&sensor=true&key=ABQIAAAAz2GdKU-VPA5WYpd4RF7AQxTAtgX-6aoE9zEkmxGVRHN2Hj-ZSRSK3wGiUAuG-lhBGFCY_8nhhJ6vHA"></script>
// Note: you will need to replace the sensor parameter below with either an explicit true or false value.-->
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAD7le_JdD5K74PSSUBnObehRsHoBIMdGoj7fYMR4ZU5G-PLcp5xQErnuU0KTDUg_ffjopaA7ztNS01g" type="text/javascript"></script>
<script type="text/javascript" charset="UTF-8" src="http://maps.gstatic.com/cat_js/intl/en_ALL/mapfiles/208a/maps2.api/%7Bmod_drag,mod_ctrapi,mod_scrwh,mod_kbrd,mod_api_gc%7D.js"></script>
<script type="text/javascript" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/208a/maps2.api/main.js"></script>
<script type="text/javascript" charset="UTF-8" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/208a/maps2.api/mod_apiiw.js"/></script>
<script type="text/javascript" charset="UTF-8" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/208a/maps2.api/mod_exdom.js"/></script>
<style type="text/css">
@media print{.gmnoprint{display:none}}@media screen{.gmnoscreen{display:none}}
</style>
<style>
.error { color: red; }
</style>
</head> 
<body onload="load()">

<?php
include("contribheader.php");
include("page_includes_js.php");
include("google_maps_api.php");
$username = getUserNameById($user_id,$connect);
?>
<div class="container first_image">
 
<?
 
$sql= "select u.city,u.district,s.state from migwatch_users as u, migwatch_states as s where s.state_id = u.state_id and u.user_id='$user_id'";
$result_user = mysql_query($sql);
$user_info = mysql_fetch_assoc($result_user);
 
if($user_info['city']) {
   $user_location .= $user_info['city'] .", ";
}
 
if($user_info['district']) {
   $user_location .= $user_info['district'] .", ";
}
$user_location .= $user_info['state'];
 
 
$sql= "SELECT l1.id, l1.sighting_date,l1.obs_type,l.location_id,l.latitude,l.longitude, u.user_id,l1.entered_on, l.location_name,l.city,l.district, u.user_name, s.state, c.scientific_name,c.common_name FROM migwatch_l1 l1 INNER JOIN migwatch_species c ON l1.species_id = c.species_id INNER JOIN migwatch_locations l ON l1.location_id = l.location_id INNER JOIN migwatch_states s ON s.state_id = l.state_id INNER JOIN migwatch_users u ON u.user_id = l1.user_id AND u.user_id='$user_id' order by l1.id limit 10";
$sighting_result = mysql_query($sql);

echo "<table>";
echo "<tr><td><span style='font-weight:bold;font-size:17px'>" . $username . "</span>&nbsp;&nbsp;";
//if($_SESSION) {
echo "<a class='thickbox' title='send a personal message to " . $username . "' href='" . $src_base . "message.php?height=200&width=400'>send message</a>";
//}
echo "<br><span style='font-weight:bold'>" . $user_location . "</span></td></tr>";
?>
<tr><td>
<ul style="list-style-type: none;">
<li style="float:left;">
<a style='color:#fff;float:left;background-color:#333;color:#fff;padding:5px;width:100px;text-align:center;border-right:solid 1px #fff' href='profiles/<? echo $user_id; ?>'>Latest sightings</a>
</li>
<li style="float:left"><a style='color:#fff;float:left;background-color:#333;color:#fff;padding:5px;width:100px;text-align:center;' href='profiles/<? echo $user_id; ?>/&view=location'>map</a></li>
</ul>
</td>
</tr>
<?
if(!$_GET['view']) {
while( $row = mysql_fetch_array($sighting_result)) {
$id = $row['id'];
    echo "<tr><td style='padding:10px'>" . $username . " submitted a " . ucfirst($row['obs_type']) . " sighting for " . $row['common_name'] . " from <a title='click here to see location information' href='/location.php?id=" . $row['location_id'] . "'>" . $row['location_name'] . "</a> on " . $row['sighting_date'] . " (<a title='click here to see the sighting details' href='sighting.php?id=" . $id . "'>link</a>)</td></tr>";
 
}
 
}
echo "</table>";
$locations = getAllMyLocationData($user_id, $connect);
if($_GET['view'] == 'location' ) {
echo "<table>";
?>
<tr><td><div id="map" style="width:700px;height:350px;"></div></td></tr>
</table>
<? } ?>
</div>
</div>
</div>
<div class="container bottom">
 
</div>
<?php
?>
<script type="text/javascript">
 
//<![CDATA[
function createMarker(point, location) {
var marker = new GMarker(point);
GEvent.addListener(marker, "click", function() {
marker.openInfoWindowHtml(location);
});
return marker;
}
 
function load(){
var map = new GMap2(document.getElementById("map"), {size:new GSize(700,350)});
<?
         for($i=0; $i< count($locations); $i++) {
       $state_id=$locations[$i]['state_id'];
       $state = "select state from migwatch_states where state_id='$state_id'";
      $result = mysql_query($state);
       $data = mysql_fetch_assoc($result);
?>
var point = new GLatLng(<? echo $locations[$i]['latitude'] . ", " . $locations[$i]['longitude']; ?>)
map.addOverlay(createMarker(point, '<? echo $locations[$i]['location_name'] . ", " . $locations[$i]['city'] . ", " . $data['state']; ?>'));
<? } ?>
map.setUIToDefault();
map.setCenter(new GLatLng(20.21,77.86), 4);
}
//]]>
</script>
 
<? include("tab_include.php"); ?>
</body>
</html>