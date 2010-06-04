<?php 
include './includes/dbc.php';
page_protect();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>All registered Trees Location</title>
<link rel="stylesheet" href="blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="blueprint/print.css" type="text/css" media="print">
<link rel="stylesheet" href="blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<link rel="stylesheet" href="css/styles_new.css" type="text/css"></link>



<!--<script type="text/javascript" src="http://maps.google.com/maps?file=api&v=2&sensor=true&key=ABQIAAAAz2GdKU-VPA5WYpd4RF7AQxTAtgX-6aoE9zEkmxGVRHN2Hj-ZSRSK3wGiUAuG-lhBGFCY_8nhhJ6vHA"></script>
// Note: you will need to replace the sensor parameter below with either an explicit true or false value.-->
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
		
<style type="text/css" media="screen">
	#map { float:left; width:500px; height:500px; }
	#list { float:left; width:200px; background:#eee; list-style:none; padding:0; }
	#list li { padding:10px; }
	#list li:hover { background:#555; color:#fff; cursor:pointer; cursor:hand; }
	#message { background:#555; color:#fff; position:absolute; display:none; width:100px; padding:5px; }
	#add-point { float:left; }
	div.input { padding:3px 0; }
	label { display:block; font-size:80%; }
	input, select { width:150px; }
	button { float:right; }
	div.error { color:red; font-weight:bold; }
	</style>

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

	$.getJSON("map-service.php?action=listpoints", function(json) {
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
	map.setZoom(map.getBoundsZoomLevel(bounds)-1);
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

<!--basic Script for gmap  

<script type="text/javascript">
$(document).ready(function() {
 $('#map').show();
 $('#list').show();

 $('#map-show-hide').click(function() {
 $('#map').toggle();
 $('#list').toggle();
 });
 $('.error_top').corner(); 

 $('.first_image').corner('bottom');
 //$('#rememberme').toggle();
});
</script> 
 -->

<!-- Map-Toggle Script -->
<script type="text/javascript">
$(document).ready(function() {
$('#map').hide();
$('#list').hide();
var toggled = false;
$('#map-show-hide').click(function() {
$('#map').toggle();
$('#list').toggle();

if( toggled==false ) { $('#map-show-hide').html("All&nbsp;Registered&nbsp;Trees&nbsp;<span style='color:#d95c15'>(-)</span>"); toggled = true; } else {
$('#map-show-hide').html("All&nbsp;Registered&nbsp;Trees&nbsp;<span style='color:#d95c15'>(+)</span>");
 toggled = false;
 }
});
 $('.error_top').corner();

 $('.first_image').corner('bottom');
 //$('#rememberme').toggle();

});
</script>
</head>

<body>
<div class="map-show-link" style="margin-top: -10px;">
<a id="map-show-hide" href="#">
All registered Tree
<span style="color: rgb(217, 92, 21);">(+)</span>
</a>
</div>
<div id="map" style="margin-left: 8px; position: relative; background-color: rgb(229, 227, 223); display: block;"></div>
</div>
<ul id="list" style="display: block;">
</ul>
<div id="message"></div>
</body>


