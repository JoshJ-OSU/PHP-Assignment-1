<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Assignment-4 Part-1 multtable.php</title>
	<link href="multtablestyle.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$errorFlag = false;

if (isset($_GET['min-multiplicand'])) {
	//get the value
	$min_multiplicand = $_GET['min-multiplicand'];
	
	//check that value type is an integer
	if (is_numeric($min_multiplicand) == false) {
		$errorFlag = true;
		echo "min-multiplicand must be an integer! <br>";
	} else {
		settype($min_multiplicand, "int");
	}
} else {
	$errorFlag = true;
	echo "Missing parameter min-multiplicand <br>";
}

if (isset($_GET['max-multiplicand'])) {
	//get the value
	$max_multiplicand = $_GET['max-multiplicand'];
		
	//check that value type is an integer
	if (is_numeric( $max_multiplicand) == false) {
		$errorFlag = true;
		echo "max-multiplicand must be an integer! <br>";
	} else {
		settype($max_multiplicand, "int");
	}
} else {
	$errorFlag = true;
	echo "Missing parameter max-multiplicand <br>";
}

if (isset($_GET['min-multiplier'])) {
	//get the value
	$min_multiplier = $_GET['min-multiplier'];
		
	//check that value type is an integer
	if (is_numeric( $min_multiplier) == false) {
		$errorFlag = true;
		echo "min-multiplier must be an integer! <br>";
	} else {
		settype($min_multiplier, "int");
	}
} else {
	$errorFlag = true;
	echo "Missing parameter min-multiplier <br>";
}

if (isset($_GET['max-multiplier'])) {
	//get the value
	$max_multiplier = $_GET['max-multiplier'];
	
	//check that value type is an integer
	if (is_numeric( $min_multiplier) == false) {
		$errorFlag = true;
		echo "min-multiplier must be an integer! <br>";
	} else {
		settype($max_multiplier, "int");
	}
} else {
	$errorFlag = true;
	echo "Missing parameter max-multiplier <br>";
}


// If valid parameters, check that the values are correct  
if ($errorFlag == false) {
	if ($min_multiplicand > $max_multiplicand) {
		echo "min-multiplicand must be less than/equal to max-multiplicand <br>";
		$errorFlag = true;
	}
	
	if ($min_multiplier > $max_multiplier) {
		echo "min-multiplier must be less than/equal to max-multiplier <br>";
		$errorFlag = true;
	}
}

//Print the table
if ($errorFlag == false) {
	echo "<table>";
	
	//header row
	echo "<thead>";
	echo "<tr>";
	echo "<th></th>";		//empty cell
	
	//fill header row with multipliers
	for($col = $min_multiplier; $col <= $max_multiplier; $col++) {
		echo "<th>" . $col . "</th>";
	}
	echo "</thead>";

	echo "<tbody>";
	for($row = $min_multiplicand; $row <= $max_multiplicand; $row++) {
		echo "<tr>";
		echo "<th>" . $row . "</th>";
		for($col = $min_multiplier; $col <= $max_multiplier; $col++) {
			echo "<td>" . ($col * $row) . "</td>";
		}
	}
	
	echo "</table>";
	
}

?>
</body>
</html>