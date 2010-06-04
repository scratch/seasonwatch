<?php 
include './includes/dbc.php';
page_protect();
//print_r($HTTP_POST_VARS);

$usertreeId=($_POST['usertreeid']);
$observationId=($_POST['observationid']);
//echo $usertreeId; 
//echo $observationId;
//echo $_POST[is_flower_bud];

$updatedate=date("Y-m-d",strtotime($_POST['obdate']));
//echo $updatedate;


if($_POST['doUpdate'] == 'Update') 
{                      $sql1 = "UPDATE user_tree_observations SET  
               `date`='$updatedate', 
               `is_leaf_fresh`= '$_POST[is_leaf_fresh]',
               `freshleaf_count`='$_POST[freshleaf_count]',
               `is_leaf_mature`= '$_POST[is_leaf_mature]',
               `matureleaf_count`='$_POST[matureleaf_count]',
               `is_flower_bud`= '$_POST[is_flower_bud]', 
               `bud_count`='$_POST[bud_count]',
               `is_fruit_unripe`= '$_POST[is_fruit_unripe]',
               `fruit_unripe_count`='$_POST[fruit_unripe_count]',
               `is_fruit_ripe`= '$_POST[is_fruit_ripe]', 
               `fruit_ripe_count`='$_POST[fruit_ripe_count]',
              `is_flower_open`= '$_POST[is_flower_open]', 
              `open_flower_count`= '$_POST[open_flower_count]',
              `animal_desc`= '".addslashes($_POST[animal_desc])."',
              `temperature_max`= '$_POST[temperature_max]', 
              `temperature_min`= '$_POST[temperature_min]', 
              `rainfall_mm`= '$_POST[rainfall_mm]',  
              `humidity_mm`= '$_POST[humidity_mm]'
               WHERE observation_id= '$observationId'";   
//echo "sql1";  
mysql_query($sql1,$link)or die("Insertion Failed:" .mysql_error()); 

}
mysql_close($link); 
?> 
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<title>SeasonWatch</title>
</head>

<body>
<!--Successfully Edited. Close this box to continue.-->
</body>
<script type="text/javascript">
window.top.tb_remove();
</script>
</html>
</html>

