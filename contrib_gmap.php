<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<title>SeasonwatchWatch</title>
<style type ="text/css">@media print{.gmnoprint{display:none}}@media screen{.gmnoscreen{display:none}}</style> 
<script type="text/javascript" charset="UTF-8" src="http://maps.gstatic.com/cat_js/intl/en_ALL/mapfiles/205b/maps2.api/%7Bmod_drag,mod_ctrapi,mod_api_gc,mod_scrwh,mod_kbrd%7D.js">
1mod_ctrapi,mod_api_gc,mod_scrwh,mod_kbrd}.js
</script>
<script src="http://www.google.com/jsapi?key=ABQIAAAAz2GdKU-VPA5WYpd4RF7AQxTAtgX-6aoE9zEkmxGVRHN2Hj-ZSRSK3wGiUAuG-lhBGFCY_8nhhJ6vHA" type="text/javascript"></script>

<head>

<body>
<link rel="stylesheet" href="blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="blueprint/print.css" type="text/css" media="print">
<link rel="stylesheet" href="blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script language="javascript" src="js/jquery.form.js"></script>
<script language="javascript" src="js/date.js"></script>
<script src="js/jquery.corner.js" type="text/javascript"></script>
<script type="text/javascript" src="js/alerts/jquery.alerts.js">
<link media="screen" type="text/css" rel="stylesheet" href="js/alerts/jquery.alerts.css">
<script src="js/pager/jquery.tablesorter.js" type="text/javascript"></script>
<script src="js/pager/jquery.tablesorter.pager.js" type="text/javascript"></script>
<script src="js/pager/chili-1.8b.js" type="text/javascript"></script>
<script src="js/pager/docs.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="pager/style.css">
<link type="text/css" rel="stylesheet" href="js/thickbox/thickbox.css">
<script language="javascript" src="js/thickbox/thickbox.js">
<script language="javascript" src="js/jquery.autocomplete.js">
<script language="javascript" src="js/jquery.bgiframe.min.js">                                                                 
<link type="text/css" rel="stylesheet" href="js/jquery.autocomplete.css">
<script charset="utf-8" type="text/javascript" src="js/jquery.emptyonclick.js">
<link type="text/css" rel="stylesheet" href="js/jqModal.css">
<script type="text/javascript" src="js/jquery.autogrow.js">
<link type="text/css" rel="stylesheet" href="CalendarControl.css">
<script language="javascript" src="CalendarControl.js">
<script src="js/jquery-ui/ui/ui.core.js" type="text/javascript"></script>
<link rel="stylesheet" href="http://jqueryui.com/demos//demos.css" type="text/css"></link>
<link rel="stylesheet" href="http://jqueryui.com/themes/base/ui.all.css" type="text/css"></link>
<link rel="stylesheet" href="css/styles_new.css" type="text/css">
<div class="container top">
<div class="left">
<div class="container logo-box">
<div style='float:left'>
<a href='http://seasonwatch.in'><img style="margin-left:0" src="images/swlogo.png" alt="MigrantWatch" title="MigrantWatch"></a>
</div>
<div style='float:right;margin-top:26px'>
<form name="frm_login" action="userlogin.php" method="POST">
<table>
<?php  
if( $_SESSION['user_id'] ) { ?>
<tr>
<td style='text-align:right;'>
<?php  echo $_SESSION['user_name']; ?>&nbsp;(
<a href='userlogin.php?cmd=logout'>Log Out</a> )&nbsp;</td>
</tr>
<? } else { ?>
<tr>
<td class="small-link" style="margin:0;padding:0;font-size:10px;">
<table style="margin:0;padding:0;width:390px;">
<tr>
<td style="text-align:right;width:150px"><a title="register" href="register.php">signup!</a></td>
<td style="padding-left:35px">
<a title="forgot password ?" href="forgot_password.php">forgot?</a>
</td>
<td style="text-align:right;padding-right:33px">
<a title="remember me" class="rememberme" href="#">remember me</a>
<a style="display:none" class="rememberme" href="#">remembered</a>
<input type="hidden" value="0" id="remember" name="remember">
</td>
</tr>
</table>

</td>
</tr>
<tr>
<td style="padding:0;margin:0;">
<input class="default-value login-box" type="text" name="email" value="email id" />
<input id="password-clear" class="login-box" type="text" value="password" autocomplete="off"/>
<input class="login-box" id="password-password" type="password" name="pwd" value="" autocomplete="off" />
<input type="hidden" name="cmd" value="login" />
<input style="width:30px;border:solid 1px #666" type="submit" value="go" onclick="javascript:return validate();">
</td>
</tr>
<? } ?>
</table>
<table class="main-links">
<tr>
<td style=""><a href="addsightings.php">report&nbsp;sightings</a></td>
<td style=''>|</td>
<td style=""><a href="editsightings.php">edit&nbsp;sightings</a></td>
<td style=''>|</td>
<td style=""><a href="editprofile.php">my&nbsp;profile</a></td>
</tr>
</table>
</form>
</div>
</div> <!-- END OF LOGO BOX -->
<div class="container main_banner">
</div>
<div class="container menu-links">

<ul id="jsddm">
<li><a href="#">join</a>
<ul>
<li><a href="#">why join</a></li>
</ul>
</li><li>|</li>
<li><a href="#">what to do</a>
<ul>
<li><a href="#">watch migrants</a></li>
<li><a href="#">identify migrants</a></li>
<li><a href="#">submit data</a></li>
</ul><li>|</li>
</li>
<li><a href="#">participants</a>
<ul>
<li><a href="participants.php">individuals</a></li>
<li><a href="#">groups</a></li>
<li><a href="#">map</a></li>
</ul><li>|</li>
</li>
<li><a href="#">species</a>
<ul>
<li><a href="#">migrants we watch</a></li>
<li><a href="#">highlighted species</a></li>
<li><a href="#">all species</a></li>
</ul><li>|</li>
</li>
<li><a href="#">campaigns</a>
<ul>
<li><a href="#">pied cuckoo</a></li>
</ul><li>|</li>
</li>
<li><a href="#">data</a>
<ul>
<li><a href="#">view data/maps</a></li>
<li><a href="#">latest summaries</a></li>
<li><a href="#">terms of use</a></li>
</ul><li>|</li>
</li>
<li><a href="#">resources</a>
<ul>
<li><a href="#">getting started with indian birds</a></li>
<li><a href="#">bird migration and climate change</a></li>
<li><a href="#">citizen science projects</a></li>
<li><a href="#">publications</a></li>
</ul><li>|</li>
</li>
<li><a href="#">news</a>
<ul>
<li><a href="#">media</a></li>
</ul><li>|</li>
</li>
<li><a href='#'>blog</a></li><li>|</li>
<li><a href='#'>faq</a></li>
</ul>
 
<div style="float:right">
<form id="search_form" action="search/index.php" method="get">
<input type="text" name="query" id="query" style="border:solid 1px #666;" value="search" autocomplete="off" delay="1500">
<input type="hidden" name="search" value="1">
<input type="submit" class="submit" value="go">
</form>
</div>
</div>
<script>
$(document).ready(function() {
 
$(".filter").corner();
$(".first_image").corner('bottom');
});
</script>
<style type="text/css">
#jsddm
{ margin: 0;
padding: 0;
font-size:14px;
}
#jsddm li
{ float: left;
list-style: none;
}
 
#jsddm li a
{ display: block;
background: #000000;
padding: 3px 5px;
margin-left:1%;
margin-right:1%;
text-decoration: none;
//border-right: 1px solid white;
width:100%;
color: #fff;
font-size:100%;
white-space: nowrap}
 
#jsddm li a:hover 
{ color: #ffcb1a}
#jsddm li ul
{ margin: 0;
padding: 0;
position: absolute;
visibility: hidden;
border-top: 1px solid #ffcb1a;
}
#jsddm li ul li
{ float: none;
display: inline;
}
#jsddm li ul li a
{ width: auto;
font-size:14px;
background: #333;border: 1px solid #ffcb1a; border-top:none; font-weight:normal; }
#jsddm li ul li a:hover
{ background: #000;color: #fff}
</style>

<script>
var timeout = 500;
var closetimer = 0;
var ddmenuitem = 0;
 
function jsddm_open()
{ jsddm_canceltimer();
jsddm_close();
ddmenuitem = $(this).find('ul').css('visibility', 'visible');}
 
function jsddm_close()
{ if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');}
 
function jsddm_timer()
{ closetimer = window.setTimeout(jsddm_close, timeout);}
 
function jsddm_canceltimer()
{ if(closetimer)
{ window.clearTimeout(closetimer);
closetimer = null;}}
 
$(document).ready(function()
{ $('#jsddm > li').bind('mouseover', jsddm_open)
$('#jsddm > li').bind('mouseout', jsddm_timer)});
 
document.onclick = jsddm_close;
</script>
 
<script type="text/javascript">
$('.default-value').each(function() {
var default_value = this.value;
$(this).css('color', '#666'); // this could be in the style sheet instead
$(this).focus(function() {
if(this.value == default_value) {
this.value = '';
$(this).css('color', '#333');
}
});
$(this).blur(function() {
if(this.value == '') {
$(this).css('color', '#666');
this.value = default_value;
}
});
});
 
$('#password-clear').show();
$('#password-password').hide();
 
$('#password-clear').focus(function() {
$('#password-clear').hide();
$('#password-password').show();
$('#password-password').focus();
});
$('#password-password').blur(function() {
if($('#password-password').val() == '') {
$('#password-clear').show();
$('#password-password').hide();
}
});
 
var toggle = false;
$(".rememberme").click(function () {
if( toggle == false) {
$('#remember').val('1');
toggle = true;
} else {
$('#remember').val('0'); toggle = false;
}
$(".rememberme").toggle();
});
</script>

<script>
$(document).ready(function(){
 
 
$('#query').autocomplete("autocomplete.php", {
// width: 388,
selectFirst: false,
matchSubset :true,
matchContains: false,
formatItem: formatItem
 
});
 
$("#query").result(function(event, data, formatted) {
 
document.location.href= "../guide.php?id="+ data[1];
 
});
});
function formatItem(row) {
var completeRow;
completeRow = new String(row);
var scinamepos = completeRow.lastIndexOf("(");
var rest = completeRow.substr(0,scinamepos)
var sciname = completeRow.substr(scinamepos);
var commapos = sciname.lastIndexOf(",");
sciname = sciname.substr(0,commapos);
var newrow = rest + '<br><i>' + sciname + '</i>';
return newrow;
}
</script>





<script type="text/javascript">
google.load("jquery", '1.2.6');
google.load("maps", "2.x");
</script>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js">




<script type="text/javascript" src="http://maps.google.com/maps?file=googleapi&key=ABQIAAAAz2GdKU-VPA5WYpd4RF7AQxTAtgX-6aoE9zEkmxGVRHN2Hj-ZSRSK3wGiUAuG-lhBGFCY_8nhhJ6vHA&v=2.x">
var G_INCOMPAT = false;function GScript(src) {document.write('<' + 'script src="' + src + '"' +' type="text/javascript"><' + '/script>');}function GBrowserIsCompatible() {if (G_INCOMPAT) return false;return true;}function GApiInit() {if (GApiInit.called) return;GApiInit.called = true;window.GAddMessages && GAddMessages({160: '\x3cH1\x3eServer Error\x3c/H1\x3eThe server encountered a temporary error and could not complete your request.\x3cp\x3ePlease try again in a minute or so.\x3c/p\x3e',1415: '.',1416: ',',1547: 'mi',1616: 'km',4100: 'm',4101: 'ft',10018: 'Loading...',10021: 'Zoom In',10022: 'Zoom Out',10024: 'Drag to zoom',10029: 'Return to the last result',10049: 'Map',10050: 'Satellite',10093: 'Terms of Use',10111: 'Map',10112: 'Sat',10116: 'Hybrid',10117: 'Hyb',10120: 'We are sorry, but we don\x27t have maps at this zoom level for this region.\x3cp\x3eTry zooming out for a broader look.\x3c/p\x3e',10121: 'We are sorry, but we don\x27t have imagery at this zoom level for this region.\x3cp\x3eTry zooming out for a broader look.\x3c/p\x3e',10507: 'Pan left',10508: 'Pan right',10509: 'Pan up',10510: 'Pan down',10511: 'Show street map',10512: 'Show satellite imagery',10513: 'Show imagery with street names',10806: 'Click to see this area on Google Maps',10807: 'Traffic',10808: 'Show Traffic',10809: 'Hide Traffic',12150: '%1$s on %2$s',12151: '%1$s on %2$s at %3$s',12152: '%1$s on %2$s between %3$s and %4$s',10985: 'Zoom in',10986: 'Zoom out',11047: 'Center map here',11089: '\x3ca href\x3d\x22javascript:void(0);\x22\x3eZoom In\x3c/a\x3e to see traffic for this region',11259: 'Full-screen',11751: 'Show street map with terrain',11752: 'Style:',11757: 'Change map style',11758: 'Terrain',11759: 'Ter',11794: 'Show labels',11303: 'Street View Help',11274: 'To use street view, you need Adobe Flash Player version %1$d or newer.',11382: 'Get the latest Flash Player.',11314: 'We\x27re sorry, street view is currently unavailable due to high demand.\x3cbr\x3ePlease try again later!',1559: 'N',1560: 'S',1561: 'W',1562: 'E',1608: 'NW',1591: 'NE',1605: 'SW',1606: 'SE',11907: 'This image is no longer available',10041: 'Help',12471: 'Current Location',12492: 'Earth',12823: 'Google has disabled usage of the Maps API for this application. See the Terms of Service for more information: %1$s.',12822: 'http://code.google.com/apis/maps/terms.html',12915: 'Improve the map',12916: 'Google, Europa Technologies',13171: 'Hybrid 3D',0: ''});}var GLoad;(function() {var jslinker={version:"182",jsbinary:[{id:"maps2",url:"http://maps.gstatic.com/intl/en_ALL/mapfiles/205b/maps2/main.js"},{id:"maps2.api",url:"http://maps.gstatic.com/intl/en_ALL/mapfiles/205b/maps2.api/main.js"},{id:"gc",url:"http://maps.gstatic.com/intl/en_ALL/mapfiles/205b/gc.js"},{id:"suggest",url:"http://maps.gstatic.com/intl/en_ALL/mapfiles/205b/suggest/main.js"},{id:"pphov",url:"http://maps.gstatic.com/intl/en_ALL/mapfiles/205b/pphov.js"}]};GLoad = function(callback) {var callee = arguments.callee;var apiCallback = callback;GApiInit();var opts = {public_api:true,export_legacy_names:true,tile_override:[{maptype:0,min_zoom:7,max_zoom:7,rect:[{lo:{lat_e7:330000000,lng_e7:1246050000},hi:{lat_e7:386200000,lng_e7:1293600000}},{lo:{lat_e7:366500000,lng_e7:1297000000},hi:{lat_e7:386200000,lng_e7:1320034790}}],uris:["http://mt0.gmaptiles.co.kr/mt/v=kr1.11\x26hl=en\x26src=api\x26","http://mt1.gmaptiles.co.kr/mt/v=kr1.11\x26hl=en\x26src=api\x26","http://mt2.gmaptiles.co.kr/mt/v=kr1.11\x26hl=en\x26src=api\x26","http://mt3.gmaptiles.co.kr/mt/v=kr1.11\x26hl=en\x26src=api\x26"],mapprint_url:"http://www.gmaptiles.co.kr/mapprint"},{maptype:0,min_zoom:8,max_zoom:9,rect:[{lo:{lat_e7:330000000,lng_e7:1246050000},hi:{lat_e7:386200000,lng_e7:1279600000}},{lo:{lat_e7:345000000,lng_e7:1279600000},hi:{lat_e7:386200000,lng_e7:1286700000}},{lo:{lat_e7:348900000,lng_e7:1286700000},hi:{lat_e7:386200000,lng_e7:1293600000}},{lo:{lat_e7:354690000,lng_e7:1293600000},hi:{lat_e7:386200000,lng_e7:1320034790}}],uris:["http://mt0.gmaptiles.co.kr/mt/v=kr1.11\x26hl=en\x26src=api\x26","http://mt1.gmaptiles.co.kr/mt/v=kr1.11\x26hl=en\x26src=api\x26","http://mt2.gmaptiles.co.kr/mt/v=kr1.11\x26hl=en\x26src=api\x26","http://mt3.gmaptiles.co.kr/mt/v=kr1.11\x26hl=en\x26src=api\x26"],mapprint_url:"http://www.gmaptiles.co.kr/mapprint"},{maptype:0,min_zoom:10,max_zoom:18,rect:[{lo:{lat_e7:329890840,lng_e7:1246055600},hi:{lat_e7:386930130,lng_e7:1284960940}},{lo:{lat_e7:344646740,lng_e7:1284960940},hi:{lat_e7:386930130,lng_e7:1288476560}},{lo:{lat_e7:350277470,lng_e7:1288476560},hi:{lat_e7:386930130,lng_e7:1310531620}},{lo:{lat_e7:370277730,lng_e7:1310531620},hi:{lat_e7:386930130,lng_e7:1320034790}}],uris:["http://mt0.gmaptiles.co.kr/mt/v=kr1.11\x26hl=en\x26src=api\x26","http://mt1.gmaptiles.co.kr/mt/v=kr1.11\x26hl=en\x26src=api\x26","http://mt2.gmaptiles.co.kr/mt/v=kr1.11\x26hl=en\x26src=api\x26","http://mt3.gmaptiles.co.kr/mt/v=kr1.11\x26hl=en\x26src=api\x26"],mapprint_url:"http://www.gmaptiles.co.kr/mapprint"},{maptype:3,min_zoom:7,max_zoom:7,rect:[{lo:{lat_e7:330000000,lng_e7:1246050000},hi:{lat_e7:386200000,lng_e7:1293600000}},{lo:{lat_e7:366500000,lng_e7:1297000000},hi:{lat_e7:386200000,lng_e7:1320034790}}],uris:["http://mt0.gmaptiles.co.kr/mt/v=kr1p.11\x26hl=en\x26src=api\x26","http://mt1.gmaptiles.co.kr/mt/v=kr1p.11\x26hl=en\x26src=api\x26","http://mt2.gmaptiles.co.kr/mt/v=kr1p.11\x26hl=en\x26src=api\x26","http://mt3.gmaptiles.co.kr/mt/v=kr1p.11\x26hl=en\x26src=api\x26"]},{maptype:3,min_zoom:8,max_zoom:9,rect:[{lo:{lat_e7:330000000,lng_e7:1246050000},hi:{lat_e7:386200000,lng_e7:1279600000}},{lo:{lat_e7:345000000,lng_e7:1279600000},hi:{lat_e7:386200000,lng_e7:1286700000}},{lo:{lat_e7:348900000,lng_e7:1286700000},hi:{lat_e7:386200000,lng_e7:1293600000}},{lo:{lat_e7:354690000,lng_e7:1293600000},hi:{lat_e7:386200000,lng_e7:1320034790}}],uris:["http://mt0.gmaptiles.co.kr/mt/v=kr1p.11\x26hl=en\x26src=api\x26","http://mt1.gmaptiles.co.kr/mt/v=kr1p.11\x26hl=en\x26src=api\x26","http://mt2.gmaptiles.co.kr/mt/v=kr1p.11\x26hl=en\x26src=api\x26","http://mt3.gmaptiles.co.kr/mt/v=kr1p.11\x26hl=en\x26src=api\x26"]},{maptype:3,min_zoom:10,rect:[{lo:{lat_e7:329890840,lng_e7:1246055600},hi:{lat_e7:386930130,lng_e7:1284960940}},{lo:{lat_e7:344646740,lng_e7:1284960940},hi:{lat_e7:386930130,lng_e7:1288476560}},{lo:{lat_e7:350277470,lng_e7:1288476560},hi:{lat_e7:386930130,lng_e7:1310531620}},{lo:{lat_e7:370277730,lng_e7:1310531620},hi:{lat_e7:386930130,lng_e7:1320034790}}],uris:["http://mt0.gmaptiles.co.kr/mt/v=kr1p.11\x26hl=en\x26src=api\x26","http://mt1.gmaptiles.co.kr/mt/v=kr1p.11\x26hl=en\x26src=api\x26","http://mt2.gmaptiles.co.kr/mt/v=kr1p.11\x26hl=en\x26src=api\x26","http://mt3.gmaptiles.co.kr/mt/v=kr1p.11\x26hl=en\x26src=api\x26"]}],jsmain:"http://maps.gstatic.com/intl/en_ALL/mapfiles/205b/maps2.api/main.js",log_info_window_ratio:0.0099999997764825821,log_fragment_count:10,log_fragment_seed:1,obliques_urls:["http://khmdb0.google.com/kh?v=25\x26","http://khmdb1.google.com/kh?v=25\x26"],token:3037697929,jsmodule_base_url:"http://maps.gstatic.com/intl/en_ALL/mapfiles/205b/maps2.api",transit_allowed:false};var pageArgs = {};apiCallback(["http://mt0.google.com/vt/lyrs\x3dm@118\x26hl\x3den\x26src\x3dapi\x26","http://mt1.google.com/vt/lyrs\x3dm@118\x26hl\x3den\x26src\x3dapi\x26"], ["http://khm0.google.com/kh/v\x3d55\x26","http://khm1.google.com/kh/v\x3d55\x26"], ["http://mt0.google.com/vt/lyrs\x3dh@118\x26hl\x3den\x26src\x3dapi\x26","http://mt1.google.com/vt/lyrs\x3dh@118\x26hl\x3den\x26src\x3dapi\x26"],"ABQIAAAAz2GdKU-VPA5WYpd4RF7AQxTAtgX-6aoE9zEkmxGVRHN2Hj-ZSRSK3wGiUAuG-lhBGFCY_8nhhJ6vHA","","",true,"google.maps.",opts,["http://mt0.google.com/vt/v\x3dapp.118\x26hl\x3den\x26src\x3dapi\x26","http://mt1.google.com/vt/v\x3dapp.118\x26hl\x3den\x26src\x3dapi\x26"],jslinker,pageArgs);if (!callee.called) {callee.called = true;}}})();function GUnload() {if (window.GUnloadApi) {GUnloadApi();}}var _mIsRtl = false;var _mF = [ ,,false,,,20,4096,"bounds_cippppt.txt","cities_cippppt.txt","local/add/flagStreetView",true,,400,,,,,,,"/maps/c/ui/HovercardLauncher/dommanifest.js",,,,false,false,,,,,,true,,,,,,,,"http://maps.google.com/maps/stk/fetch",0,,true,,,,true,,,,"http://maps.google.com/maps/stk/style",,"107485602240773805043.00043dadc95ca3874f1fa",,,false,1000,,"http://cbk0.google.com",false,,"ar,iw",,,,,,,,,"http://pagead2.googlesyndication.com/pagead/imgad?id\x3dCMKp3NaV5_mE1AEQEBgQMgieroCd6vHEKA",,,false,false,,false,,,,,"SS","en,fr,ja",,,,,,,true,,,false,,,true,,,,,"","1",,false,false,,false,,,,"AU,BE,FR,NZ,US",,,false,true,500,"http://chart.apis.google.com/chart?cht\x3dqr\x26chs\x3d80x80\x26chld\x3d|0\x26chl\x3d",,,,true,,,,,false,,,false,false,true,,,true,,,,,,,,10,,true,true,,,false,30,"infowindow_v1","",false,true,22,'http://khm.google.com/vt/lbw/lyrs\x3dm\x26hl\x3den\x26','http://khm.google.com/vt/lbw/lyrs\x3ds\x26hl\x3den\x26','http://khm.google.com/vt/lbw/lyrs\x3dy\x26hl\x3den\x26','http://khm.google.com/vt/lbw/lyrs\x3dp\x26hl\x3den\x26',,,false,"US,AU,NZ,FR,DK,MX,BE,CA,DE,GB,IE,PR,PT,RU,SG,JM,HK,TW,MY,TH,AT,CZ,CN,IN,KR",,,"windows-ie,windows-firefox,windows-chrome,macos-safari,macos-firefox",true,false,20000,600,30,,,,,,false,false,,,"maps.google.com",,,true,true,"",true,true,false,,true,"4:http://gt%1$d.google.com/mt?v\x3dgwm.fresh\x26","4:http://gt%1$d.google.com/mt?v\x3dgwh.fresh\x26",true,false,false,,0.25,,"107485602240773805043.0004561b22ebdc3750300",false,,,,false,,,true,,8,,,,,false,"https://cbks0.google.com",false,true,,,,,,false,,,,,,,,false,,,true,true,true,,,,true,"http://mt0.google.com/vt/ft",false,,"http://chart.apis.google.com/chart",true,,,,,,'0.25',false,true,,,,false,,2,160,,,false,true,false,,,true,false,,,45,true,,false,true,true,,true,false,false,false,false,,false,false,,false,true,false,false,true,true,,true,false,false,false,false,false,true,,"DE,CH,LI,AT,BE,PL,NL,HU,GR,HR,CZ,SK,TR,BR,EE,ES,AD,SE,NO,DK,FI,IT,VA,SM,IL,CL,MX,AR,BG,PT",false,,"25",true,25,"Home for sale",,false,false,true,false,false,false,"4:https://gt%1$d.google.com/mt?v\x3dgwm.fresh\x26","4:https://gt%1$d.google.com/mt?v\x3dgwh.fresh\x26",false,,true,true,"",false,true,false,true,true,,,false,"1.x",false,false,false,,false,5000,false,true,'http://mt0.google.com/vt?hl\x3den\x26,http://mt1.google.com/vt?hl\x3den\x26',"US",true,true,false,true,false,false,true,24,6,2,false,false,0,false,false,false,false,false,false,false,false,false,true,false,false,true,false ];var _mHost = "http://maps.google.com";var _mUri = "/maps";var _mDomain = "google.com";var _mStaticPath = "http://maps.gstatic.com/intl/en_ALL/mapfiles/";var _mRelativeStaticPath = "/intl/en_ALL/mapfiles/";var _mJavascriptVersion = G_API_VERSION = "205b";var _mTermsUrl = "http://www.google.com/intl/en_ALL/help/terms_maps.html";var _mLocalSearchUrl = "http://www.google.com/uds/solutions/localsearch/gmlocalsearch.js";var _mHL = "en";var _mGL = "";var _mTrafficEnableApi = true;var _mTrafficTileServerUrls = ["http://mt0.google.com/mapstt","http://mt1.google.com/mapstt","http://mt2.google.com/mapstt","http://mt3.google.com/mapstt"];var _mTrafficCameraLayerIds = ["msid:103669521412303283270.000470c7965f9af525967","msid:111496436295867409379.00047329600bf6daab897"];var _mCityblockLatestFlashUrl = "http://maps.google.com/local_url?q=http://www.adobe.com/shockwave/download/download.cgi%3FP1_Prod_Version%3DShockwaveFlash&amp;dq=&amp;file=googleapi&amp;key=ABQIAAAAz2GdKU-VPA5WYpd4RF7AQxTAtgX-6aoE9zEkmxGVRHN2Hj-ZSRSK3wGiUAuG-lhBGFCY_8nhhJ6vHA&amp;v=2.x&amp;s=ANYYN7manSNIV_th6k0SFvGB4jz36is1Gg";var _mCityblockFrogLogUsage = false;var _mCityblockInfowindowLogUsage = false;var _mCityblockDrivingDirectionsLogUsage =false;var _mCityblockPrintwindowLogUsage =false;var _mCityblockPrintwindowImpressionLogUsage =false;var _mCityblockUseSsl = false;var _mAddressBookUrl = "/maps?file\x3dgoogleapi\x26key\x3dABQIAAAAz2GdKU-VPA5WYpd4RF7AQxTAtgX-6aoE9zEkmxGVRHN2Hj-ZSRSK3wGiUAuG-lhBGFCY_8nhhJ6vHA\x26v\x3d2.x\x26ie\x3dUTF8\x26hl\x3den\x26sidr\x3d1\x26oi\x3dsl_menu_edit";var _mWizActions = {hyphenSep: 1,breakSep: 2,dir: 3,searchNear: 6,savePlace: 9};var _mIGoogleUseXSS = false;var _mIGoogleEt = "4b73d0c1voPmd60J";var _mIGoogleServerTrustedUrl = "";var _mMMEnablePanelTab = true;var _mIdcRouterPath = "/maps/mpl/router";var _mIdcRelayPath = "/maps/mpl/relay";var _mIGoogleServerUntrustedUrl = "http://maps.gmodules.com";var _mMplGGeoXml = 100;var _mMplGPoly = 100;var _mMplMapViews = 100;var _mMplGeocoding = 100;var _mMplDirections = 100;var _mMplEnableGoogleLinks = true;var _mMMEnableAddContent = true;var _mMSEnablePublicView = true;var _mMSSurveyUrl = "";var _mMMLogPanelLoad = true;var _mSatelliteToken = "fzwq2tpNLAwD-KnB69eoza7ND0UmSocBtNNEBA";var _mMapCopy = "Map data \x26#169;2010 ";var _mSatelliteCopy = "Imagery \x26#169;2010 ";var _mGoogleCopy = "\x26#169;2010 Google";var _mPreferMetric = false;var _mMapPrintUrl = 'http://www.google.com/mapprint';var _mSvgForced = true;var _mLogPanZoomClks = false;var _mSXBmwAssistUrl = '';var _mSXCarEnabled = true;var _mSXServices = {};var _mSXPhoneEnabled = true;var _mSXQRCodeEnabled = false;var _mLyrcItems = [{label:"12102",layer_id:"com.panoramio.all"},{label:"12103",layer_id:"com.youtube.all"},{label:"12210",layer_id:"org.wikipedia.en"},{label:"12953",layer_id:"com.google.webcams"}];var _mAttrInpNumMap = {'hundred': 100,'thousand': 1000,'k': 1000,'million': 1000000,'m': 1000000,'billion': 1000000000,'b': 1000000000};var _mMSMarker = 'Placemark';var _mMSLine = 'Line';var _mMSPolygon = 'Shape';var _mMSImage = 'Image';var _mDirectionsDragging = true;var _mDirectionsEnableCityblock = true;var _mDirectionsEnableApi = true;var _mAdSenseForMapsEnable = "true";var _mAdSenseForMapsFeedUrl = "http://pagead2.googlesyndication.com/afmaps/ads";var _mReviewsWidgetUrl = "http://www.google.com/reviews/scripts/annotations_bootstrap.js?hl\x3den\x26amp;gl\x3d";var _mLayersTileBaseUrls = ['http://mt0.google.com/mapslt','http://mt1.google.com/mapslt','http://mt2.google.com/mapslt','http://mt3.google.com/mapslt'];var _mLayersFeaturesBaseUrl = "http://mt0.google.com/mapslt/ft";var _mPerTileBase = "http://mt0.google.com/vt/pt";function GLoadMapsScript() {if (!GLoadMapsScript.called && GBrowserIsCompatible()) {GLoadMapsScript.called = true;GScript("http://maps.gstatic.com/intl/en_ALL/mapfiles/205b/maps2.api/main.js");}}(function() {if (!window.google) window.google = {};if (!window.google.maps) window.google.maps = {};var ns = window.google.maps;ns.BrowserIsCompatible = GBrowserIsCompatible;ns.Unload = GUnload;})();GLoadMapsScript();
</script>

<script type="text/javascript" src="http://maps.gstatic.com/intl/en_ALL/mapfiles/205b/maps2.api/main.js">
</script>

<style media="screen" type="text/css">
 #map { float:left; width:700px; height:350px;margin:0;padding:0; border: solid 0.2px; }
 #list { float:right; width:200px;height:350px; background:#fff; list-style:none; padding:0;margin:0;margin-right:8px; background-image:url('images/boxshadow.gif'); background-position:bottom left; background-repeat:no-repeat; font-size:12px;}
 #list li { padding:10px; }
 #list li:hover { background:#555; color:#fff; cursor:pointer; cursor:hand; }
 #message { background:#555; color:#fff; position:absolute; display:none; width:100px; padding:5px; }
 #add-point { float:left; }
 div.input { padding:3px 0; }
 label { display:block; font-size:13px; }
 input, select { width:150px; }
 button { float:right; }
 div.error { color:red; font-weight:bold; }
</style>


 <script charset="utf-8" type="text/javascript">

 $(function(){
 var map = new GMap2(document.getElementById('map'));
 var burnsvilleMN = new GLatLng(20.920397,78.222656);
 map.setCenter(burnsvilleMN, 3);
 var bounds = new GLatLngBounds();
 var geo = new GClientGeocoder();
 map.setMapType(G_SATELLITE_MAP);
 map.setUIToDefault();

 var reasons=[];
 reasons[G_GEO_SUCCESS] = "Success";
 reasons[G_GEO_MISSING_ADDRESS] = "Missing Address";
 reasons[G_GEO_UNKNOWN_ADDRESS] = "Unknown Address.";
 reasons[G_GEO_UNAVAILABLE_ADDRESS]= "Unavailable Address";
 reasons[G_GEO_BAD_KEY] = "Bad API Key";
 reasons[G_GEO_TOO_MANY_QUERIES] = "Too Many Queries";
 reasons[G_GEO_SERVER_ERROR] = "Server error";

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
 .html(location.sname + ' at ' + location.name + ', ' + location.state)
 .click(function(){

 showMessage(marker, location.name);
 })
 .appendTo("#list");

 GEvent.addListener(marker, "click", function(){
 showMessage(this, location.name);
 });

 GEvent.addListener(map, "click", function(){
 $('#message').hide();
 });
 }
 /*
 function zoomToBounds() {
 map.setCenter(bounds.getCenter());
 map.setZoom(map.getBoundsZoomLevel(bounds)-1);
 }*/

 $("#message").appendTo( map.getPane(G_MAP_FLOAT_SHADOW_PANE) );
 /*
 function showMessage(marker, text){
 var markerOffset = map.fromLatLngToDivPixel(marker.getPoint());
 $("#message").hide().fadeIn()
 .css({ top:markerOffset.y, left:markerOffset.x })
.html(text);
 }*/


 function showMessage(marker, text){
 $("#message").hide();

 var moveEnd = GEvent.addListener(map, "moveend", function(){
 var markerOffset = map.fromLatLngToDivPixel(marker.getLatLng());
 $("#message")
 .fadeIn()
 .css({ top:markerOffset.y, left:markerOffset.x })
 .html(text);
 //.fadeOut();
 GEvent.removeListener(moveEnd);
 });
 map.panTo(marker.getLatLng());
 }
 });
</script>

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
<div class="map-show-link" style="margin-top: -10px;">
<a id="map-show-hide" style="text-decoration: none; margin-top: -10px; font-size: 13px;" href="#">
latest sightings 
<span style="color: rgb(217, 92, 21);">(X)</span>
</a>
</div>
<div id="map" style="margin-left: 8px; position: relative; background-color: rgb(229, 227, 223);">
<div style="overflow: hidden; position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;">
</div>
<div id="logocontrol" class="gmnoprint" style="-moz-user-select: none; z-index: 0; position: absolute; left: 2px; bottom: 2px;">
</div>
<div style="-moz-user-select: none; z-index: 0; position: absolute; right: 3px; bottom: 2px; color: white; font-family: Arial,sans-serif; font-size: 11px; white-space: nowrap; text-align: right;" dir="ltr">
</div>
<div id="lmc3d" class="gmnoprint" style="overflow: hidden; width: 59px; height: 272px; -moz-user-select: none; z-index: 0; position: absolute; left: 7px; top: 7px; text-align: left;">
</div>
<div id="hmtctl" class="gmnoprint" style="width: 200px; height: 22px; -moz-user-select: none; z-index: 0; position: absolute; right: 7px; top: 7px; color: black; font-family: Arial,sans-serif; font-size: small;">
</div>
<div id="scalecontrol" class="gmnoprint" style="width: 86px; height: 26px; -moz-user-select: none; z-index: 0; position: absolute; left: 68px; bottom: 5px; color: white; font-family: Arial,sans-serif; font-size: 11px;" jstcache="0">
</div>
<div id="map_magnifyingglass" class="gmnoprint" style="border: medium none ; width: 39px; height: 26px; visibility: hidden; -moz-user-select: none; z-index: 0; position: absolute; left: 458px; top: 27px;">
<div style="border-style: solid none none solid; border-color: rgb(255, 0, 0) -moz-use-text-color -moz-use-text-color rgb(255, 0, 0); border-width: 2px 0px 0px 2px; width: 6px; height: 4px; line-height: 1px; font-size: 1px; position: absolute; left: 35px; top: 23px;"/>
<div style="border-style: solid solid none none; border-color: rgb(255, 0, 0) rgb(255, 0, 0) -moz-use-text-color -moz-use-text-color; border-width: 2px 2px 0px 0px; width: 6px; height: 4px; line-height: 1px; font-size: 1px; position: absolute; left: 0px; top: 23px;"/>
<div style="border-style: none solid solid none; border-color: -moz-use-text-color rgb(255, 0, 0) rgb(255, 0, 0) -moz-use-text-color; border-width: 0px 2px 2px 0px; width: 6px; height: 4px; line-height: 1px; font-size: 1px; position: absolute; left: 0px; top: 0px;"/>
<div style="border-style: none none solid solid; border-color: -moz-use-text-color -moz-use-text-color rgb(255, 0, 0) rgb(255, 0, 0); border-width: 0px 0px 2px 2px; width: 6px; height: 4px; line-height: 1px; font-size: 1px; position: absolute; left: 35px; top: 0px;"/>
</div>
</div>
<ul id="list" style="">
<li>Common Kestrel at Nalagonda, Andhra Pradesh</li>
<li>Steppe Eagle at Near Corbett National Park, Uttarakhand</li>
<li>Gull-billed Tern at Kolleru Lake, Andhra Pradesh</li>
<li>Barn Swallow at Fatehpur Sikri, Uttar Pradesh</li>
<li>European Roller at Jita mode, Road Velhe - Nizampur (SH-97), Dt Raigad, Maharashtra, Maharashtra</li>
</ul>
<table style="width: 930px; margin-left: auto; margin-right: auto;">
<tbody>
<tr>
<td colspan="2">
<hr/>
</td>
</tr>
<tr>
<td class="cms" style="border-right: 1px solid rgb(217, 92, 21); width: 45%;">
<h3>About MigrantWatch</h3>
<p>
<span style="">Each winter, millions of birds belonging to hundreds of species migrate into India from latitudes further north. When do these birds come and how do they spread across the country? As the global climate changes, is the timing of migration changing too? Information is scarce and your help is needed to answer these questions.</span>
</p>
</td>
<td class="cms" style="width: 45%; padding-left: 15px;">
<h3>About MigrantWatch</h3>
<p>
<span style="">Each winter, millions of birds belonging to hundreds of species migrate into India from latitudes further north. When do these birds come and how do they spread across the country? As the global climate changes, is the timing of migration changing too? Information is scarce and your help is needed to answer these questions.</span>
</p>
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
<span class="ver12blkht">Addressing the media on the sidelines of the All-India Conference of the Central Administrative Tribunal (CAT) in the national capital, Chief Justice of India Balakrishnan said: "We have only asked that the names of four other judges should be processed for their appointment as judges of the Supreme Court."</span>
<span class="ver12blkht">Addressing the media on the sidelines of the All-India Conference of the Central Administrative Tribunal (CAT) in the national capital, Chief Justice of India Balakrishnan said: "We have only asked that the names of four other judges should be processed for their appointment as judges of the Supreme Court."</span>
</p>
</td>
</tr>
</tbody>
</table>

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
</div>
</div>
</div>
<div class="container bottom">
</div>

<script type="text/javascript" src="alerts/jquery.ui.draggable.js">
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(8(C){C.h={19:{13:8(E,D,H){c G=C.h[E].1K;2H(c F 3D H){G.1W[F]=G.1W[F]||[];G.1W[F].2F([D,H[F]])}},2f:8(D,F,E){c H=D.1W[F];5(!H){e}2H(c G=0;G<H.1F;G++){5(D.a[H[G][0]]){H[G][1].1M(D.j,E)}}}},1Z:{},d:8(D){5(C.h.1Z[D]){e C.h.1Z[D]}c E=C(\'<2c 33="h-3C">\').1V(D).d({n:"Z",6:"-3a",7:"-3a",3E:"3F"}).1v("11");C.h.1Z[D]=!!((!(/1G|3I/).X(E.d("1q"))||(/^[1-9]/).X(E.d("w"))||(/^[1-9]/).X(E.d("T"))||!(/35/).X(E.d("3H"))||!(/3G|3z\\(0, 0, 0, 0\\)/).X(E.d("3y"))));3w{C("11").3c(0).3e(E.3c(0))}3T(F){}e C.h.1Z[D]},3Y:8(D){C(D).1N("1Q","3p").d("30","35")},3S:8(D){C(D).1N("1Q","3R").d("30","")},3L:8(G,D){c F=/6/.X(D||"6")?"v":"u",E=p;5(G[F]>0){e q}G[F]=1;E=G[F]>0?q:p;G[F]=0;e E}};c A=C.2Q.1u;C.2Q.1u=8(){C("*",4).13(4).2J("1u");e A.1M(4,3k)};8 B(F,D,G){c E=C[F][D].3Q||[];E=(2j E=="2D"?E.2K(/,?\\s+/):E);e(C.3P(G,E)!=-1)}C.1C=8(D,E){c F=D.2K(".")[0];D=D.2K(".")[1];C.2Q[D]=8(J){c H=(2j J=="2D"),I=3M.1K.3W.2f(3k,1);5(H&&B(F,D,J)){c G=C.U(4[0],D);e(G?G[J].1M(G,I):1L)}e 4.1h(8(){c K=C.U(4,D);5(H&&K&&C.39(K[J])){K[J].1M(K,I)}1A{5(!H){C.U(4,D,3K C[F][D](4,J))}}})};C[F][D]=8(H,I){c G=4;4.1m=D;4.3t=F+"-"+D;4.a=C.1S({},C.1C.1H,C[F][D].1H,I);4.j=C(H).1x("1R."+D,8(L,J,K){e G.1R(J,K)}).1x("2G."+D,8(K,J){e G.2G(J)}).1x("1u",8(){e G.2u()});4.2m()};C[F][D].1K=C.1S({},C.1C.1K,E)};C.1C.1K={2m:8(){},2u:8(){4.j.3l(4.1m)},2G:8(D){e 4.a[D]},1R:8(D,E){4.a[D]=E;5(D=="1j"){4.j[E?"1V":"2s"](4.3t+"-1j")}},3U:8(){4.1R("1j",p)},3Z:8(){4.1R("1j",q)}};C.1C.1H={1j:p};C.h.2k={3b:8(){c D=4;4.j.1x("3x."+4.1m,8(E){e D.3f(E)});5(C.2h.2o){4.3i=4.j.1N("1Q");4.j.1N("1Q","3p")}4.3A=p},3r:8(){4.j.2b("."+4.1m);(C.2h.2o&&4.j.1N("1Q",4.3i))},3f:8(F){(4.1e&&4.1Y(F));4.27=F;c D=4,G=(F.3V==1),E=(2j 4.a.2e=="2D"?C(F.1T).38().13(F.1T).3B(4.a.2e).1F:p);5(!G||E||!4.2M(F)){e q}4.23=!4.a.2g;5(!4.23){4.3J=3X(8(){D.23=q},4.a.2g)}5(4.2z(F)&&4.2y(F)){4.1e=(4.1U(F)!==p);5(!4.1e){F.3N();e q}}4.2C=8(H){e D.3u(H)};4.2n=8(H){e D.1Y(H)};C(i).1x("36."+4.1m,4.2C).1x("3h."+4.1m,4.2n);e p},3u:8(D){5(C.2h.2o&&!D.3O){e 4.1Y(D)}5(4.1e){4.1y(D);e p}5(4.2z(D)&&4.2y(D)){4.1e=(4.1U(4.27,D)!==p);(4.1e?4.1y(D):4.1Y(D))}e!4.1e},1Y:8(D){C(i).2b("36."+4.1m,4.2C).2b("3h."+4.1m,4.2n);5(4.1e){4.1e=p;4.1I(D)}e p},2z:8(D){e(S.2l(S.1b(4.27.1k-D.1k),S.1b(4.27.1i-D.1i))>=4.a.2p)},2y:8(D){e 4.23},1U:8(D){},1y:8(D){},1I:8(D){},2M:8(D){e q}};C.h.2k.1H={2e:3n,2p:1,2g:0}})(31);(8(A){A.1C("h.l",A.1S({},A.h.2k,{2m:8(){c B=4.a;5(B.g=="2q"&&!(/(o|Z|17)/).X(4.j.d("n"))){4.j.d("n","o")}4.j.1V("h-l");(B.1j&&4.j.1V("h-l-1j"));4.3b()},1U:8(F){c H=4.a;5(4.g||H.1j||A(F.1T).4h(".h-4q-26")){e p}c B=!4.a.26||!A(4.a.26,4.j).1F?q:p;A(4.a.26,4.j).4r("*").4s().1h(8(){5(4==F.1T){B=q}});5(!B){e p}5(A.h.1n){A.h.1n.4p=4}4.g=A.39(H.g)?A(H.g.1M(4.j[0],[F])):(H.g=="2O"?4.j.2O():4.j);5(!4.g.38("11").1F){4.g.1v((H.1v=="m"?4.j[0].1D:H.1v))}5(4.g[0]!=4.j[0]&&!(/(17|Z)/).X(4.g.d("n"))){4.g.d("n","Z")}4.Y={7:(r(4.j.d("4o"),10)||0),6:(r(4.j.d("4l"),10)||0)};4.W=4.g.d("n");4.b=4.j.b();4.b={6:4.b.6-4.Y.6,7:4.b.7-4.Y.7};4.b.z={7:F.1k-4.b.7,6:F.1i-4.b.6};4.t=4.g.t();c C=4.t.b();5(4.t[0]==i.11&&A.2h.4m){C={6:0,7:0}}4.b.m={6:C.6+(r(4.t.d("2i"),10)||0),7:C.7+(r(4.t.d("2x"),10)||0)};c E=4.j.n();4.b.o=4.W=="o"?{6:E.6-(r(4.g.d("6"),10)||0)+4.t[0].v,7:E.7-(r(4.g.d("7"),10)||0)+4.t[0].u}:{6:0,7:0};4.1s=4.2B(F);4.V={T:4.g.2P(),w:4.g.2E()};5(H.1g){5(H.1g.7!=1L){4.b.z.7=H.1g.7+4.Y.7}5(H.1g.3g!=1L){4.b.z.7=4.V.T-H.1g.3g+4.Y.7}5(H.1g.6!=1L){4.b.z.6=H.1g.6+4.Y.6}5(H.1g.37!=1L){4.b.z.6=4.V.w-H.1g.37+4.Y.6}}5(H.k){5(H.k=="m"){H.k=4.g[0].1D}5(H.k=="i"||H.k=="1B"){4.k=[0-4.b.o.7-4.b.m.7,0-4.b.o.6-4.b.m.6,A(H.k=="i"?i:1B).T()-4.b.o.7-4.b.m.7-4.V.T-4.Y.7-(r(4.j.d("2X"),10)||0),(A(H.k=="i"?i:1B).w()||i.11.1D.2W)-4.b.o.6-4.b.m.6-4.V.w-4.Y.6-(r(4.j.d("2Z"),10)||0)]}5(!(/^(i|1B|m)$/).X(H.k)){c D=A(H.k)[0];c G=A(H.k).b();4.k=[G.7+(r(A(D).d("2x"),10)||0)-4.b.o.7-4.b.m.7,G.6+(r(A(D).d("2i"),10)||0)-4.b.o.6-4.b.m.6,G.7+S.2l(D.4n,D.2U)-(r(A(D).d("2x"),10)||0)-4.b.o.7-4.b.m.7-4.V.T-4.Y.7-(r(4.j.d("2X"),10)||0),G.6+S.2l(D.2W,D.2S)-(r(A(D).d("2i"),10)||0)-4.b.o.6-4.b.m.6-4.V.w-4.Y.6-(r(4.j.d("2Z"),10)||0)]}}4.1d("1f",F);4.V={T:4.g.2P(),w:4.g.2E()};5(A.h.1n&&!H.32){A.h.1n.4u(4,F)}4.g.1V("h-l-3o");4.1y(F);e q},12:8(C,D){5(!D){D=4.n}c B=C=="Z"?1:-1;e{6:(D.6+4.b.o.6*B+4.b.m.6*B-(4.W=="17"||(4.W=="Z"&&4.t[0]==i.11)?0:4.t[0].v)*B+(4.W=="17"?A(i).v():0)*B+4.Y.6*B),7:(D.7+4.b.o.7*B+4.b.m.7*B-(4.W=="17"||(4.W=="Z"&&4.t[0]==i.11)?0:4.t[0].u)*B+(4.W=="17"?A(i).u():0)*B+4.Y.7*B)}},2B:8(E){c F=4.a;c B={6:(E.1i-4.b.z.6-4.b.o.6-4.b.m.6+(4.W=="17"||(4.W=="Z"&&4.t[0]==i.11)?0:4.t[0].v)-(4.W=="17"?A(i).v():0)),7:(E.1k-4.b.z.7-4.b.o.7-4.b.m.7+(4.W=="17"||(4.W=="Z"&&4.t[0]==i.11)?0:4.t[0].u)-(4.W=="17"?A(i).u():0))};5(!4.1s){e B}5(4.k){5(B.7<4.k[0]){B.7=4.k[0]}5(B.6<4.k[1]){B.6=4.k[1]}5(B.7>4.k[2]){B.7=4.k[2]}5(B.6>4.k[3]){B.6=4.k[3]}}5(F.1c){c D=4.1s.6+S.3j((B.6-4.1s.6)/F.1c[1])*F.1c[1];B.6=4.k?(!(D<4.k[1]||D>4.k[3])?D:(!(D<4.k[1])?D-F.1c[1]:D+F.1c[1])):D;c C=4.1s.7+S.3j((B.7-4.1s.7)/F.1c[0])*F.1c[0];B.7=4.k?(!(C<4.k[0]||C>4.k[2])?C:(!(C<4.k[0])?C-F.1c[0]:C+F.1c[0])):C}e B},1y:8(B){4.n=4.2B(B);4.1t=4.12("Z");4.n=4.1d("1l",B)||4.n;5(!4.a.1O||4.a.1O!="y"){4.g[0].1P.7=4.n.7+"21"}5(!4.a.1O||4.a.1O!="x"){4.g[0].1P.6=4.n.6+"21"}5(A.h.1n){A.h.1n.1l(4,B)}e p},1I:8(C){c D=p;5(A.h.1n&&!4.a.32){c D=A.h.1n.4B(4,C)}5((4.a.1w=="4z"&&!D)||(4.a.1w=="4y"&&D)||4.a.1w===q){c B=4;A(4.g).4v(4.1s,r(4.a.1w,10)||4w,8(){B.1d("1p",C);B.2r()})}1A{4.1d("1p",C);4.2r()}e p},2r:8(){4.g.2s("h-l-3o");5(4.a.g!="2q"&&!4.1X){4.g.1u()}4.g=3n;4.1X=p},1W:{},2t:8(B){e{g:4.g,n:4.n,2I:4.1t,a:4.a}},1d:8(C,B){A.h.19.2f(4,C,[B,4.2t()]);5(C=="1l"){4.1t=4.12("Z")}e 4.j.2J(C=="1l"?C:"1l"+C,[B,4.2t()],4.a[C])},2u:8(){5(!4.j.U("l")){e}4.j.3l("l").2b(".l").2s("h-l");4.3r()}}));A.1S(A.h.l,{1H:{1v:"m",1O:p,2e:":4x",2g:0,2p:1,g:"2q"}});A.h.19.13("l","1q",{1f:8(D,C){c B=A("11");5(B.d("1q")){C.a.2v=B.d("1q")}B.d("1q",C.a.1q)},1p:8(C,B){5(B.a.2v){A("11").d("1q",B.a.2v)}}});A.h.19.13("l","14",{1f:8(D,C){c B=A(C.g);5(B.d("14")){C.a.2w=B.d("14")}B.d("14",C.a.14)},1p:8(C,B){5(B.a.2w){A(B.g).d("14",B.a.2w)}}});A.h.19.13("l","1o",{1f:8(D,C){c B=A(C.g);5(B.d("1o")){C.a.2A=B.d("1o")}B.d("1o",C.a.1o)},1p:8(C,B){5(B.a.2A){A(B.g).d("1o",B.a.2A)}}});A.h.19.13("l","22",{1f:8(C,B){A(B.a.22===q?"4t":B.a.22).1h(8(){A(\'<2c 33="h-l-22" 1P="4k: #46;"></2c>\').d({T:4.2U+"21",w:4.2S+"21",n:"Z",1o:"0.40",14:47}).d(A(4).b()).1v("11")})},1p:8(C,B){A("2c.48").1h(8(){4.1D.3e(4)})}});A.h.19.13("l","1J",{1f:8(D,C){c E=C.a;c B=A(4).U("l");E.18=E.18||20;E.1a=E.1a||20;B.16=8(F){2Y{5(/1G|1J/.X(F.d("29"))||(/1G|1J/).X(F.d("29-y"))){e F}F=F.m()}3q(F[0].1D);e A(i)}(4);B.15=8(F){2Y{5(/1G|1J/.X(F.d("29"))||(/1G|1J/).X(F.d("29-x"))){e F}F=F.m()}3q(F[0].1D);e A(i)}(4);5(B.16[0]!=i&&B.16[0].25!="24"){B.2R=B.16.b()}5(B.15[0]!=i&&B.15[0].25!="24"){B.2T=B.15.b()}},1l:8(D,C){c E=C.a;c B=A(4).U("l");5(B.16[0]!=i&&B.16[0].25!="24"){5((B.2R.6+B.16[0].2S)-D.1i<E.18){B.16[0].v=B.16[0].v+E.1a}5(D.1i-B.2R.6<E.18){B.16[0].v=B.16[0].v-E.1a}}1A{5(D.1i-A(i).v()<E.18){A(i).v(A(i).v()-E.1a)}5(A(1B).w()-(D.1i-A(i).v())<E.18){A(i).v(A(i).v()+E.1a)}}5(B.15[0]!=i&&B.15[0].25!="24"){5((B.2T.7+B.15[0].2U)-D.1k<E.18){B.15[0].u=B.15[0].u+E.1a}5(D.1k-B.2T.7<E.18){B.15[0].u=B.15[0].u-E.1a}}1A{5(D.1k-A(i).u()<E.18){A(i).u(A(i).u()-E.1a)}5(A(1B).T()-(D.1k-A(i).u())<E.18){A(i).u(A(i).u()+E.1a)}}}});A.h.19.13("l","2V",{1f:8(D,C){c B=A(4).U("l");B.1r=[];A(C.a.2V===q?".h-l":C.a.2V).1h(8(){c F=A(4);c E=F.b();5(4!=B.j[0]){B.1r.2F({34:4,T:F.2P(),w:F.2E(),6:E.6,7:E.7})}})},1l:8(J,O){c I=A(4).U("l");c L=O.a.41||20;c D=O.2I.7,C=D+I.V.T,P=O.2I.6,N=P+I.V.w;2H(c H=I.1r.1F-1;H>=0;H--){c E=I.1r[H].7,B=E+I.1r[H].T,R=I.1r[H].6,M=R+I.1r[H].w;5(!((E-L<D&&D<B+L&&R-L<P&&P<M+L)||(E-L<D&&D<B+L&&R-L<N&&N<M+L)||(E-L<C&&C<B+L&&R-L<P&&P<M+L)||(E-L<C&&C<B+L&&R-L<N&&N<M+L))){43}5(O.a.3v!="49"){c K=S.1b(R-N)<=20;c Q=S.1b(M-P)<=20;c G=S.1b(E-C)<=20;c F=S.1b(B-D)<=20;5(K){O.n.6=I.12("o",{6:R-I.V.w,7:0}).6}5(Q){O.n.6=I.12("o",{6:M,7:0}).6}5(G){O.n.7=I.12("o",{6:0,7:E-I.V.T}).7}5(F){O.n.7=I.12("o",{6:0,7:B}).7}}5(O.a.3v!="4a"){c K=S.1b(R-P)<=20;c Q=S.1b(M-N)<=20;c G=S.1b(E-D)<=20;c F=S.1b(B-C)<=20;5(K){O.n.6=I.12("o",{6:R,7:0}).6}5(Q){O.n.6=I.12("o",{6:M-I.V.w,7:0}).6}5(G){O.n.7=I.12("o",{6:0,7:E}).7}5(F){O.n.7=I.12("o",{6:0,7:B-I.V.T}).7}}}}});A.h.19.13("l","3m",{1f:8(D,C){c B=A(4).U("l");B.2d=[];A(C.a.3m).1h(8(){5(A.U(4,"2N")){c E=A.U(4,"2N");B.2d.2F({f:E,3s:E.a.1w});E.4c();E.1d("4d",D,B)}})},1p:8(D,C){c B=A(4).U("l");A.1h(B.2d,8(){5(4.f.1z){4.f.1z=0;B.1X=q;4.f.1X=p;5(4.3s){4.f.a.1w=q}4.f.1I(D);4.f.j.2J("4j",[D,A.1S(4.f.h(),{4i:B.j})],4.f.a.4g);4.f.a.g=4.f.a.2L}1A{4.f.1d("42",D,B)}})},1l:8(F,E){c D=A(4).U("l"),B=4;c C=8(K){c H=K.7,J=H+K.T,I=K.6,G=I+K.w;e(H<(4.1t.7+4.b.z.7)&&(4.1t.7+4.b.z.7)<J&&I<(4.1t.6+4.b.z.6)&&(4.1t.6+4.b.z.6)<G)};A.1h(D.2d,8(G){5(C.2f(D,4.f.4A)){5(!4.f.1z){4.f.1z=1;4.f.2a=A(B).2O().1v(4.f.j).U("2N-34",q);4.f.a.2L=4.f.a.g;4.f.a.g=8(){e E.g[0]};F.1T=4.f.2a[0];4.f.2M(F,q);4.f.1U(F,q,q);4.f.b.z.6=D.b.z.6;4.f.b.z.7=D.b.z.7;4.f.b.m.7-=D.b.m.7-4.f.b.m.7;4.f.b.m.6-=D.b.m.6-4.f.b.m.6;D.1d("45",F)}5(4.f.2a){4.f.1y(F)}}1A{5(4.f.1z){4.f.1z=0;4.f.1X=q;4.f.a.1w=p;4.f.1I(F,q);4.f.a.g=4.f.a.2L;4.f.2a.1u();5(4.f.3d){4.f.3d.1u()}D.1d("44",F)}}})}});A.h.19.13("l","1E",{1f:8(D,B){c C=A.4b(A(B.a.1E.4e)).4f(8(F,E){e(r(A(F).d("14"),10)||B.a.1E.28)-(r(A(E).d("14"),10)||B.a.1E.28)});A(C).1h(8(E){4.1P.14=B.a.1E.28+E});4[0].1P.14=B.a.1E.28+C.1F}})})(31);',62,286,'||||this|if|top|left|function||options|offset|var|css|return|instance|helper|ui|document|element|containment|draggable|parent|position|relative|false|true|parseInt||offsetParent|scrollLeft|scrollTop|height|||click|||||||||||||||||||Math|width|data|helperProportions|cssPosition|test|margins|absolute||body|convertPositionTo|add|zIndex|overflowX|overflowY|fixed|scrollSensitivity|plugin|scrollSpeed|abs|grid|propagate|_mouseStarted|start|cursorAt|each|pageY|disabled|pageX|drag|widgetName|ddmanager|opacity|stop|cursor|snapElements|originalPosition|positionAbs|remove|appendTo|revert|bind|mouseDrag|isOver|else|window|widget|parentNode|stack|length|auto|defaults|mouseStop|scroll|prototype|undefined|apply|attr|axis|style|unselectable|setData|extend|target|mouseStart|addClass|plugins|cancelHelperRemoval|mouseUp|cssCache||px|iframeFix|_mouseDelayMet|HTML|tagName|handle|_mouseDownEvent|min|overflow|currentItem|unbind|div|sortables|cancel|call|delay|browser|borderTopWidth|typeof|mouse|max|init|_mouseUpDelegate|msie|distance|original|clear|removeClass|uiHash|destroy|_cursor|_zIndex|borderLeftWidth|mouseDelayMet|mouseDistanceMet|_opacity|generatePosition|_mouseMoveDelegate|string|outerHeight|push|getData|for|absolutePosition|triggerHandler|split|_helper|mouseCapture|sortable|clone|outerWidth|fn|overflowYOffset|offsetHeight|overflowXOffset|offsetWidth|snap|scrollHeight|marginRight|do|marginBottom|MozUserSelect|jQuery|dropBehaviour|class|item|none|mousemove|bottom|parents|isFunction|5000px|mouseInit|get|placeholder|removeChild|mouseDown|right|mouseup|_mouseUnselectable|round|arguments|removeData|connectToSortable|null|dragging|on|while|mouseDestroy|shouldRevert|widgetBaseClass|mouseMove|snapMode|try|mousedown|backgroundColor|rgba|started|filter|gen|in|display|block|transparent|backgroundImage|default|_mouseDelayTimer|new|hasScroll|Array|preventDefault|button|inArray|getter|off|enableSelection|catch|enable|which|slice|setTimeout|disableSelection|disable|001|snapTolerance|deactivate|continue|fromSortable|toSortable|fff|1000|DragDropIframeFix|inner|outer|makeArray|refreshItems|activate|group|sort|receive|is|sender|sortreceive|background|marginTop|mozilla|scrollWidth|marginLeft|current|resizable|find|andSelf|iframe|prepareOffsets|animate|500|input|valid|invalid|containerCache|drop'.split('|'),0,{}))
</script>

<script type="text/javascript">
 $(function() {
 $("#table1")
 .tablesorter({ headers: {
 5: { sorter: false }, 6: { sorter: false }, 7 : { sorter: false }, 8: { sorter: false } },widthFixed: true, widgets: ['zebra']})
 .tablesorterPager({container: $("#pager"), positionFixed: false});
$("#table2")
 .tablesorter({widthFixed: true, widgets: ['zebra']})
 .tablesorterPager({container: $("#pager2"), positionFixed: false});
 });
</script>



<iframe id="CalendarControlIFrame" frameborder="0" scrolling="no" src="javascript:false;">

<html>
<head/>
<body>false</body>
</html>
</iframe>
<div id="CalendarControl"/>
<script language="javascript">

 function isEmpty(s){
 return ((s == null) || (s.length == 0))
 }

 // BOI, followed by one or more whitespace characters, followed by EOI.
 var reWhitespace = /^\s+$/
// BOI, followed by one or more characters, followed by @,
 // followed by one or more characters, followed by .,
 // followed by one or more characters, followed by EOI.
 var reEmail = /^.+\@.+\..+$/
 var defaultEmptyOK = false
 // Returns true if string s is empty or
 // whitespace characters only.

 function isWhitespace (s){ // Is s empty?
 return (isEmpty(s) || reWhitespace.test(s));
 }

 function validate(){
 if (isWhitespace(document.frm_login.email.value) || document.frm_login.email.value == 'email id'){
 alert('Please enter your email address.');
 document.frm_login.email.focus();
 return false;
 }

 if(isWhitespace(document.frm_login.pwd.value)) {
 alert("Please enter password.");
 document.frm_login.pwd.focus();
 return false;
 }
 return true;

} 
</script>

<div id="jsts" style="display: none; position: absolute;">
<div>
<div id="sc_jstemplate" jstcache="0">
<div jsvalues=".style.left:$this.left;.style.top:$this.top;.style.width:$this.width;.style.height:$this.height" jsselect="bars" style="overflow: hidden; position: absolute;" jstcache="1">
</div>
<div jsvalues=".style.left:$this.left;.style.bottom:$this.bottom;.style.top:$this.top" jscontent="$this.title" jsselect="scales" style="position: absolute;" jstcache="2"/>
</div>
</div>
</div>
</body>
</html>
