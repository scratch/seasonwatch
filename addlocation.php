<?php 
include './includes/dbc.php';
page_protect();

//echo $_SESSION[user_id];

if( $_REQUEST['Submit'] ) {
     $loc_name = trim(addslashes(($_POST['loc_name'])));
     //echo $loc_name; 
     $loc_lat = trim($_POST['lat']);
     //echo $loc_lat; 
     $loc_lng = trim($_POST['lng']);
     //echo $loc_lng;
     $loc_state_id = trim($_REQUEST['state']);
     //echo $loc_state_id;
     $sql = mysql_query("SELECT state FROM seswatch_states WHERE state_id='$loc_state_id'");
while ($data = mysql_fetch_assoc($sql)){
$loc_state = $data['state']; 
//echo $loc_state;
}
     $loc_city = trim($_REQUEST['city']); 
     //echo $loc_city;     
     $loc_country = trim($_REQUEST['country']); 
  //   echo $loc_country;
     $loc_zoom  = trim($_REQUEST['zoom']);
    // echo $loc_zoom;
    
if(strtolower($loc_country) != 'india')
{      
echo "<div class='notice'>Please choose a location only from India</div>";
}
else if(($loc_state != '') && ($loc_name != '') && ($loc_lat != '') && ($loc_lng != ''))
{
$sql1 = "INSERT INTO location_master 
              (location_name,state_id,city,
              longitude,latitude,zoom_factor)  
              VALUES
              ('".addslashes($loc_name)."',
              '$loc_state_id',  
              '$loc_city',
              '$loc_lng',
              '$loc_lat',
              '$loc_zoom'            
              )";   
              mysql_query($sql1,$link)or die("Insertion Failed:" .mysql_error());
}

$treelocationid=mysql_insert_id();
//echo $treelocationid;
session_start(); 
$_SESSION['treelocID'] = $treelocationid; // store session data
//echo $_SESSION['treelocID'];

echo "<table border='1'>
<tr>
<th>Location Name</th>
<th>City</th>
<th>Latitude</th>
<th>Longitude</th>
<th>State</th>
</tr>";

$query1 = mysql_query("SELECT location_name,latitude,longitude,city FROM location_master WHERE tree_location_id='$treelocationid'");
while($row = mysql_fetch_array($query1)) 
{
echo "<td>" . $row['location_name'] . "</td>";
echo "<td>" . $row['city'] . "</td>";
echo "<td>" . $row['latitude'] . "</td>";
echo "<td>" . $row['longitude'] . "</td>";
$treelocation = $row['location_name'];
}
echo "<td>" . $loc_state . "</td>";

//session_start(); 
$_SESSION['treelocation'] = $treelocation; // store session data
//echo "treelocation = ". $_SESSION['treelocation']; //retrieve data
}           
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
<!--<link rel="stylesheet" href="css/styles_new.css" type="text/css"></link>-->
<link rel="stylesheet" href="css/sighting.css" type="text/css"></link>
<!-- <script>
var loc = "<? echo $loc_name; ?>, " + "<? echo $loc_city; ?>, " + "<? echo $loc_state; ?>";
var sighting = '<? echo $loc_sighting; ?>';
parent.new_info(loc,sighting);
parent.tb_remove();                                
</script> -->
<style>
.error { color: red; }
</style>

</head>

<body>
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
<p>Added Succesfully</p>
</body>
<script type="text/javascript">
window.top.tb_remove();
</script>