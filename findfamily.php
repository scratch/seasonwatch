<?php 
$species_primary_nameId=$_GET['primary_name'];
include './includes/dbc.php';

//To avoid on submit showing error when addtree.php is directly accessed 
if ($_GET['primary_name'] == undefined ){
$query=mysql_query("SELECT species_id FROM Species_master ORDER BY species_id ASC limit 1");
while($row = mysql_fetch_array($query))
{
$species_primary_nameId = $row['species_id'] ;
}}

$query="SELECT family FROM Species_master WHERE species_id=$species_primary_nameId";

$result=mysql_query($query);
?>


<?php
while($row=mysql_fetch_array($result))
{
?> 
<input type="text" readonly="readonly" value='<?=$row['family']?>' style="width:200px;"/>
<? 
}
?>
<?php mysql_close($link);?>