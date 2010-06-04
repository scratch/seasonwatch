<?php 
include '../includes/dbc.php';
page_protect();
//print_r($HTTP_POST_VARS);

$speciesId=($_POST['species_id']);
//echo $speciesId; 

if($_POST['doUpdate'] == 'Update') 
{                      $sql1 = "UPDATE Species_master SET                                             
                `species_primary_common_name`= '$_POST[species_primary_common_name]',
       		    `species_scientific_name`= '$_POST[species_scientific_name]',
	             `family`='$_POST[family]',
	             `vegetation_type` = '$_POST[vegetation_type]',
					 `status_in_india` = '$_POST[status_in_india]', 
					 `habitat_type` =  '$_POST[habitat_type]',
					 `distribution_in_india` ='$_POST[distribution_in_india]',
					 `leaf_shape_category` ='$_POST[leaf_shape_category]',
					 `size_description`= '$_POST[size_description]',
				    `flower_description`= '$_POST[flower_description]',
					 `bark_description`= '$_POST[bark_description]',
				    `fruit_description`= '$_POST[fruit_description]',
			       `leaf_type`= '$_POST[leaf_type]',
					 `flowering_time`='$_POST[flowering_time]',
					 `fruiting_time`='$_POST[fruiting_time]',
					`time_of_leaf_flush`='$_POST[time_of_leaf_flush]',
					`similar_species`= '$_POST[similar_species]',
					`known_pollinators`='$_POST[known_pollinators]',
					`known_seed_dispersers`='$_POST[known_seed_dispersers]',
					`uses_by_humans`= '$_POST[uses_by_humans]',
					`list_of_references`='$_POST[list_of_references]',
					`spine_thorn_description`='$_POST[spine_thorn_description]',
				`special_notes_on_the_species`= '$_POST[special_notes_on_the_species]', 
				`special_notes_on_phenology`='$_POST[special_notes_on_phenology]'
				WHERE species_id='$speciesId'";
		
		
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
Successfully Edited. Close this box to continue.
</body>
</html> 
