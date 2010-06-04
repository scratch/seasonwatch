<?php

include '../includes/dbc.php';
page_protect();
?>

<html>
<head>
<title>Add Species Page</title>
</head>
<body>
<link rel="stylesheet" href="../css/styles_new.css" type="text/css">
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

<?php 
$primary_name=$_POST['species_primary_common_name'];
$scientific_name=$_POST['species_scientific_name'];
$species_search_names = $primary_name . ", " . $scientific_name;
//echo $search_name; 

if($_POST['Submit'] == 'Submit')  
{                     foreach($_POST as $key => $value)
{ 
$data[$key] = filter($value);
}  
$sql = "INSERT INTO Species_master
  			 (species_primary_common_name,
  			 species_scientific_name,
  			 species_search_names, 
  			 family,
  			 vegetation_type,
  			 status_in_india,  
  			 habitat_type,
  			 distribution_in_india,
  			 leaf_shape_category,
  			 size_description,
          flower_description,
          bark_description,
          fruit_description,
          leaf_type, 
          flowering_time,
          fruiting_time,
          time_of_leaf_flush, 
          similar_species,
          known_pollinators,
          known_seed_dispersers,
          uses_by_humans,
          list_of_references, 
          spine_thorn_description,
          special_notes_on_the_species,
		    special_notes_on_phenology) 
		      VALUES
		    ('$_POST[species_primary_common_name]',
		    '$_POST[species_scientific_name]', 
		    '$species_search_names', 
		    '$_POST[family]',
		    '$_POST[vegetation_type]',
		    '$_POST[status_in_india]', 
		    '$_POST[habitat_type]',
		    '$_POST[distribution_in_india]',
			 '$_POST[leaf_shape_category]',
			 '$_POST[size_description]', 
			 '$_POST[flower_description]',
			 '$_POST[bark_description]',
			 '$_POST[fruit_description]', 
			 '$_POST[leaf_type]',
			 '$_POST[flowering_time]',
			 '$_POST[fruiting_time]',
			 '$_POST[time_of_leaf_flush]',
			 '$_POST[similar_species]',
			 '$_POST[known_pollinators]',
		 	 '$_POST[known_seed_dispersers]',
		 	 '$_POST[uses_by_humans]',
			 '$_POST[list_of_references]',
			 '$_POST[spine_thorn_description]', 
			 '$_POST[special_notes_on_the_species]',
			 '$_POST[special_notes_on_phenology]')";

//echo "sql1"; 			

        mysql_query($sql,$link) or die("Insertion Failed:" .mysql_error());

}
?>
 
<html lang="en">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<title>your Submit Species Details </title>
</head>

<body>
<link rel="stylesheet" href="../blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="../blueprint/print.css" type="text/css" media="print">
<link rel="stylesheet" href="../blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<link rel="stylesheet" href="../css/styles_new.css" type="text/css">

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
<!--echo "You have Submitted successfully"; -->
<?php 
echo "<table border='1'>
<tr>
<td align=right><b>You have added:</b></td>
</tr>";
echo "<table border='1'>
<tr>
<th>Primary Common Name</th>
<th>Scientific Name</th>
<th>Family</th>
<th>Vegetation Type</th>
<th>Status in India</th>
<th>Habitat Type</th>
<th>Distribution in India</th>
<th>Leaf shape Category</th>
<th>Size Description</th>
<th>Flower Description</th>
<th>Fruit Description</th>
<th>Bark Description</th>
<th>Leaf Type</th>
<th>Flowering Time</th>
<th>Fruiting Time</th>
<th>Time of leaf Flush</th>
<th>Similar Species</th>
<th>Known Pollinators</th>
<th>Known Seed Dispersers</th>
<th>Uses by humans</th>
<th>List of references</th>
<th>Spine Thorn Description</th>
<th>Special Notes on the Species</th>
<th>Special notes on phenology</th>
</tr>";



$species_primary_common_name=$_POST['species_primary_common_name'];
echo "<td>" . $species_primary_common_name . "</td>";


$species_scientific_name=$_POST['species_scientific_name'];
echo "<td>" . $species_scientific_name . "</td>";

$family=$_POST['family'];
echo "<td>" . $family . "</td>";

$vegetation_type=$_POST['vegetation_type'];
echo "<td>" . $vegetation_type . "</td>";

$status_in_india=$_POST['status_in_india'];
echo "<td>" . $status_in_india . "</td>";

$habitat_type=$_POST['habitat_type'];
echo "<td>" . $habitat_type . "</td>";

$distribution_in_india=$_POST['distribution_in_india'];
echo "<td>" . $distribution_in_india . "</td>";

$leaf_shape_category=$_POST['leaf_shape_category'];
echo "<td>" . $leaf_shape_category . "</td>";

$size_description=$_POST['size_description'];
echo "<td>" . $size_description . "</td>";

$flower_description=$_POST['flower_description'];
echo "<td>" . $flower_description . "</td>";

$fruit_description=$_POST['fruit_description'];
echo "<td>" . $fruit_description . "</td>";

$bark_description=$_POST['bark_description'];
echo "<td>" . $bark_description . "</td>";

$leaf_type=$_POST['leaf_type'];
echo "<td>" . $leaf_type . "</td>";

$flowering_time=$_POST['flowering_time'];
echo "<td>" . $flowering_time . "</td>";

$fruiting_time=$_POST['fruiting_time'];
echo "<td>" . $fruiting_time . "</td>";

$time_of_leaf_flush=$_POST['time_of_leaf_flush'];
echo "<td>" . $time_of_leaf_flush . "</td>";


$similar_species=$_POST['similar_species'];
echo "<td>" . $similar_species . "</td>";


$known_pollinators=$_POST['known_pollinators'];
echo "<td>" . $known_pollinators . "</td>";

$known_seed_dispersers=$_POST['known_seed_dispersers'];
echo "<td>" . $known_seed_dispersers . "</td>";


$uses_by_humans=$_POST['uses_by_humans'];
echo "<td>" . $uses_by_humans . "</td>";

$list_of_references=$_POST['list_of_references'];
echo "<td>" . $list_of_references . "</td>";


$spine_thorn_description=$_POST['spine_thorn_description'];
echo "<td>" . $spine_thorn_description . "</td>";


$special_Notes_on_the_species=$_POST['special_notes_on_the_species'];
echo "<td>" . $special_Notes_on_the_species . "</td>";

$special_notes_on_phenology=$_POST['special_notes_on_phenology'];
echo "<td>" . $special_notes_on_phenology . "</td>";

echo "</table>";

?>


<html> 
<p align="center"> 
<input type=reset  value="Back"  class=buttonstyle onclick="javascript:window.location.href='addspecies.php';">
</p>
</div>
</div>
<?php mysql_close($link);?>
</body>
</html>
