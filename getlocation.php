<?php
include './includes/dbc.php';
$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "SELECT tree_location_id, location_name FROM location_master WHERE location_name LIKE '%$q%'";


$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
     $treelocationid = $rs['tree_location_id'];
	$tree_location_names = $rs['location_name'];
echo "$tree_location_names|$tree_location_id\n";
}
?>
<?php mysql_close($link);?>