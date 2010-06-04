<?php 
include './includes/dbc.php';
mysql_select_db("ncbs_test");
page_protect();
//print_r($HTTP_POST_VARS);

$speciesId=($_POST['species_id']);
$treeid=($_POST['tree_id']);
//echo $treeid;
//echo "$speciesId";
//echo $_POST[is_fertilised];


//$treelocationname=$_POST[tree_location_name];
//echo $treelocationname;

$treelocationname=$_POST[tree_location_name];
//echo $treelocationname;

$query = mysql_query("SELECT tree_location_id FROM location_master WHERE location_name='$treelocationname'");
while($row = mysql_fetch_array($query)) 
{
$treelocid = $row['tree_location_id'];
//echo $treelocid;
}

if($_POST['doUpdate'] == 'Update') {
$dfw_fieldname="";
$dfw_value="";
$dos_fieldname="";
$dos_value="";

$theight_fieldname="";
$theight_value="";

$tgirth_fieldname="";
$tgirth_value="";


 if($_POST[distance_from_water]!="")
 {
 $dfw_fieldname="`distance_from_water`=";
 $dfw_value="'$_POST[distance_from_water]',";
 }
 if($_POST[degree_of_slope]!="")
 {
 $dos_fieldname="`degree_of_slope`=";
$dos_value="'$_POST[degree_of_slope]',";
 }

if($_POST[tree_height]!="")
 {
 $theight_fieldname="`tree_height`=";
 $theight_value="'$_POST[tree_height]',";
 }
 
 
 if($_POST[tree_girth]!="")
 {
 $tgirth_fieldname="`tree_girth`=";
 $tgirth_value="'$_POST[tree_girth]',";
 }
 
 
$sql1 = "UPDATE trees SET  
              `tree_id` = '$treeid',
              `tree_desc`='".addslashes($_POST[tree_desc])."',
              `is_fertilised` ='$_POST[is_fertilised]',
              `is_watered` ='$_POST[is_watered]',
              `species_id` ='$speciesId',
              `tree_location_id` ='$_SESSION[treelocID]',
              `location_type` ='".addslashes($_POST[location_type])."',
              ".$dfw_fieldname.$dfw_value.$dos_fieldname.$dos_value."
              `aspect` ='".addslashes($_POST[aspect])."'
               WHERE tree_id = '$treeid'";  
              mysql_query($sql1,$link)or die("Insertion Failed:" .mysql_error()); 

//if($_POST['doUpdate'] == 'Update') 
//{                    /*$sql1 = "UPDATE trees SET  
              `tree_id` = '$treeid',                                                                                        
       		  `tree_desc`='$_POST[tree_desc]',
              `is_fertilised`='$_POST[is_fertilised]',
              `is_watered`='$_POST[is_watered]', 
              `species_id`='$speciesId',
              `tree_location_id`='$treelocid',
              `location_type`='$_POST[location_type]',
              `aspect`='$_POST[aspect]',
              `distance_from_water`='$_POST[distance_from_water]',
              `degree_of_slope`='$_POST[degree_of_slope]'
               WHERE tree_id= '$treeid'";  */
//echo "sql1";
//mysql_query($sql1,$link)or die("Insertion Failed:" .mysql_error()); 

//echo "ID of last inserted record is: " . mysql_insert_id();
//$tree_id = mysql_insert_id();
//echo "$tree_id";

$sql2 = "UPDATE user_tree_table SET  
         `tree_id` = '$treeid',
         `tree_nickname`='".addslashes($_POST[tree_nickname])."',
         `tree_id`='$treeid',
         `user_id`='$_SESSION[user_id]'
          WHERE tree_id = '$treeid' AND user_id = '$_SESSION[user_id]'";
//echo "sql2"; 
mysql_query($sql2,$link) or die("Insertion Failed:" .mysql_error()); 

//echo "$_SESSION[user_id]";



$sql3 = "UPDATE tree_measurement SET
               `tree_id`= '$treeid',
               `user_id`='$_SESSION[user_id]',
               `date_of_measurement`=now(),
               ".$theight_fieldname.$theight_value."
               ".$tgirth_fieldname.$tgirth_value."    
               `tree_damage`='$_POST[tree_damage]',
               `other_notes`='".addslashes($_POST[other_notes])."'           
               WHERE tree_id = '$treeid' AND user_id = '$_SESSION[user_id]'";   
//echo "sql3";
mysql_query($sql3,$link) or die("Insertion Failed:" .mysql_error().$sql3); 
//echo "Done id: ".$row.". <br />"; 

$sql4 = "UPDATE location_master SET  
              `tree_location_id` = '$treelocid',                                                                                       
               WHERE tree_location_id= '$treelocationname'";  
//echo "sql1";
mysql_query($sql1,$link)or die("Insertion Failed:" .mysql_error()); 
}
mysql_close($link);
?> 
 
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<title>Updating Tree</title>
</head>

<body>
<!--Successfully Edited. Close this box to continue.-->
</body>
<script type="text/javascript">
window.top.tb_remove();
</script>
</html>



