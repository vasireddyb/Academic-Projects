<?php
ob_start();
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require('includes/functions.php');
require_once "json/JSON.php";




if (isset($_POST['username'])) {
	$username = $_POST['username'];
}
if (isset($_POST['password'])) {
	$password = eliteEncrypt($_POST['password']);
}

if(isset($_POST['username']) || isset($_POST['password'])) {

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
		$value = array('status' => 'loggedIn');
		$output = "loggedIn";

		print($output);




}
else {

	$json = new Services_JSON();

		//convert php object to json 
		$value = array('status' => 'notLoggedIn');
		$output = $value;

		print($output);



	}
}




?>