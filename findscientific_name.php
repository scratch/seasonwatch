<?php

$species_scientific_nameId=($_GET['primary_name']);
//echo $species_scientific_nameId;
//To avoid on submit showing error when addtree.php is directly accessed 
//if ($_GET['primary_name'] == undefined ){
//$species_scientific_nameId = '26' ;
//}
echo '<a href="tracktrees.php?species_id=$species_scientific_nameId"></a>'; 

//echo "ID: ".$species_scientific_nameId;
include './includes/dbc.php';

//fetching species_primary_common_name from Species_master 
$query="SELECT species_scientific_name FROM Species_master WHERE species_id=$species_scientific_nameId";
$result=mysql_query($query);
//echo '$result';
?>
<?php 
while($row=mysql_fetch_array($result)) 
{
?>
<input type="text" readonly="readonly" value='<?=$row['species_scientific_name']?>' style="width:200px;"/>
<?php     
} 
?>
<?php mysql_close($link);?>

