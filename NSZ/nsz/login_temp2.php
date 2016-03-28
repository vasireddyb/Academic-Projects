<?php
ob_start();
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require('includes/functions.php');
require_once "json/JSON.php";




if (isset($_GET['username'])) {
	$username = $_GET['username'];
}
if (isset($_GET['password'])) {
	$password = eliteEncrypt($_GET['password']);
}

if(isset($_GET['username']) || isset($_GET['password'])) {

	$result = mysql_query("SELECT * from users WHERE username='$username';");
	$row = mysql_fetch_array($result);

	if($row['password'] == $password && $row['active']==1)
{

		session_start();
		$_SESSION['is_loggedin'] = 'true';
		$_SESSION['username'] = $username;
		$result1 = mysql_query("SELECT usertype from users WHERE username = '$username';");
		$row1 = mysql_fetch_array($result1);
		$_SESSION['usertype'] = $row1['usertype'];


		//convert php object to json 
		//$value = array('status' => 'loggedIn');
		$output = "success";

		echo $output;




}
else {

	//$json = new Services_JSON();

		//convert php object to json 
		//$value = array('status' => 'notLoggedIn');
		$output = "failed";

		echo $output;



	}
}




?>