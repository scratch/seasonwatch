<?php
include './includes/dbc.php';
$q = strtolower($_GET["q"]);
if (!$q) return;


$sql = "SELECT species_id, species_primary_common_name, species_scientific_name FROM Species_master WHERE species_search_names LIKE '%$q%'";
$rsd = mysql_query($sql);

while($rs = mysql_fetch_array($rsd)) {
   $speciesid = $rs['species_id'];
	$species_primary_common_name = $rs['species_primary_common_name'];
	$species_scientific_name = $rs['species_scientific_name'];
echo "$species_primary_common_name"." ($species_scientific_name)"."|$speciesid\n";
}
?>
