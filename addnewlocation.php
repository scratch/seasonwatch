<?php 
include './includes/dbc.php';
page_protect();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>SeasonWatch : Add a new Location</title>
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
<script type="text/javascript" src="http://maps.google.com/maps?file=api&v=2&sensor=false&key=ABQIAAAAD7le_JdD5K74PSSUBnObehRsHoBIMdGoj7fYMR4ZU5G-PLcp5xQErnuU0KTDUg_ffjopaA7ztNS01g"></script>
<script type="text/javascript" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/208a/maps2.api/main.js"></script>
<script type="text/javascript" charset="UTF-8" src="http://maps.gstatic.com/cat_js/intl/en_ALL/mapfiles/208a/maps2.api/%7Bmod_drag,mod_ctrapi,mod_scrwh,mod_kbrd,mod_api_gc%7D.js"></script>
<script type="text/javascript" charset="UTF-8" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/208a/maps2.api/mod_apiiw.js"/></script>
<script type="text/javascript" charset="UTF-8" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/208a/maps2.api/mod_exdom.js"/></script>
<link type="text/css" rel="stylesheet" href="js/thickbox/thickbox.css"></link>
<script language="javascript" src="js/thickbox/thickbox.js"></script>
<style type="text/css">
@media print{.gmnoprint{display:none}}@media screen{.gmnoscreen{display:none}}
</style>
<style>
.error { color: red; }
</style>

<script type="text/javascript">
var map;
var geocoder;
var address;
String.prototype.trim = function() {
// Strip leading and trailing white-space
 return this.replace(/^\s*|\s*$/g, "");
 }
 function initialize() {
 map = new GMap2(document.getElementById("map"),{size:new GSize(700,350)});
 map.setCenter(new GLatLng(22.97,77.56), 4);
 map.setUIToDefault();
 /*map.enableGoogleBar();
 map.getControl(new GMapTypeControl()); 
 map.GmapUIOptions(controls.maptypecontrol:false);
 
 var mapTypeControl = new GMapTypeControl();
var topRight = new GControlPosition(G_ANCHOR_TOP_RIGHT, new GSize(30,30));
var bottomRight = new GControlPosition(G_ANCHOR_BOTTOM_RIGHT, new GSize(10,10));
map.addControl(mapTypeControl, topRight);
 document.getElementById("hmtctl").style.height="200px";*/
 
 GEvent.addListener(map, "click", getAddress);
 geocoder = new GClientGeocoder();
 }

function getAddress(overlay, latlng) {
if (latlng != null) {
address = latlng;
geocoder.getLocations(latlng, addAddressToMap);
}
}

function addAddressToMap(response) {
map.clearOverlays();
if (!response || response.Status.code != 200) {
alert("Sorry, we were unable to geocode that address");
} else {

place = response.Placemark[0];
point = new GLatLng(place.Point.coordinates[1],
place.Point.coordinates[0]);
map.setCenter(point, 9);
marker = new GMarker(point);
map.addOverlay(marker);
marker.openInfoWindowHtml(place.address + '<br>' +
'<b>Country code:</b> ' + place.AddressDetails.Country.CountryNameCode);
document.getElementById('lat').value = place.Point.coordinates[1];
document.getElementById('lng').value = place.Point.coordinates[0];
document.getElementById('country').value = place.AddressDetails.Country.CountryName;

 if(place.address) {
 var a1 = place.address;
 a1 = a1.split(',');
 }
 var arcount = a1.length;
 var state_name= a1[arcount - 2];
 state_name = state_name.trim();
 $("#state").val(state_name);

 if(a1[arcount-3] != '' ) {

 document.getElementById('city').value = a1[arcount - 3];
 if( a1[arcount - 4] ) {
 document.getElementById('loc_name').value = a1[arcount - 4];
 } else {
 document.getElementById('loc_name').value = '';
 }

 if( a1[arcount - 5] ) {
 document.getElementById('loc_name').value = a1[arcount - 5] + ', ' + document.getElementById('loc_name').value;
 } else {
 document.getElementById('loc_name').value = '';
 }

 if( a1[arcount - 6] ) {
 document.getElementById('loc_name').value = a1[arcount - 6] + ', ' + document.getElementById('loc_name').value;
 } else {
 document.getElementById('loc_name').value = '';
 }
 }
 document.getElementById('zoom').value = map.getZoom();
 }
 }
// showLocation() is called when you click on the Search button
// in the form. It geocodes the address entered into the form
// and adds a marker to the map at that location.

function showLocation()
{
var address = document.forms[0].q.value;

geocoder.getLocations(address, addAddressToMap);

}

// findLocation() is used to enter the sample addresses into the form.
 function findLocation(address) {
 document.forms[0].q.value = address;

showLocation();
}
</script>


<!-- <script type="text/javascript">
$(document).ready(function() {
$("#addNewLocation").validate({
rules: {
loc_name: { required: true },
lat: { required: true, latlng: true },
lng: { required:true, latlng: true },
state: { required: true},
city: { required: true},
},
messages: { 
loc_name: { required: "<br>please enter a name for the location" },
lat: { required: "<br>please enter a latitude", latlng: "<br>invalid latitude" },
lng: { required: "<br>please enter a longitude", latlng: "<br>invalid longitude" },
state: { required: "<br>please enter a state" },
city: { required: "<br>please enter a city" },
}
}); 

jQuery.validator.addMethod("latlng", function(value, element) {
return this.optional(element) || /-?\d+\.\d+/.test(value);
}, "please enter a valid value");
jQuery.validator.addMethod("lettersonly", function(value, element) {
return this.optional(element) || /^[a-z]+$/i.test(value);
}, ""); 


$('#addNewLocation').ajaxForm({
 // target identifies the element(s) to update with the server response
 target: '#newLocationTarget',

 // success identifies the function to invoke when the server response
 // has been received; here we apply a fade-in effect to the new content
 success: function() { 
 $('#newLocationTarget').fadeIn('slow');
 }
 });
});
</script> --> 


<script type="text/javascript"> 
function validate_required(field,alerttxt)
{ 
with (field)
  { 
  if (value==null||value=="")
    { 
    alert(alerttxt);return false;
} 
}
}

function validate_zoomfactor(alerttxt)
{
//alert ("in zoomfactor validation. zoom factor is: "+map.getZoom());
  if (map.getZoom() < 9)
    { 
	    alert(alerttxt);
   	 return false;
	 } 
} 

function validate_form(thisform)
{
//alert("here"+map.getZoom());
with (thisform)
{
if (validate_required(loc_name,"Location name must be filled out!")==false)
{
loc_name.focus();return false;
}

if (validate_required(lat,"Please Use Map to find lattitude!")==false)
{
lat.focus();return false;
}

if (validate_required(lng,"Please Use Map to find longitude!")==false)
{
lng.focus();return false;
}

if (validate_required(city,"city name must be filled out!")==false)
{
city.focus();return false;
}

if (validate_required(state,"state name must be filled out!")==false)
{
state.focus();return false;
}
if (validate_zoomfactor("Please zoom closer using the + button on the map and select your location")==false)
{
return false;
}
else
{
return true;
}
}
}
</script> 
</head> 

<body onload="initialize()" style="">
<div id="add_loc_box_<? echo $type; ?>">
<div id="newLocationTarget"></div> 

<!-- Location Search Form -->
<form action="#" onsubmit="showLocation(); return false;">
<b>Locate your tree</b><br/>
1. Search for your general area using the Search box below or<br/>
2. Zoom and click on the map directly <br/>
<b> Please zoom in as near as possible and click on the exact location of your
tree</b><br/><br/>
<p style="text-align:center">
<b>Search for a location</b>:
<input type="text" name="q" value="" class="address_input" style="width:400px">
<input style="width:80px;background-color:#333; color:#fff; margin-left:-2px" type="submit" name="find" value="Search" class="submit"/>
</p> 
</form>

<!--Location FillUp Form--> 
<form id="addNewLocation" name="editres" action="addlocation.php" method="post" onsubmit="return validate_form(this);">
<table>
<tr>
<td>
<div style="margin-left: auto; margin-right: auto; width: 700px; height: 350px; position: relative; background-color: rgb(229, 227, 223);" id="map">
<div style="overflow: hidden; position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;">
<div style="position: absolute; left: 0px; top: 0px; z-index: 0; cursor: -moz-grab;">
<div style="position: absolute; left: 0px; top: 0px; display: none;">
<div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
<img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -moz-user-select: none;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/transparent.png"/>
<img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -moz-user-select: none;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/transparent.png"/>
<img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -moz-user-select: none;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/transparent.png"/>
<img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -moz-user-select: none;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/transparent.png"/>
<img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -moz-user-select: none;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/transparent.png"/>
<img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -moz-user-select: none;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/transparent.png"/>
<img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -moz-user-select: none;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/transparent.png"/>
<img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -moz-user-select: none;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/transparent.png"/>
<img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -moz-user-select: none;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/transparent.png"/>
<img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -moz-user-select: none;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/transparent.png"/>
<img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -moz-user-select: none;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/transparent.png"/>
<img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -moz-user-select: none;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/transparent.png"/>
<img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -moz-user-select: none;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/transparent.png"/>
<img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -moz-user-select: none;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/transparent.png"/>
<img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -moz-user-select: none;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/transparent.png"/>
</div>
</div>
<div style="position: absolute; left: 0px; top: 0px;">
<div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
<img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: -276px; top: -93px; width: 256px; height: 256px; -moz-user-select: none;" src="http://mt1.google.com/vt/lyrs=m@120&amp;hl=en&amp;src=api&amp;x=9&amp;y=6&amp;z=4&amp;s=G"/><img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: -276px; top: 163px; width: 256px; height: 256px; -moz-user-select: none;" src="http://mt1.google.com/vt/lyrs=m@120&amp;hl=en&amp;src=api&amp;x=9&amp;y=7&amp;z=4&amp;s=Ga"/><img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: -276px; top: 419px; width: 256px; height: 256px; -moz-user-select: none;" src="http://mt1.google.com/vt/lyrs=m@120&amp;hl=en&amp;src=api&amp;x=9&amp;y=8&amp;z=4&amp;s=Gal"/><img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: -20px; top: -93px; width: 256px; height: 256px; -moz-user-select: none;" src="http://mt0.google.com/vt/lyrs=m@120&amp;hl=en&amp;src=api&amp;x=10&amp;y=6&amp;z=4&amp;s=Gali"/><img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: -20px; top: 163px; width: 256px; height: 256px; -moz-user-select: none;" src="http://mt0.google.com/vt/lyrs=m@120&amp;hl=en&amp;src=api&amp;x=10&amp;y=7&amp;z=4&amp;s=Galil"/><img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: -20px; top: 419px; width: 256px; height: 256px; -moz-user-select: none;" src="http://mt0.google.com/vt/lyrs=m@120&amp;hl=en&amp;src=api&amp;x=10&amp;y=8&amp;z=4&amp;s=Galile"/><img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 236px; top: -93px; width: 256px; height: 256px; -moz-user-select: none;" src="http://mt1.google.com/vt/lyrs=m@120&amp;hl=en&amp;src=api&amp;x=11&amp;y=6&amp;z=4&amp;s=Galileo"/><img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 236px; top: 163px; width: 256px; height: 256px; -moz-user-select: none;" src="http://mt1.google.com/vt/lyrs=m@120&amp;hl=en&amp;src=api&amp;x=11&amp;y=7&amp;z=4&amp;s="/><img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 236px; top: 419px; width: 256px; height: 256px; -moz-user-select: none;" src="http://mt1.google.com/vt/lyrs=m@120&amp;hl=en&amp;src=api&amp;x=11&amp;y=8&amp;z=4&amp;s=G"/><img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 492px; top: -93px; width: 256px; height: 256px; -moz-user-select: none;" src="http://mt0.google.com/vt/lyrs=m@120&amp;hl=en&amp;src=api&amp;x=12&amp;y=6&amp;z=4&amp;s=Ga"/><img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 492px; top: 163px; width: 256px; height: 256px; -moz-user-select: none;" src="http://mt0.google.com/vt/lyrs=m@120&amp;hl=en&amp;src=api&amp;x=12&amp;y=7&amp;z=4&amp;s=Gal"/><img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 492px; top: 419px; width: 256px; height: 256px; -moz-user-select: none;" src="http://mt0.google.com/vt/lyrs=m@120&amp;hl=en&amp;src=api&amp;x=12&amp;y=8&amp;z=4&amp;s=Gali"/><img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 748px; top: -93px; width: 256px; height: 256px; -moz-user-select: none;" src="http://mt1.google.com/vt/lyrs=m@120&amp;hl=en&amp;src=api&amp;x=13&amp;y=6&amp;z=4&amp;s=Galil"/><img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 748px; top: 163px; width: 256px; height: 256px; -moz-user-select: none;" src="http://mt1.google.com/vt/lyrs=m@120&amp;hl=en&amp;src=api&amp;x=13&amp;y=7&amp;z=4&amp;s=Galile"/><img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 748px; top: 419px; width: 256px; height: 256px; -moz-user-select: none;" src="http://mt1.google.com/vt/lyrs=m@120&amp;hl=en&amp;src=api&amp;x=13&amp;y=8&amp;z=4&amp;s=Galileo"/>
</div>
</div>
<div style="position: absolute; left: 0px; top: 0px; z-index: 100;"/>
<div style="position: absolute; left: 0px; top: 0px; z-index: 101;"/>
<div style="position: absolute; left: 0px; top: 0px; z-index: 102;"/>
<div style="position: absolute; left: 0px; top: 0px; z-index: 103;"/>
<div style="position: absolute; left: 0px; top: 0px; z-index: 104; cursor: default;"/>
<div style="position: absolute; left: 0px; top: 0px; z-index: 105;"/>
<div style="position: absolute; left: 0px; top: 0px; z-index: 106;"/>
<div style="position: absolute; left: 0px; top: 0px; z-index: 107; cursor: default;"/>
</div>
</div>
<div id="logocontrol" class="gmnoprint" style="-moz-user-select: none; z-index: 0; position: absolute; left: 2px; bottom: 2px;"><a title="Click to see this area on Google Maps" href="http://maps.google.com/maps?ll=22.97,77.56&amp;spn=24.123284,61.523438&amp;z=4&amp;key=ABQIAAAAz2GdKU-VPA5WYpd4RF7AQxTAtgX-6aoE9zEkmxGVRHN2Hj-ZSRSK3wGiUAuG-lhBGFCY_8nhhJ6vHA&amp;sensor=true&amp;mapclient=jsapi&amp;oi=map_misc&amp;ct=api_logo" target="_blank"><img style="border: 0px none ; margin: 0px; padding: 0px; width: 62px; height: 30px; -moz-user-select: none; cursor: pointer;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/poweredby.png"/></a>
</div>
<div style="-moz-user-select: none; z-index: 0; position: absolute; right: 3px; bottom: 2px; color: black; font-family: Arial,sans-serif; font-size: 11px; white-space: nowrap; text-align: right;" dir="ltr">
<span/>
<span>Map data ©2010  Tele Atlas, LeadDog Consulting, AND, NFGIS, Europa Technologies - </span>
<a href="http://www.google.com/intl/en_ALL/help/terms_maps.html" target="_blank" class="gmnoprint terms-of-use-link" style="color: rgb(119, 119, 204);">Terms of Use</a><span/>
</div>
<div id="lmc3d" style="overflow: hidden; width: 59px; height: 109px; -moz-user-select: none; z-index: 0; position: absolute; left: 7px; top: 7px; text-align: left;" class="gmnoprint">
<div style="position: absolute; left: 0px; top: 0px; width: 59px; height: 62px;"><div style="overflow: hidden; width: 59px; height: 62px; position: absolute; left: 0px; top: 0px;">
<img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px; -moz-user-select: none;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/mapcontrols3d5.png"/>
</div>
<div style="position: absolute; left: 20px; top: 0px; width: 18px; height: 18px; cursor: pointer;" title="Pan up" log="pan_up"/>
<div style="position: absolute; left: 0px; top: 20px; width: 18px; height: 18px; cursor: pointer;" title="Pan left" log="pan_lt"/>
<div style="position: absolute; left: 40px; top: 20px; width: 18px; height: 18px; cursor: pointer;" title="Pan right" log="pan_rt"/>
<div style="position: absolute; left: 20px; top: 40px; width: 18px; height: 18px; cursor: pointer;" title="Pan down" log="pan_down"/>
<div style="position: absolute; left: 20px; top: 20px; width: 18px; height: 18px; cursor: pointer;" title="Return to the last result" log="center_result"/>
</div>
<div style="overflow: hidden; position: absolute; left: 0px; top: 62px; width: 59px; height: 24px;" id="lmcslider">
<div style="overflow: hidden; width: 59px; height: 292px;">
<img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: -62px; -moz-user-select: none;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/mapcontrols3d5.png"/>
</div>
<div style="position: absolute; left: 20px; top: 0px; width: 20px; height: 27px; cursor: pointer;" title="Zoom In"/>
</div>
<div style="position: absolute; left: 0px; top: 79px; width: 59px; height: 30px; text-align: left; z-index: -1;" id="lmczo">
<div style="overflow: hidden; width: 59px; height: 30px; position: absolute;"><img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: -354px; -moz-user-select: none;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/mapcontrols3d5.png"/>
</div>
<div style="position: absolute; left: 20px; top: 0px; width: 20px; height: 27px; cursor: pointer;" title="Zoom Out"/>
</div>
<div style="position: absolute; left: 19px; top: 86px; width: 22px; height: 6px; cursor: pointer; visibility: hidden;" id="lmczb">
<div style="overflow: hidden; width: 22px; height: 14px; position: absolute; left: 0px; top: 120px; cursor: -moz-grab; visibility: hidden;" title="Drag to zoom">
<img style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: -384px; -moz-user-select: none;" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/mapcontrols3d5.png"/>
</div></div></div>
<div id="hmtctl" style="width: 200px; height: 22px; -moz-user-select: none; z-index: 0; position: absolute; right: 7px; top: 7px; color: black; font-family: Arial,sans-serif; font-size: small;">
<div style="border: 1px solid black; position: absolute; background-color: white; text-align: center; width: 5em; right: 10.2em; cursor: pointer;" title="Show street map" jsaction="amtc.selectMap">
<div style="border-style: solid; border-color: rgb(52, 86, 132) rgb(108, 157, 223) rgb(108, 157, 223) rgb(52, 86, 132); border-width: 1px; font-size: 12px; font-weight: bold;">Map</div>
</div>
<div style="border: 1px solid black; position: absolute; background-color: white; text-align: center; width: 5em; right: 5.1em; cursor: pointer;" title="Show satellite imagery" jsaction="amtc.selectSatellite">
<div style="border-style: solid; border-color: white rgb(176, 176, 176) rgb(176, 176, 176) white; border-width: 1px; font-size: 12px;">Satellite</div>
<div style="border: 1px solid black; position: absolute; background-color: white; text-align: left; right: 0em; cursor: pointer; visibility: hidden; white-space: nowrap;" title="Show imagery with street names" jsaction="amtc.selectHybrid">
<div style="font-size: 11px; padding-left: 2px; padding-right: 2px;"><input type="checkbox" style="vertical-align: middle;"/>Show labels</div>
</div>
</div>
<div style="border: 1px solid black; position: absolute; background-color: white; text-align: center; width: 5em; right: 0em; cursor: pointer;" title="Show street map with terrain" jsaction="amtc.selectTerrain">
<div style="border-style: solid; border-color: white rgb(176, 176, 176) rgb(176, 176, 176) white; border-width: 1px; font-size: 12px;">Terrain</div>
</div>
</div>
<div  id="scalecontrol" style="width: 115px; height: 26px; -moz-user-select: none; z-index: 0; position: absolute; left: 68px; bottom: 5px; color: black; font-family: Arial,sans-serif; font-size: 11px;" class="gmnoprint" jstcache="0">
<div jstcache="0">
<div jsvalues=".style.left:$this.left;.style.top:$this.top;.style.width:$this.width;.style.height:$this.height" jsselect="bars" style="overflow: hidden; position: absolute; left: 0px; top: 0px; width: 4px; height: 26px;" jstcache="1" jsinstance="0"><img jsvalues=".style.left:$this.imgLeft;.style.top:$this.imgTop;.style.width:$this.imgWidth;.style.height:$this.imgHeight;.src:$this.imgSrc;" style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: -398px; width: 59px; height: 492px;" jstcache="3" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/mapcontrols3d5.png"/></div>
<div jsvalues=".style.left:$this.left;.style.top:$this.top;.style.width:$this.width;.style.height:$this.height" jsselect="bars" style="overflow: hidden; position: absolute; left: 3px; top: 11px; width: 111px; height: 4px;" jstcache="1" jsinstance="1"><img jsvalues=".style.left:$this.imgLeft;.style.top:$this.imgTop;.style.width:$this.imgWidth;.style.height:$this.imgHeight;.src:$this.imgSrc;" style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: 0px; top: -424px; width: 111px; height: 492px;" jstcache="3" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/mapcontrols3d5.png"/></div>
<div jsvalues=".style.left:$this.left;.style.top:$this.top;.style.width:$this.width;.style.height:$this.height" jsselect="bars" style="overflow: hidden; position: absolute; left: 114px; top: 11px; width: 1px; height: 4px;" jstcache="1" jsinstance="2"><img jsvalues=".style.left:$this.imgLeft;.style.top:$this.imgTop;.style.width:$this.imgWidth;.style.height:$this.imgHeight;.src:$this.imgSrc;" style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: -412px; top: -398px; width: 59px; height: 492px;" jstcache="3" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/mapcontrols3d5.png"/></div>
<div jsvalues=".style.left:$this.left;.style.top:$this.top;.style.width:$this.width;.style.height:$this.height" jsselect="bars" style="overflow: hidden; position: absolute; left: 89px; top: 0px; width: 4px; height: 12px;" jstcache="1" jsinstance="3"><img jsvalues=".style.left:$this.imgLeft;.style.top:$this.imgTop;.style.width:$this.imgWidth;.style.height:$this.imgHeight;.src:$this.imgSrc;" style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: -4px; top: -398px; width: 59px; height: 492px;" jstcache="3" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/mapcontrols3d5.png"/></div>
<div jsvalues=".style.left:$this.left;.style.top:$this.top;.style.width:$this.width;.style.height:$this.height" jsselect="bars" style="overflow: hidden; position: absolute; left: 111px; top: 14px; width: 4px; height: 12px;" jstcache="1" jsinstance="*4"><img jsvalues=".style.left:$this.imgLeft;.style.top:$this.imgTop;.style.width:$this.imgWidth;.style.height:$this.imgHeight;.src:$this.imgSrc;" style="border: 0px none ; margin: 0px; padding: 0px; position: absolute; left: -8px; top: -398px; width: 59px; height: 492px;" jstcache="3" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/mapcontrols3d5.png"/></div>
<div jsvalues=".style.left:$this.left;.style.bottom:$this.bottom;.style.top:$this.top" jscontent="$this.title" jsselect="scales" style="position: absolute; left: 8px; bottom: 16px;" jstcache="2" jsinstance="0">500 mi</div>
<div jsvalues=".style.left:$this.left;.style.bottom:$this.bottom;.style.top:$this.top" jscontent="$this.title" jsselect="scales" style="position: absolute; left: 8px; top: 15px;" jstcache="2" jsinstance="*1">1000 km
</div>
</div>
</div>
<div id="map_magnifyingglass" style="border: medium none ; width: 60px; height: 40px; visibility: hidden; -moz-user-select: none; z-index: 0;" class="gmnoprint">
<div style="border-style: solid none none solid; border-color: rgb(255, 0, 0) -moz-use-text-color -moz-use-text-color rgb(255, 0, 0); border-width: 2px 0px 0px 2px; width: 6px; height: 4px; line-height: 1px; font-size: 1px;"/>
<div style="border-style: solid solid none none; border-color: rgb(255, 0, 0) rgb(255, 0, 0) -moz-use-text-color -moz-use-text-color; border-width: 2px 2px 0px 0px; width: 6px; height: 4px; line-height: 1px; font-size: 1px;"/>
<div style="border-style: none solid solid none; border-color: -moz-use-text-color rgb(255, 0, 0) rgb(255, 0, 0) -moz-use-text-color; border-width: 0px 2px 2px 0px; width: 6px; height: 4px; line-height: 1px; font-size: 1px;"/>
<div style="border-style: none none solid solid; border-color: -moz-use-text-color -moz-use-text-color rgb(255, 0, 0) rgb(255, 0, 0); border-width: 0px 0px 2px 2px; width: 6px; height: 4px; line-height: 1px; font-size: 1px;"/>
</div>
</div>
</td>
</tr>
<tr> 
<td style="">
<table style="maring-left:auto;margin-right:auto">
<tr>
<td style='text-align:right'>New Location Name</td>
<td>
<input type="text"  style="width:163px" id="loc_name" name="loc_name" >
</td>
<td style='text-align:right'>Latitude</td>
<td>
<input type=text id="lat" name="lat" value="">
</td>


<td style='text-align:right'>Longitude</td>
<td><input type=text id="lng" name="lng" value=""></td>
</tr>

<tr>

<td style='text-align:right'>City/Town/Village</td>
<td><input type=text id="city" name="city" value=""></td>

<td style='text-align:right'>State</td>
<td>
<SELECT name=state id="state">
<option value="">Select a State</option>
<?php
$result = mysql_query("SELECT state_id, state FROM seswatch_states ORDER BY state");
         if($result){
         while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
         if($row['state'] != 'Not In India') {
         print "<option value=".$row{'state_id'};
         if ($row{'state_id'} == $state_id)
         print " selected ";
         print ">".$row{'state'}."</option>\n";
         } else {
         $other_id = $row['state_id'];
         $other = $row['state'];
         }
         }
         }
?>
</select>
</td>

</tr>

<!-- <input type="hidden" id="city" name="city" value=""> -->
<input type="hidden" id="country" name="country" value="">
<input type="hidden" name="zoom" id="zoom" value="">
<tr>
<td colspan=4 style="text-align:center">
<input type="submit"  name="Submit" id="Submit" value="Add Location" class=buttonstyle> 
</td>
</tr>
</table>
</td>
</tr>
</table>
</form>
</div>
</body>
</html>