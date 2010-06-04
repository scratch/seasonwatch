<?php 
include("includes/dbc.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="blueprint/print.css" type="text/css" media="print">
<link rel="stylesheet" href="blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<link rel="stylesheet" href="css/styles_new.css" type="text/css">

<title>SaesonWatch: Edit Tree Details</title>
 
<?php 
include("contribheader.php");
   
// Values will be added later
//$allowedOrdByFlds = array('obcno','spc','fsd','fsloc','lsd','lsloc');
 
// If set put the selected sesason in session.
//if( $_REQUEST['season']!='' && $_REQUEST['season']!='All' ) {
//$season = $_REQUEST['season'];
//} else {
//$season = 'All';
//}
 
//       if( $_REQUEST['location']!='All') {
  //         $location = $_REQUEST['location'];
    //  } else {
      //  $location = 'All';
      //}
    
//if(is_numeric($_REQUEST['species'])) {
//$species = $_REQUEST['species'];
  //     } else {
    //      $species = 'All';
      //   }
 
    //if(isset($_REQUEST['type'])) {
      //if( strtolower($_REQUEST['type'])!='all') {
//$type = $_REQUEST['type'];
  //         } else {
    //             $type = 'All';
      //     }
     //}
 
//if(is_numeric($_REQUEST['state'])) {
//$state = $_REQUEST['state'];
  //       } else {
    //        $state = 'All';
      //   }
 //
// //Remember the season.
//$_SESSION['myspecies']['season'] = $season;
//$_SESSION['myspecies']['location'] = $location;
//$_SESSION['myspecies']['species'] = $species;
//$_SESSION['myspecies']['type'] = $species;
 
//if ($season) {
// Now for the first sightings query.
//$seasonArr = explode('-',$season);
//$seasonStart = $seasonArr[0];
//$seasonEnd = $seasonArr[1];
//} 
 
//if($_GET['location']!= 'All') { $get_loc = $_GET['location']; }
//$get_species = $_GET['species'];
//$get_season = $_GET['season'];
 
?> 
 
<div class="container first_image">
<div class='container' style="width:950px;margin-top:-5px" id='tab-set'>
<ul class='tabs' style="margin-left:20px;">
<li style='width:200px;font-size:100%'><a href='#edit' class='selected'><span>my&nbsp;sightings</span></a></li>
</ul>
<div id='edit' class=''>
<table class="filter">
<form id='editform' method="GET" name="frm_sortfield">
<tr>
<!--<td>Season</td>-->
<!--<td>Sighting type</td>-->
<td>Tree Name</td>
</tr>
<tr>
<!--<td style="width:140px;">
<select style="width:85%;font-size:12px;" name='season'>
<option value="All">All</option>
<?php
$sql = "SELECT obs_start FROM migwatch_l1 ORDER BY obs_start DESC LIMIT 0,1";
$res = mysql_query($sql);
if (mysql_num_rows($res) > 0) { 
$row = mysql_fetch_assoc($res);
$endSeason = substr($row['obs_start'],0,4);
}
 
for ($i = 2007;$i <= $endSeason; $i++) {
$fromTo = "$i-".($i+1);
                        
echo '<option value=' . $fromTo; 
if ($season == $fromTo) {
echo ' selected>';
} else {
echo '>';
}
 
echo $fromTo;
echo '</option>'; 
}
?> 
</select>&nbsp;&nbsp;<?php  $current_season = 'All';  
                    
if( $_GET['season'] != '' && $_GET['season'] != $current_season ) {
?> 
<a href="#" title="remove season" onClick="get_remove('season');">X</a>
<? } ?>
</td>-->

<!--<td style="width:140px;"> 
<select name="type" style="width:85%">
<option value="All">All</option>
<option value="first"<?php if($type == 'first') print("selected"); ?>>First Sighting</option>
<option value="general"<?php if($type == 'general') print("selected"); ?>>General Sighting</option>
<option value="last"<?php if($type == 'last') print("selected"); ?>>Last Sighting</option>
</select>
&nbsp;&nbsp; 
<?php 
if( $_GET['type'] != "" ) {
if( $_GET['type'] != 'All') { ?>
<a href="#" title="remove <? echo $type; ?> sighting" onclick="get_remove('type');">X</a>
<?php  }
} ?>
</td>-->

<?php 
 
$sql = mysql_query("SELECT species_primary_common_name,species_scientific_name FROM Species_master");
        /* $sql.= " FROM Species_master";
        $sql.= "INNER JOIN trees ON Species_master.species_id = trees.species_id ";
        $sql.= "INNER JOIN user_tree_table ON trees.species_id =user_tree_table.tree_id";
        $sql.= "WHERE trees.species_id = '".$_SESSION[user_id]."' AND l1.deleted = '0' ";*/
                                     
      //$res = mysql_query($sql); 
    
    while ($data1 = mysql_fetch_array($sql)){
$data1 .= "<option  value='{$row['species_primary_common_name']}'>{$row['species_scientific_name']}</option>";
//echo">$data1[species_primary_common_name] ( <i> $data1[species_scientific_name] </i> )</option>";
}
echo "<td><select ><option value=''>-- SELECT --</option>";
echo $data1;
echo "</select>";

         // if( is_numeric($_GET['species'] )) { ?>
    //   &nbsp;<a href="#" title="remove species" onclick="get_remove('species');">X</a>

 ?>

</td></tr>
<tr><td style='height:20px'></td></tr>
<tr>
<td colspan='2' style=''>State</td>
<td>Location</td>
<?php 
if (count($_GET) > 0 ) { ?>
<td><a href="/editsightings.php">Remove&nbsp;all</a></td>
<? } ?>
</tr>
 
<tr>
<td colspan="2" style="">
<select style="width:93%;" id="state" name=state >
 
<option value="All">All the States</option>
<?php 
 
$result = mysql_query("SELECT state_id, state FROM seswatch_states order by state");
if($result){
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
                                        if($row['state'] != 'Not In India'	) {
                                        print "<option value=".$row{'state_id'};
                                        if (($state != "") && ($state == $row{'state_id'}))
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

<?php 
if( is_numeric($_GET['state'] )) { ?>
<a href="#" title="remove <? echo $_GET['state']; ?>" onclick="get_remove('state');">X</a>
<?php 
} ?>
</td>

<?php 
       
 $sql = "SELECT distinct l.location_id, l.location_name,l.city,l.district";
 $sql.= "FROM migwatch_l1 l1 ";
 $sql.= "INNER JOIN migwatch_species s ON l1.species_id = s.species_id ";
 $sql.= "INNER JOIN migwatch_locations l ON l1.location_id = l.location_id ";
 $sql.= "INNER JOIN migwatch_states st ON st.state_id = l.state_id ";
 $sql.= "WHERE l1.user_id = '".$user_id."' AND l1.deleted = '0' ";
                                        
if ($season != 'All') {
    $sql .= " AND l1.obs_start BETWEEN '$seasonStart-07-01' AND '$seasonEnd-06-30'
AND l1.obs_start <> '1999-11-30' AND l1.obs_start <> '0000-00-00'";
                }
$sql .= " ORDER by id DESC";
         $res = mysql_query($sql);
         echo "<td style='width:300px;'><select id='location' name='location' style='width:95%;border:solid 1px #666'>";
         echo "<option style='' value='All'>-- SELECT --</option>";
         while ($data1 = mysql_fetch_assoc($res)) {
echo "<option class='selectbox' style='' value=$data1[location_id]";
           if (($location != "") && ($location == $data1['location_id']))
           print " selected ";
           echo ">$data1[location_name] , $data1[city] , $data1[district]</option>";
      } 
      echo "</select>";

if( is_numeric($_GET['location'] )) { ?> 
&nbsp;<a href="#" title="remove location" onclick="get_remove('location');">X</a>
<?php  }
echo "</td>"; 

        $sql = "SELECT distinct s.common_name, s.species_id ";
        $sql.= "FROM migwatch_l1 l1 ";
        $sql.= "INNER JOIN migwatch_species s ON l1.species_id = s.species_id ";
        $sql.= "INNER JOIN migwatch_locations l ON l1.location_id = l.location_id ";
        $sql.= "INNER JOIN migwatch_states st ON st.state_id = l.state_id ";
        $sql.= "WHERE l1.user_id = '".$user_id."' AND l1.deleted = '0' ";
                                        
         if ($season != 'All') {
         $sql.= " AND l1.obs_start BETWEEN '$seasonStart-07-01' AND '$seasonEnd-06-30'
AND l1.obs_start <> '1999-11-30' AND l1.obs_start <> '0000-00-00'";
        }
  
                                        
        //echo $sql;
$res = mysql_query($sql);
 
 
     
//echo $species_remove; 
 
$sql = "SELECT l1.number, s.common_name, l.location_name, l.city, st.state, l1.sighting_date, l1.species_id, l1.location_id, ";
$sql.= "l1.obs_type, l1.id, l1.deleted FROM migwatch_l1 l1 ";
$sql.= "INNER JOIN migwatch_species s ON l1.species_id = s.species_id ";
$sql.= "INNER JOIN migwatch_locations l ON l1.location_id = l.location_id ";
$sql.= "INNER JOIN migwatch_states st ON st.state_id = l.state_id ";
$sql.= "WHERE l1.user_id = '$user_id' AND l1.deleted = '0' ";
               
if ($season != 'All') { 
list($seasonStart,$seasonEnd) = explode('-',$season);
$sql .= " AND l1.obs_start BETWEEN '$seasonStart-07-01' AND '$seasonEnd-06-30'
AND l1.obs_start <> '1999-11-30' AND l1.obs_start <> '0000-00-00'";
}
  
               if( $location) {
                  if($location!= 'All') { 
                   $sql .=" AND l1.location_id='$location'";
                  }
               }
 
               if( $species) { 
                  if($species!= 'All')
                   $sql .=" AND s.species_id='$species'";
               }
 
if( $type) {
                  if($type != 'All') 
                   $sql .=" AND l1.obs_type = '$type'";
               }
 
if( $state ) {
                  if($state != 'All')
                   $sql .=" AND l.state_id = '$state'";
               }
 
$sql .= " ORDER by id DESC"; 
  
//$res = mysql_query($sql);
?>

<td style='width:110px;'><input type='submit' style='padding:2px' value='go'></td>
<?php  
echo "</form>";
?>
</tr></table>
<?php 
$result = mysql_query($sql);
if (mysql_num_rows($result) > 0) {
?>
<table id="table1" class="tablesorter" style='width:930px;margin-left:auto;margin-right:auto' cellpadding=3 cellspacing=0 >
<thead>
<tr>
<th>&nbsp;No</th>
<th>Species Name</th>
<th>Location</th>
<th>Date</th> 
<th>Type</th>
<th>Count</th>
<th>Edit</th>
<th>Delete</th>
<th>Photos</th>
</tr>
</thead>      
<tbody>
<?php
if($result) {
$i =1;
$j = (($pageno - 1) * $rows_per_page) + 1;
   while($row = mysql_fetch_array($result)) { 
 
print "<tr class='delboxtr'>";
$sLinkBegin = "<a class=thickbox rel=gallery-plants href=\"editlevel.php?id=".$row['id']."&TB_iframe=true&height=500&width=700\">Edit</a>";
         $photoLink = "<a class=thickbox rel=gallery-plants href=\"uploadphotos.php?id=".$row['id']."&TB_iframe=true&height=500&width=800\">Upload Photo</a>";
print "<td style='width:50px'>".$j."</td>";
        print "<td>".$row{'common_name'}."</td>"; 
print "<td style='width:220px'>".$row{'location_name'}.", ".$row{'city'}.", ".$row{'state'}."</td>";
print "<td>".date("d-M-Y",strtotime($row{'sighting_date'}))."</td>";
print "<td>".ucfirst($row['obs_type'])." </td>";
print "<td>"; echo (empty($row['number'])) ? '--' : $row['number']; print "</td>";
        print "<td>$sLinkBegin</td>";
?>
<td><a class="deletesight" id="delete-<? echo $row['id']; ?>" href="#x">Delete</a></td>
<td style='border-right:0.5px solid #ffcb1a'><? echo $photoLink; ?></td>
<?
print "</tr>"; 
$i++;
$j++;
    }
  }
echo "</tbody></table>";

?>

<div id="pager" style="width:200px" > 
<form name="" action="" method="post">
<table>
<tr>
<td><img src='pager/icons/first.png' class='first'/></td>
<td><img src='pager/icons/prev.png' class='prev'/></td>
<td><input type='text' size='8' class='pagedisplay'/></td>
<td><img src='pager/icons/next.png' class='next'/></td>
<td><img src='pager/icons/last.png' class='last'/></td> 
<td>
<select class='pagesize' style='width:50px'>
<option selected='selected' value='10'>10</option>
<option value='20'>20</option>
<option value='30'>30</option>
<option value='40'>40</option> 
</select>
</td>
</tr>
</table>
</form>
</div>
<? 
} else {
?>
<table>
<tr>
<td style="text-align:center"><div class="notice">You have not yet reported any sightings for the selected season.</div></td>
</tr>
</table>
<?php } ?> 
 
<script type="text/javascript">
$(document).ready(function() {  
$('a.deletesight').click(function() {  
//e.preventDefault();
var parent = $(this).parent().parent();
id = $(this).attr('id');
id = id.replace(/delete-/, "");
jConfirm('Are you sure you want ot delete this sighting ?', '',function(r)
{
if(r==true)
{
$.post('deletesighting.php', { id: id, ajax: 'true' }, function() {
parent.fadeOut(2000, function() {
parent.animate( { backgroundColor: '#cb5555' }, 500);
});
});
}
});
});
});
</script>
</div>
</div>
</div>
</div>
</div>
<link rel="stylesheet" href="tabs/screen.css" type="text/css" media="screen">
</div>
</div>
</div>
<div class="container bottom">
</div>
<script type="text/javascript">
function dosubmit() {
$("#editform").submit();
}
</script>
 
<script type="text/javascript">
function get_remove(parameter) {
 
<?php 
if($_GET['type']){
$remove_type = $_GET['type'];
}
if($_GET['species']){
   $remove_species = $_GET['species'];
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
 
if (parameter == 'location') {
remove_location = 'All';
}
 
if ( parameter == 'state') {
remove_state = 'All';
}
 
var url = "editsightings.php?season=" + remove_season + "&type=" + remove_type + "&species=" + remove_species + "&state=" + remove_state + "&location=" + remove_location;
window.location = url;
}
</script>
<?php 
include("page_includes_js.php"); ?>
</body>
</html>