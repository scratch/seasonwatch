<?php
	//$ip = $_SERVER['REMOTE_ADDR'];
	
//echo $ip;
	// List points from database
	if ($_GET['action'] == 'listpoints') {
		$query = "SELECT * FROM location_master ORDER BY location_name LIMIT 6 ";
		$result = map_query($query);
		$points = array();
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			array_push($points, array('name' => $row['location_name'], 'lat' => $row['latitude'], 'lng' => $row['longitude']));
		}
		echo json_encode(array("Locations" => $points));
		exit;
	}
	
		function map_query($query) {
		// Connect
		mysql_connect('localhost', 'root', 'dbpass01')
		    OR die(fail('Could not connect to database.'));
		
		mysql_select_db('ncbs_test');
		return mysql_query($query);
	}
	
	function fail($message) {
		die(json_encode(array('status' => 'fail', 'message' => $message)));
	}
	
	function success($data) {
		die(json_encode(array('status' => 'success', 'data' => $data)));
	}
	
/* // Save a point from our form
	if ($_POST['action'] == 'savepoint') {
		$name = $_POST['name'];
		if(preg_match('/[^\w\s]/i', $name)) {
			fail('Invalid name provided.');
		}
		if(empty($name)) {
			fail('Please enter a name.');
		}
	
		
		// Query
		$query = "INSERT INTO location_master SET location_name='$_POST[name]', latitude='$_POST[lat]', longitude='$_POST[lng]'";
		$result = map_query($query);
		
		if ($result) {
			success(array('lat' => $_POST['lat'], 'lng' => $_POST['lng'], 'name' => $name));
		} else {
			fail('Failed to add point.');
		}
		exit;
	} */	
	
?>