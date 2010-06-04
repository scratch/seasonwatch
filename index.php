<?php 
session_start(); 
?>
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<title>SeasonWatch</title>
<?php 
include("header_head.php");
?> 

<link rel="stylesheet" href="blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="blueprint/print.css" type="text/css" media="print">
<!-- <link rel="stylesheet" href="blueprint/ie.css" type="text/css" media="ie"> -->
<link rel="stylesheet" href="blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
<!--<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script> -->
<script type="text/javascript" src="js/jquery.validate.js"></script>
<link rel="stylesheet" href="css/styles_new.css" type="text/css"></link>
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
    
    //for zoom india locations 	
	//map.setZoom(map.getBoundsZoomLevel(bounds)-1);
	map.setZoom(map.getBoundsZoomLevel(bounds));
	}
	
$("#message").appendTo( map.getPane(G_MAP_FLOAT_SHADOW_PANE) );
				
function showMessage(marker, text){
var markerOffset = map.fromLatLngToDivPixel(marker.getPoint());
$("#message").hide().fadeIn('slow')
.css({ top:markerOffset.y, left:markerOffset.x })
.html(text);
}
});
</script>



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


<style media="screen" type="text/css"> 
#map { float:left; width:700px; height:350px;margin:10;padding:0; border: solid 0.2px; }
#list { float:right; width:200px;height:350px; background:#fff;
 list-style:none; padding:0;margin:0;margin-right:8px; 
 background-image:url('images/boxshadow.gif'); 
 background-position:bottom left; 
 background-repeat:no-repeat;
 font-size:12px;
  }
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

</head>

<body>
<?php 
include("header_body.php");
?>

<div class="container first_image" style=" background-color:#fffff9; background-image: url('images/gradientbg.png'); background-repeat: repeat-x; background-position: bottom left; width:950px; padding-bottom:5px;"><!-- style="-moz-border-radius-bottomleft: 10px; -moz-border-radius-bottomright: 10px;"> -->
<table>
<tbody>
<tr>
<td></td>
</tr>
</tbody>
</table>
<div></div>

<div class="map-show-link" style="margin-top: -10px;">
<a id="map-show-hide" href="#">
All Registered Trees
<span style="color: rgb(217, 92, 30);">(+)</span>
</a>
<div id="map" style="margin-left: 8px; position: relative; background-color: rgb(229, 227, 223); display: block;">
</div>
</div>
<ul id="list" style="display: block;">
</ul>
<div id="message"></div>


<!-- <ul id="list" style=""> 
<li>Pine; Pine wood is hard and tough except white pine which is soft. It decays easily if it comes into contact with soil.</li>
<li>Oak, Oak is strong and durable, with straight silvery grain. It is used for preparing sporting goods..</li>
<li>Toon, Red Cedar It can be easily worked. It is light in weight. It is used for such products as furniture, packing boxes, cabinet making and door panels.</li>
<li>Tamarind Tamarind is knotty and durable. It is a beautiful tree for avenue and gardens. Its development is very slow but it ultimately forms a massive appearance</li>
<li>Sal It is hard, fibrous and close-grained. It does not take up a good polish. It requires slow and careful seasoning</li></ul>
 -->
 
<table style="width: 930px; margin-left: auto; margin-right: auto;">
<tbody>
<tr>
<td colspan="2">
<hr/>
</td>
</tr>
<tr>
<td class="cms" style="border-right: 1px solid rgb(217, 92, 21); width: 45%;">
<h3>About SeasonWatch</h3>
<p>
<span style="">The affinities of all the beings of the same class have sometimes been represented by a great tree... As buds give rise by growth to fresh buds, and these if vigorous, branch out and overtop on all sides many a feebler branch, so by generation I believe it has been with the great Tree of Life, which fills with its dead and broken branches the crust of the earth, and covers the surface with its ever branching and beautiful ramifications."
Charles Darwin, 1859
</p>
</td>
<td class="cms" style="width: 45%; padding-left: 15px;">
<h3>About SeasonWatch</h3>
<p>
<span style="">"The affinities of all the beings of the same class have sometimes been represented by a great tree... As buds give rise by growth to fresh buds, and these if vigorous, branch out and overtop on all sides many a feebler branch, so by generation I believe it has been with the great Tree of Life, which fills with its dead and broken branches the crust of the earth, and covers the surface with its ever branching and beautiful ramifications."
Charles Darwin, 1859
</td>
</tr>


<tr>
<td colspan="2">
<hr/>
</td>
</tr>
<tr>
<td class="cms" colspan="2">
<h3>this is header 3</h3>
<p>
<span class="ver12blkht">A tree is a perennial woody plant. It is most often defined as a woody plant that has many secondary branches supported clear of the ground on a single main stem or trunk with clear apical dominance.[1] A minimum height specification at maturity is cited by some authors, varying from 3 m[2] to 6 m;[3] some authors set a minimum of 10 cm trunk diameter (30 cm girth).[4] Woody plants that do not meet these definitions by having multiple stems and/or small size, are called shrubs."</span>
<span class="ver12blkht">A tree is a perennial woody plant. It is most often defined as a woody plant that has many secondary branches supported clear of the ground on a single main stem or trunk with clear apical dominance.[1] A minimum height specification at maturity is cited by some authors, varying from 3 m[2] to 6 m;[3] some authors set a minimum of 10 cm trunk diameter (30 cm girth).[4] Woody plants that do not meet these definitions by having multiple stems and/or small size, are called shrubs
</p>
</td>
</tr>
</tbody>
</table>

<!-- <script type="text/javascript">
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
</script> -->

</div>
</div>
</div>
<div class="container bottom"  style="background-image:url('images/pagebottomstrip.png');
 background-repeat:no-repeat;
 width:990px;
 padding-top:30px;
 background-color:#fff;
 margin-left:auto;
 margin-right:auto;">
</div>
</body>
</html>


