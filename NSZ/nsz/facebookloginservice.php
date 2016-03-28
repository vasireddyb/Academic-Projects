<?php
require('includes/functions.php');
require('includes/connection.php');
require_once "json/JSON.php";

if (isset($_POST['username'])) {
	$username = $_POST['username'];	
	//$result = 0;
	$result = mysql_query("SELECT COUNT(*) from users WHERE username='$username';");
	$num_rows = mysql_num_rows($result);
	if($num_rows == 0) {

$query = "insert into users (timezone, active, expertisein, expertisedetails, university, usertype, name, username, email, password, homephone, workphone, mobile, fax, im, address1, address2, city, state, country, pincode, dob) values('Asia/Kolkata', '1','fb','fb','fb','2' , 'fb', '$username', '$username', 'abc', '56', '66', '66', '66', 'fb', 'fb', 'fb', 'fb', 'fb', 'fb', '66', '2011-25-02')";
mysql_query($query);

		session_start();
		$_SESSION['is_loggedin'] = 'true';
		$_SESSION['username'] = $username;
		$_SESSION['usertype'] = '2';
		$json = new Services_JSON();

	//convert php object to json 
	$value = array('status' => 'success');
	$output = $json->encode($value);

	print($output);


	} else {


		session_start();
		$_SESSION['is_loggedin'] = 'true';
		$_SESSION['username'] = $username;
		$_SESSION['usertype'] = '2';
		$json = new Services_JSON();

		$value = array('status' => 'success');
		$output = $json->encode($value);

		print($output);
	
		
	}  



}
else {

	$json = new Services_JSON();

	//convert php object to json 
	$value = array('status' => 'error');
	$output = $json->encode($value);

	print($output);

	}



 ?>