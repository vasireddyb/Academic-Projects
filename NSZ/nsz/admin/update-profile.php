<?php
ob_start();
session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
require('../includes/functions.php');
if($_SESSION['is_loggedin'] == 'true'){	
?>

<?php

$username = $_POST['username'];
$name = $_POST['name'];
$mailid = $_POST['email'];
$password = $_POST['password'];
//$password = md5($password);
$confirmpass = eliteEncrypt($_POST['password_confirm']);
$homephone = $_POST['homephone'];
$workphone = $_POST['workphone'];
$mobile = $_POST['mobile'];
$fax = $_POST['fax'];
$im = $_POST['im'];
$address1 = mysql_prep($_POST['addr1']);
$address2 = mysql_prep($_POST['addr2']);
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$tz = $_POST['tz'];
$pincode = $_POST['pincode'];
$dob = $_POST['dob'];
$expertisein = $_POST['expertisein'];
$expertisedetails = $_POST['expertisedetails'];
$university = $_POST['university'];
$usertype = $_POST['usertype'];


$query = "UPDATE users SET name='$name', email='$mailid', homephone='$homephone', workphone='$workphone', mobile='$mobile', fax='$fax', im='$im', address1='$address1', address2='$address2', city='$city', state='$state', country='$country', timezone='$tz', pincode='$pincode', dob='$dob' WHERE username='$username'";
mysql_query($query);


header('Location: profile.php');
ob_flush();
?>

<?php } ?>

<!-- NOT LOGGED IN -->
<?php if(!is_loggedin()) { include('notloggedin.php'); } ?>
<!-- NOT LOGGED IN -->
	
	