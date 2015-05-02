<?php
header("Content-Type: text/plain");

//request type
$requestMethod = $_SERVER["REQUEST_METHOD"];

//empty array
$parameters = array();
// foreach loop adapted from Variables and Arrays in PHP lecture by course
// designer.  Parses key and value for each parameter.  Stores it in array. 
if ($requestMethod == "GET") {
  foreach($_GET as $key => $value) {
    $parameters[$key] = $value; 
  }
}

if ( $requestMethod == "POST") {
  foreach($_POST as $key => $value) {
    $parameters[$key] = $value; 
  }
}

//if empty array, assign parameters to null
if (count($parameters) == 0) {
	$parameters = null;
}

//construct JSON with Type and parameters variables
$jsonArray = array();
$jsonArray["Type"] = $requestMethod;
$jsonArray["parameters"] = $parameters;

//encode JSON and display to screen
echo json_encode($jsonArray);
?>
