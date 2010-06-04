<?php 
include './includes/dbc.php';
page_protect();

?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<title>SeasonWatch : Explore data</title>
<link media="screen, projection" type="text/css" href="blueprint/screen.css" rel="stylesheet">
</link>
<link media="print" type="text/css" href="blueprint/print.css" rel="stylesheet">
</link>
<link media="screen, projection" type="text/css" href="blueprint/plugins/fancy-type/screen.css" rel="stylesheet">
</link>
<script src="js/jquery-1.3.2.min.js" type="text/javascript">
</script>
<script src="js/jquery.validate.js" type="text/javascript">
</script>
<link type="text/css" href="css/styles_new.css" rel="stylesheet">
</link>
<link type="text/css" href="css/sighting.css" rel="stylesheet">
</link>
<style type="text/css">
@media print{.gmnoprint{display:none}}@media screen{.gmnoscreen{display:none}}
</style>
<script type="text/javascript" charset="UTF-8" src="http://maps.gstatic.com/cat_js/intl/en_ALL/mapfiles/208a/maps2.api/%7Bmod_drag,mod_ctrapi%7D.js">
</head>
<script type="text/javascript">

     var styles = [[{
      
        height: 35,
        width: 35,
        opt_anchor: [16, 0],
        opt_textColor: '#FF00FF'
      },
      {
       
        height: 45,
        width: 45,
        opt_anchor: [24, 0],
        opt_textColor: '#FF0000'
      },
      {
        
        height: 55,
        width: 55,
        opt_anchor: [32, 0]
      }],
      [{
        
        height: 27,
        width: 30,
        anchor: [3, 0],
        textColor: '#FF00FF'
      },
      {
        
        height: 36,
        width: 40,
        opt_anchor: [6, 0],
        opt_textColor: '#FF0000'
      },
      {
        
        width: 50,
        height: 45,
        opt_anchor: [8, 0]
      }],
      [{
        
        height: 26,
        width: 30,
        opt_anchor: [4, 0],
        opt_textColor: '#FF00FF'
      },
      {
        
        height: 35,
        width: 40,
        opt_anchor: [8, 0],
        opt_textColor: '#FF0000'
      },
      {
       
        width: 50,
        height: 44,
        opt_anchor: [12, 0]
      }]];
     var map = null;
      var markers = [];
      var markerClusterer = null;

    function initialize() {
        if(GBrowserIsCompatible()) {
         var icon1 = new GIcon();
	icon1.shadow = "" ;
	icon1.image = "mark1.png";
	icon1.iconSize = new GSize(8, 8);
	icon1.shadowSize = new GSize(0, 0);
	icon1.iconAnchor = new GPoint(6, 1);
	icon1.infoWindowAnchor = new GPoint(5, 1);

	var icon2 = new GIcon();
	icon2.shadow = "" ;
	icon2.image = "mark2.png";
	icon2.iconSize = new GSize(8, 8);
	icon2.shadowSize = new GSize(0, 0);
	icon2.iconAnchor = new GPoint(6, 1);
	icon2.infoWindowAnchor = new GPoint(5, 1);

	var icon3 = new GIcon();
	icon3.shadow = "" ;
	icon3.image = "mark3.png";
	icon3.iconSize = new GSize(8, 8);
	icon3.shadowSize = new GSize(0, 0);
	icon3.iconAnchor = new GPoint(6, 1);
	icon3.infoWindowAnchor = new GPoint(5, 1);

	var icon4 = new GIcon();
	icon4.shadow = "" ;
	icon4.image = "mark4.png";
	icon4.iconSize = new GSize(8, 8);
	icon4.shadowSize = new GSize(0, 0);
	icon4.iconAnchor = new GPoint(6, 1);
	icon4.infoWindowAnchor = new GPoint(5, 1);

	var icon5 = new GIcon();
	icon5.shadow = "" ;
	icon5.image = "mark5.png";
	icon5.iconSize = new GSize(8, 8);
	icon5.shadowSize = new GSize(0, 0);
	icon5.iconAnchor = new GPoint(6, 1);
	icon5.infoWindowAnchor = new GPoint(5, 1);

	var icon6 = new GIcon();
	icon6.shadow = "" ;
	icon6.image = "mark6.png";
	icon6.iconSize = new GSize(8, 8);
	icon6.shadowSize = new GSize(0, 0);
	icon6.iconAnchor = new GPoint(6, 1);
	icon6.infoWindowAnchor = new GPoint(5, 1);

	var icon7 = new GIcon();
	icon7.shadow = "" ;
	icon7.image = "mark7.png";
	icon7.iconSize = new GSize(8, 8);
	icon7.shadowSize = new GSize(0, 0);
	icon7.iconAnchor = new GPoint(6, 1);
	icon7.infoWindowAnchor = new GPoint(5, 1);

	var icon8 = new GIcon();
	icon8.shadow = "" ;
	icon8.image = "mark8.png";
	icon8.iconSize = new GSize(8, 8);
	icon8.shadowSize = new GSize(0, 0);
	icon8.iconAnchor = new GPoint(6, 1);
	icon8.infoWindowAnchor = new GPoint(5, 1);

	var icon9 = new GIcon();
	icon9.shadow = "" ;
	icon9.image = "mark9.png";
	icon9.iconSize = new GSize(8, 8);
	icon9.shadowSize = new GSize(0, 0);
	icon9.iconAnchor = new GPoint(6, 1);
	icon9.infoWindowAnchor = new GPoint(5, 1);

	var icon10 = new GIcon();
	icon10.shadow = "" ;
	icon10.image = "mark10.png";
	icon10.iconSize = new GSize(8, 8);
	icon10.shadowSize = new GSize(0, 0);
	icon10.iconAnchor = new GPoint(6, 1);
	icon10.infoWindowAnchor = new GPoint(5, 1);
	 map = new GMap2(document.getElementById('map'));
          map.setCenter(new GLatLng(20.21,77.86), 4);
          map.addControl(new GLargeMapControl());
          map.addControl(new GMapTypeControl());
          
      <?
	 
          $table_sql = $sql;
	 $result = mysql_query($sql);
	 $i = 1;
	list($startSeason,$endSeason) =  explode('-',$season);
         while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $loc_name = $line['location_name'];
            if( $line['latitude'] ) {
            
	    print "var latlng = new GLatLng(" . $line['latitude'] . "+(Math.random()*0.0002)-0.0001," . $line['longitude'] . "+(Math.random()*0.0002)-0.0001);\n";

	    print "var markerOnMap = createMarker(latlng,'"  . addslashes( $loc_name ) ." ', 'test', 'test','test', 'test','test', 'test','test','test',icon7);\n";
            //print "var markerOnMap = createMarker(latlng, '" . addslashes( $loc_name ) ."');\n"; 
            print "markers.push(markerOnMap);\n";
	    }
          }
      ?>
       refreshMap();
          
        }
      }

       function createMarker(point, user, friend, location, city, state, species, sDate, obsFreq, start, icon){
       	
                var markerOnMap = new GMarker(point,icon);
                GEvent.addListener(markerOnMap, "click", function() {
                        markerOnMap.openInfoWindowHtml(user);
                });
                return markerOnMap;
        }

   
      function refreshMap() {
        if (markerClusterer != null) {
          markerClusterer.clearMarkers();
        }
        var zoom = parseInt(document.getElementById("zoom").value, 10);
        var size = parseInt(document.getElementById("size").value, 10);
        var style = document.getElementById("style").value;
        zoom = zoom == -1 ? null : zoom;
        size = size == -1 ? null : size;
        style = style == "-1" ? null: parseInt(style, 10);
        markerClusterer = new MarkerClusterer(map, markers, {maxZoom: zoom, gridSize: size, styles: styles[style]});
      }
</script>
</head> 

<body onload="load()" onunload="GUnload()">
<div class="container first_image" style="padding-bottom: 10px; width: 950px; margin-left: auto; margin-right: auto; -moz-border-radius-bottomleft: 10px; -moz-border-radius-bottomright: 10px;">
</div>
<div class="container first_image"  style="padding-bottom:10px;width:950px;margin-left:auto;margin-right:auto">
<script type="text/javascript">
$("ul.tabs li.label").hide();
$("#tab-set > div").hide();
$("#tab-set > div").eq(0).show();
//$("#tab-set > div").eq(1).show();
$("ul.tabs a").click(
function() {
$("ul.tabs a.selected").removeClass('selected');
$("#tab-set > div").hide();
$(""+$(this).attr("href")).fadeIn('slow');
$(this).addClass('selected');
$('#table1').trigger("appendCache");
return false;
}
);
$("#toggle-label").click( function() {
$(".tabs li.label").toggle();
return false;
});
</script>
<script type="text/javascript">
$().ready(function() {
$('#species').emptyonclick();
$('#location').emptyonclick();
$("#species").autocomplete("autocomplete_reports.php", {
width: 260,
selectFirst: false,
matchSubset :0,
mustMatch: true,
});

$("#species").result(function(event , data, formatted) {
 if (data) {
 document.getElementById('species_hidden').value = data[1];
 }
});

$('#location').autocomplete("auto_miglocations.php", {
 width: 400,
 selectFirst: false,
 matchSubset :0,
 mustMatch: true,
});

$("#location").result(function(event , data, formatted) {
 if (data) {
 document.getElementById('location_hidden').value = data[1];
 }
});
});


function get_remove(parameter) {
var remove_season = '2007-2008';
var remove_type = 'All';
var remove_species = '';
var remove_user = 'All';
var remove_state = '';
var remove_location = '';

if ( parameter == 'season') {
 remove_season = '2009-2010';
}

if ( parameter == 'type') {
 remove_type = 'All';
}

if (parameter == 'species') {
 remove_species = 'All';
}

if (parameter == 'user') {
 remove_user = 'All';
}

if (parameter == 'location') {
 remove_location = 'All';
}

if ( parameter == 'state') {
 remove_state = 'All';
}

var url = "data.php?season=" + remove_season + "&type=" + remove_type + "&species=" + remove_species + "&user=" + remove_user + "&state=" + remove_state + "&location=" + remove_location;

window.location = url;
}

function formatItem(row) {
 var completeRow;
 completeRow = new String(row);
 var scinamepos = completeRow.lastIndexOf("(");
 var rest = substr(completeRow,0,scinamepos);
 var sciname = substr(completeRow,scinamepos);
 var commapos = sciname.lastIndexOf(",");
 sciname = substr(sciname,0,commapos);
 var newrow = rest + ' <i>' + sciname + '</i>';
 return newrow;
}

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

 function isWhitespace (s)

{ // Is s empty?
return (isEmpty(s) || reWhitespace.test(s));
}

function substr( f_string, f_start, f_length ) {
// http://kevin.vanzonneveld.net
// + original by: Martijn Wieringa
// * example 1: substr("abcdef", 0, -1);
// * returns 1: "abcde"
 if(f_start < 0) {
 f_start += f_string.length;
 }

if(f_length == undefined) {
f_length = f_string.length;
} else if(f_length < 0){
f_length += f_string.length;
} else {
f_length += f_start;
}

if(f_length < f_start) {
f_length = f_start;
}

return f_string.slice(f_start,f_length);
}
</script>
<script src="js/pager/jquery.tablesorter.pager.js" type="text/javascript"/>
<script src="js/pager/jquery.tablesorter.pager.js" type="text/javascript">
</script>
<script src="js/pager/chili-1.8b.js" type="text/javascript">
</script>
<script src="js/pager/docs.js" type="text/javascript">
</script>
<link type="text/css" rel="stylesheet" href="js/pager/style.css">

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
<script language="javascript" src="js/jquery.autocomplete.js"></script>
<script language="javascript" src="js/jquery.bgiframe.min.js"></script>
<script language="javascript" src="js/jquery.autocomplete.js"></script>
<link type="text/css" rel="stylesheet" href="js/jquery.autocomplete.css">
<link type="text/css" rel="stylesheet" href="js/jquery.emptyonclick.css">
<FORM name="reports" action="data.php" method="GET">
<table class="filter">    
<tr>
<td style=''>Season</td>
<td>Participant</td>
</tr>      
<td style="width:190px;">
<select style="width:85%;font-size:12px;" name='season'>

<div class="container" style="width: 930px; margin-left: auto; margin-right: auto; text-align: right;">
<div id="tab-set" class="container" style="border-top: 1px solid rgb(217, 92, 21); width: 930px; margin-left: auto; margin-right: auto;">
<ul class="tabs">
<li>
<a class="selected" href="#text1">map</a>
</li>
<li>
<a class="" href="#text2">tabular</a>
</li>
</ul>
<div id="text1" style="display: block;">
<div id="map" style="width: 930px; height: 500px; position: relative; background-color: rgb(229, 227, 223);">
















<?php
/**
* Use the current month and year to find out the last season to be
* displayed in the drop down. (Season : 1st July - 31st Aug)
*/
?>
$sql = "SELECT DISTINCT u.user_name, u.user_id from migwatch_users u INNER JOIN migwatch_l1 l1 ON ";
   $sql .= "l1.user_id=u.user_id WHERE l1.valid=1 ";
             //$sql .= "AND l1.obs_start BETWEEN '$season-07-01' AND '$seasonEnd-06-30'  ";
                    $sql .= "ORDER BY u.user_name";
                    $result = mysql_query($sql);
   if(mysql_num_rows($result) <= 0) {
       $sql = "SELECT DISTINCT u.user_name, u.user_id from migwatch_users u INNER JOIN migwatch_l1 l1 ON ";
       $sql .= "l1.user_id=u.user_id WHERE l1.valid=1 ORDER BY u.user_name";
       $result = mysql_query($sql);
       }
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
       print "<option value=".$row{'user_id'};
       if (($_GET['user'] != "") && ($_GET['user'] == $row{'user_id'}))
       print " selected ";
       print ">".$row{'user_name'}."</option>";
       }
?>
</select>
</div>&nbsp;

<?php 
if( is_numeric( $_GET['user'] )) {  ?>
<a href="#" onclick="get_remove('user');">X</a>
<? } ?>
</td><td></td>
</tr>

<tr><td colspan='4' style='height:15px'></tr>
		<tr>
			<td colspan="2">State</td>
         <td colspan="2">Location</td>
<td>
<? if( count($_GET) > 0 ) { ?>
<a href="data.php">Remove&nbsp;All</a>
<? } ?>
</td>
</tr>
<tr>
          
          <td colspan="2" style="">
             <select style="width:93%;"  id="state" name=state >

                        <option value="all">All the States</option>
                    <?php

                            $result = mysql_query("SELECT state_id, state FROM migwatch_states order by state");
                            if($result){
						while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
                                    if($row['state'] != 'Not In India') {
                                        print "<option value=".$row{'state_id'};
                                        if (($_GET['state'] != "") && ($_GET['state'] == $row{'state_id'}))
                                            print " selected ";
                                        print ">".$row{'state'}."</option>";
					                          } else {
                                        $other_id = $row['state_id'];
                                        $other = $row['state'];
                                    }
                                }
                                print("<option value=".$other_id);
							if($other_id == $state_id)
                                    print " selected ";
				    	                  print ">".$other."</option>\n";
                            }

                    ?></select>&nbsp;&nbsp;
                   <? if( is_numeric($_GET['state'] )) {  ?>
                     <a title="remove state" href="#" onclick="get_remove('state');">X</a>
                   <? } ?>

          </td>

<td style="width:400px;">
   <input type='text' id='location' value="<? echo $strLocation; ?>" style="width:85%;border:solid 1px #666">
   <input type='hidden' id='location_hidden' name='location' value="<? echo $location; ?>">
   <? if( is_numeric($_GET['location'] )) {  ?>
   &nbsp;<a title="remove location" href="#" onclick="get_remove('location');">X</a>
   <? } ?>
</td>
        
<td style='width:110px'><a style='width:80px;padding:5px;background-color:#333;color:#fff'>Remove All</a>&nbsp;<input type='submit' style='padding:5px;width:80px' value='go'></td>
</form>
</tr>
</table>

<?php  
   $url = '';
   foreach( $_GET as $key => $value ) {
   	    if( strtolower($value) != 'all' && $value !='' ) {
   	    $url_add .="&" . $key . "=" . $value;
}
}
?>

<div class='container' style="width:930px;margin-left:auto;margin-right:auto;text-align:right">
<a href='download.php?output=kml<? echo $url_add; ?>'>KML</a>&nbsp;&nbsp;<a href='download.php?output=csv<? echo $url_add; ?>'>CSV</a>
</div>
<?php 
$result = mysql_query($table_sql);
if (mysql_num_rows($result) > 0) {
?>

<div class='container' style="width:930px;margin-left:auto;margin-right:auto;border-top:solid 1px #d95c15" id='tab-set'>
<ul class='tabs'>
<li><a href='#text1' class='selected'>map</a></li>
<li><a href='#text2'>tabular</a></li>
</ul>
<div id='text1'>
<input type="hidden" id="size" value="-1">
<input type="hidden" id="zoom" value="-1">
<input type="hidden" id="style" value="-1">
<div id="map" style="width:930px;height:500px"></div>
</div>
<div id='text2'>
<table id="table1" class="tablesorter" style="width:930px;margin-left:auto;margin-right:auto" cellpadding="3">
<thead>
<tr>
<th>&nbsp;No</th>
<th>Common Name</th>           
<th>Location</th>
<th style='width:30px'>Date</th>                        
<th>Sighting type</th>
<th>Count</th>
<th>Reported by</th>
<th>On behalf of</th>
</tr>
</thead>
<tbody>
<?php 
$i=1;
//$result = mysql_query($table_sql);
list($startSeason,$endSeason) =  explode('-',$_GET['season']);
//if (mysql_num_rows($result) > 0) {
while ($row = mysql_fetch_array($result)) {
print "<tr>";
print "<td style='width:200px;'>".$row{'common_name'}."</td>";
print "<td style='width:200px;'>".$row{'location_name'}.", ".$row{'city'}.", ".$row{'state'}."</td>";
print "<td style='width:150px'>".date("d-m-Y",strtotime($row{'sighting_date'}))."</td>";
print "<td>" . ucfirst($row{'obs_type'}) . "</td>";
($row['number'] > 0 ) ? print "<td>".$row{'number'}."</td>" : print "<td> -- </td>";
print "<td>".$row{'user_name'}."</td>";
print "<td style='border-right:0.5px solid #ffcb1a'>".$row{'user_friend'}."</td>";
print "</tr>";
$i++;
}
?>
</tbody>
</table>
<div id="pager" class="column span-7" style="" >
<form name="" action="" method="post">
<table >
<tr>
<td><img src='pager/icons/first.png' class='first'/></td>
<td><img src='pager/icons/prev.png' class='prev'/></td>
<td><input type='text' size='8' class='pagedisplay'/></td>
<td><img src='pager/icons/next.png' class='next'/></td>
<td><img src='pager/icons/last.png' class='last'/></td>
<td>
<select class='pagesize'>
<option selected='selected'  value='10'>10</option>
<option value='20'>20</option>
<option value='30'>30</option>
<option  value='40'>40</option>
</select>
</td>
</tr>
</table>
</form>
</div>
</div>
</div>
<?php 
} 
else 
{
?> 

<div class='container notice' style="width:900px;margin-left:auto;margin-right:auto;">no results</div>
<?php 
}
?>
</div>
<script type='text/javascript'>

			$().ready(function() {

            $("#species").autocomplete("autocomplete_reports.php", {
                width: 260,
                selectFirst: false,
                matchSubset :0,
                mustMatch: true,
                            
           });

         $("#species").result(function(event , data, formatted) {
                if (data)
						
                  document.getElementById('species_hidden').value = data[1];
                  
						
          });


         $('#location').autocomplete("auto_miglocations.php", {
                width: 495,
                selectFirst: false,
                matchSubset :0,
                mustMatch: true,
                  //formatItem:formatItem
                 
          });

         $("#location").result(function(event , data, formatted) {
                if (data)
                  document.getElementById('location_hidden').value = data[1];
                  
                          
         });
});

</script>

<script type="text/javascript">
function get_remove(parameter) {

<? if($_GET['type']){
   $remove_type = $_GET['type'];
   }
  
   if($_GET['species']){
      $remove_species = $_GET['species'];
   }

   if($_GET['user']){
   $remove_user = $_GET['user'];
   }
   
   if($_GET['state']){
      $remove_state = $_GET['state'];
   }

   if($_GET['location']){
   $remove_location = $_GET['location'];
    }

    if($_GET['season']){
   $remove_season = $_GET['season'];
    }

?>
var remove_season = '<? echo $remove_season; ?>';
var remove_type = '<? echo $remove_type; ?>';
var remove_species = '<? echo $remove_species; ?>';
var remove_user = '<? echo $remove_user; ?>';
var remove_state = '<? echo $remove_state; ?>';
var remove_location = '<? echo $remove_location; ?>';

  if ( parameter == 'season') {
    
     remove_season = '<? echo getCurrentSeason(); ?>';
     alert(remove_season);
   }


   if ( parameter == 'type') {
      remove_type = 'All';
     }

    if (parameter == 'species') {
       remove_species = 'All'; 
     }

     if (parameter == 'user') {
     remove_user = 'All'; 
       
     
     }

 

    if (parameter == 'location') {
      remove_location = 'All';
       }

   if ( parameter == 'state') {
    remove_state = 'All'; 



  } 

  var url = "data.php?season=" + remove_season + "&type=" + remove_type + "&species=" + remove_species + "&user=" + remove_user + "&state=" + remove_state + "&location=" + remove_location;
 
  
  window.location = url;
}
</script>

<script language="javascript">

        function formatItem(row) {
            var completeRow;
            completeRow = new String(row);
            var scinamepos = completeRow.lastIndexOf("(");
            var rest = substr(completeRow,0,scinamepos);
            var sciname = substr(completeRow,scinamepos);
            var commapos = sciname.lastIndexOf(",");
            sciname = substr(sciname,0,commapos);
            var newrow = rest + ' <i>' + sciname + '</i>';
            return newrow;
        }

        function isEmpty(s)
        {   return ((s == null) || (s.length == 0))
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

        function isWhitespace (s)

        {   // Is s empty?
            return (isEmpty(s) || reWhitespace.test(s));
        }
        function formReset(){
            document.rpt_l1.target = "";
            document.rpt_l1.action = "rpt_level1.php";
        }

        function showReport(){
            document.rpt_l1.target = "blank";
            document.rpt_l1.action = "rpt_level1_excel.php";
            document.rpt_l1.submit();
            document.rpt_l1.target = "";
        }


        function validate(){
            if(isWhitespace(document.frm_chpass.opwd.value))
            {
                alert('Please enter old password');
                return false;
            }


            if(document.frm_chpass.pwd.value != document.frm_chpass.pwd1.value){
                alert("The new passwords dont match. Please re-enter.");
                return false;
            }

            if(document.frm_chpass.pwd.value.length < 6){
                alert("The new password should be atleast 6 characters long.");
                return false;
            }

            return true;

        }

        function substr( f_string, f_start, f_length ) {
            // http://kevin.vanzonneveld.net
            // +     original by: Martijn Wieringa
            // *         example 1: substr("abcdef", 0, -1);
            // *         returns 1: "abcde"

            if(f_start < 0) {
                f_start += f_string.length;
            }

            if(f_length == undefined) {
                f_length = f_string.length;
            } else if(f_length < 0){
                f_length += f_string.length;
            } else {
                f_length += f_start;
            }

            if(f_length < f_start) {
                f_length = f_start;
            }

            return f_string.slice(f_start,f_length);
        }

        

        
	    
    </script>


<div class="container bottom"></div>
</body>
</html>
