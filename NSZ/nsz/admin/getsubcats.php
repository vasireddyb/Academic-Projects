<?php
ob_start(); 
session_start();
$url = getenv('HTTP_REFERER');
error_reporting(E_ALL ^ E_NOTICE);
include('../includes/connection.php');
require('../includes/functions.php');
require_once "../json/JSON.php";
?>

<?php
if(is_loggedin()) {
	/* $parent_id = $_POST['catid'];
	$query = "SELECT cat_name from categories where parent_id='$parent_id'";
	$result = mysql_query($query);



	//header( 'Location:' . $url ) ;
	
	$json = new Services_JSON();

	//convert php object to json 
	

	$value = mysql_fetch_array($result);
	$output = $json->encode($value);

	}

	print($output); */
	$json = new Services_JSON();

	$catid = $_POST['catid'];

	$query = "SELECT cat_name from categories where parent_id='$catid' ORDER BY cat_name ASC";

	$result = mysql_query($query);

	$value = array();
	while($value1 = mysql_fetch_array($result)) {

		array_push($value, $value1['cat_name']);

	}
	
	$value = array('status' => 'success', 'value' => $value);


	$output = $json->encode($value);

	print_r($output);
}
?>

<?php ob_flush();?>