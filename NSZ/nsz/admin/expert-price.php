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
if(is_admin()) {
	$qno = $_POST['qno'];	
	$expertprice = $_POST['expertprice'];
	$query = "UPDATE questions set expertprice='$expertprice' where question_id='$qno'";
	mysql_query($query);
	//header( 'Location:' . $url ) ;
	
	$json = new Services_JSON();

	//convert php object to json 
	$value = array('status' => 'success', 'changedexpertprice' => $expertprice);
	$output = $json->encode($value);

	print($output);
}
?>

<?php ob_flush();?>