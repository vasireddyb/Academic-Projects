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
	$status = $_POST['status'];
	//echo $qno;
	//echo $status;

	if($status == 'Open') {
	
	$query = "UPDATE questions set status='$status', expert='' where question_id='$qno'";

	} else {

		$query = "UPDATE questions set status='$status' where question_id='$qno'";


	}
	
	mysql_query($query);
	header( 'Location: index.php' ) ;
}
?>

<?php
if(is_member() || is_admin()) {	
	$qno = $_GET['qno'];
	$status = 'Dropped';	
	$query = "UPDATE questions set status='$status' where question_id='$qno'";
	mysql_query($query);
	header( 'Location:'. $url) ;

	//$json = new Services_JSON();

	//convert php object to json 
	//$value = array('status' => 'success');
	//$output = $json->encode($value);

	//print($output);
}
?>


<?php ob_flush();?>