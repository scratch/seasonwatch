<?php 
include './includes/dbc.php';
page_protect();

$tree_id = mysql_query("SELECT tree_id FROM trees WHERE user_id='$_SESSION[user_id]'");
$usertreeid=$_POST['usertreeid'];

//echo $_POST['usertreeid'];


$insertdate=date("Y-m-d",strtotime($_POST['obdate']));
//echo $insertdate; 


if($_POST['Submit'] == 'Submit')  
{                     foreach($_POST as $key => $value)
{ 
$data[$key] = filter($value);
}   
$result = "INSERT INTO user_tree_observations    
     (date,
     is_leaf_fresh,
     freshleaf_count,
     is_leaf_mature,
     matureleaf_count,
     is_flower_bud,
     bud_count,
     is_flower_open,
     open_flower_count,
     is_fruit_ripe,
     fruit_ripe_count,
     is_fruit_unripe,
     fruit_unripe_count,
     animal_desc,
     birds_desc,
     insect_desc,
     temperature_max,
     temperature_min,
     rainfall_mm,
     humidity_mm,
     user_tree_id) 
     VALUES
             ( '$insertdate',  
               '$_POST[is_leaf_fresh]', 
               '$_POST[freshleaf_count]', 
               '$_POST[is_leaf_mature]',
               '$_POST[matureleaf_count]', 
               '$_POST[is_flower_bud]', 
               '$_POST[bud_count]', 
               '$_POST[is_flower_open]',
               '$_POST[open_flower_count]',  
               '$_POST[is_fruit_ripe]',  
               '$_POST[fruit_ripe_count]',  
               '$_POST[is_fruit_unripe]',
               '$_POST[fruit_unripe_count]',
               '".addslashes($_POST[animal_desc])."',
               '".addslashes($_POST[birds_desc])."',
               '".addslashes($_POST[insect_desc])."',  
               '$_POST[temperature_max]',  
               '$_POST[temperature_min]',
               '$_POST[rainfall_mm]',
               '$_POST[humidity_mm]', 
               '$usertreeid'
               )";  
 // echo $result;
  mysql_query($result,$link) or die("Insertion failed:" .mysql_error());
 
  
$sql = mysql_query("SELECT date,is_leaf_freshs,is_leaf_mature,freshleaf_count,matureleaf_count,is_flower_bud,bud_count,is_flower_open,
     open_flower_count,is_fruit_ripe,fruit_ripe_count,is_fruit_unripe,fruit_unripe_count,animal_desc,birds_desc,insect_desc,temperature_max,temperature_min,rainfall_mm,
     humidity_mm FROM user_tree_observations");
     }
?> 
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<title>SeasonWatch</title>
</head>

<body>
<link rel="stylesheet" href="blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="blueprint/print.css" type="text/css" media="print">
<link rel="stylesheet" href="blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<link rel="stylesheet" href="css/styles_new.css" type="text/css">


<!--You have Submitted successfully -->

<?php 
/*echo "<table border='1'>
<tr>
<td align=right><b>You have just added an observation with the following details</b></td>
</tr>";  
echo "<table border='1'>   
<tr>  
<th>Date Of Observation</th>
<th>Leaf Fresh</th> 
<th>Leaf Fresh Amount</th> 
<th>Leaf Mature</th>
<th>Leaf Mature Amount</th>   
<th>Flower Bud</th>
<th>Flower Bud Amount</th> 
<th>Open Flower</th>
<th>Open flower Amount</th> 
<th>Fruit Unripe</th>
<th>Fruit Unripe Amount</th> 
<th>Fruit Ripe</th>
<th>Fruit Ripe Amount</th> 
<th>Animal/ Bird /insect Description</th>

</tr>";
  

$obdate = date("Y-m-d",strtotime($_POST['obdate']));
echo "<td>" . $obdate . "</td>";

$fresh_status = $_POST['is_leaf_fresh'];
if($fresh_status == '0')
{
$fresh_status = 'no';
}
else
{
if($fresh_status == '1')
{
$fresh_status = 'yes';
}
else
$fresh_status='Dont know';
}
echo "<td>" . $fresh_status . "</td>";


$freshleaf_count = $_POST['freshleaf_count'];
if($freshleaf_count == '')
{
$freshleaf_count = '';
}
elseif($freshleaf_count == 'Few')
{
$freshleaf_count = 'Few';
}
elseif($freshleaf_count == 'Many')
{
$freshleaf_count = 'Many';
}
else
{
$freshleaf_count='Full';
}
echo "<td>" . $freshleaf_count . "</td>";


$mature_status = $_POST['is_leaf_mature'];
if($mature_status == '0')
{
$mature_status = 'no';
}
else
{
if($mature_status == '1')
{
$mature_status = 'yes';
}
else
$mature_status='Dont know';
}
echo "<td>" . $mature_status . "</td>";



$matureleaf_status = $_POST['matureleaf_count'];
if($matureleaf_status == '')
{
$matureleaf_status = '';
}
elseif($matureleaf_status == 'Few')
{
$matureleaf_status = 'Few';
}
elseif($matureleaf_status == 'Many')
{
$matureleaf_status = 'Many';
}
else
{
$matureleaf_status='Full';
}
echo "<td>" . $matureleaf_status . "</td>";


$bud_status = $_POST['is_flower_bud'];
if($bud_status == '0')
{
$bud_status = 'no';
}
else
{
if($bud_status == '1')
{
$bud_status = 'yes';
}
else
$bud_status='Dont know';
}
echo "<td>" . $bud_status . "</td>";


$budcount_status = $_POST['bud_count'];
if($budcount_status == '')
{
$budcount_status = '';
}
elseif($budcount_status == 'Few')
{
$budcount_status = 'Few';
}
elseif($budcount_status == 'Many')
{
$budcount_status = 'Many';
}
else
{
$budcount_status='Full';
}
echo "<td>" . $budcount_status . "</td>";


$openflower_status = $_POST['is_flower_open'];
if($openflower_status == '0')
{
$openflower_status = 'no';
}
else
{
if($openflower_status == '1')
{
$openflower_status = 'yes';
}
else
$openflower_status='Dont know';
}
echo "<td>" . $openflower_status . "</td>";



$openflower_count = $_POST['open_flower_count'];
if($openflower_count == '')
{
$openflower_count = '';
}
elseif($openflower_count == 'Few')
{
$openflower_count = 'Few';
}
elseif($openflower_count == 'Many')
{
$openflower_count = 'Many';
}
else
{
$openflower_count='Full';
}
echo "<td>" . $openflower_count . "</td>";


$unripe_status = $_POST['is_fruit_unripe'];
if($unripe_status == '0')
{
$unripe_status = 'no';
}
else
{
if($unripe_status == '1')
{
$unripe_status = 'yes';
}
else
$unripe_status='Dont know';
}
echo "<td>" . $unripe_status . "</td>";



$unripe_count = $_POST['fruit_unripe_count'];
if($unripe_count == '')
{
$unripe_count = '';
}
elseif($unripe_count == 'Few')
{
$unripe_count = 'Few';
}
elseif($unripe_count == 'Many')
{
$unripe_count = 'Many';
}
else
{
$unripe_count='Full';
}
echo "<td>" . $unripe_count . "</td>";


$unripe_status = $_POST['is_fruit_ripe'];
if($unripe_status == '0')
{
$unripe_status = 'no';
}
else
{
if($unripe_status == '1')
{
$unripe_status = 'yes';
}
else
$unripe_status='Dont know';
}
echo "<td>" . $unripe_status . "</td>";



$ripe_count = $_POST['fruit_ripe_count'];
if($ripe_count == '')
{
$ripe_count = '';
}
elseif($ripe_count == 'Few')
{
$ripe_count = 'Few';
}
elseif($ripe_count == 'Many')
{
$ripe_count = 'Many';
}
else
{
$ripe_count='Full';
}
echo "<td>" . $ripe_count . "</td>";


echo "<td>" . $_POST['animal_desc'] . "</td>";
//echo "<td>" . $_POST['birds_desc'] . "</td>";
//echo "<td>" . $_POST['insect_desc'] . "</td>";
//echo "<td>" . $_POST['temperature_max'] . "</td>";
//echo "<td>" . $_POST['temperature_min'] . "</td>";
//echo "<td>" . $_POST['rainfall_mm'] . "</td>";
//echo "<td>" . $_POST['humidity_mm'] . "</td>";
echo "</tr>";

echo "</table>";*/
 
mysql_close($link);

?>
<script type="text/javascript">
window.top.tb_remove();
</script>
</html>