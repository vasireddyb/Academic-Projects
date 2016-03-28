<?php
include('includes/functions.php');
/*if(isset($_POST['tz'])) {
	// store the selected value for future use in DateTimeZone
	$_SESSION['tz'] = $_POST['tz'];
}*/
?>

<?php  

$name = $_POST['name'];
$username = $_POST['username'];
$mailid = $_POST['email'];
$password = $_POST['password'];
//$password = md5($password);
$confirmpass = eliteEncrypt($_POST['password_confirm']);
$mobile = $_POST['mobile'];
$tz = $_POST['tz'];
$usertype = $_POST['usertype'];

if ($name != "" && $username != "" && $mailid != "" && $password != "" && $confirmpass != "" && $mobile != "" && $tz != "") {

if ($usertype == 2) { $activate = 1; } else { $activate = 0; }

$query = "insert into users (timezone, active, usertype, name, username, email, password, mobile) values('$tz', '$activate', '$usertype' , '$name', '$username', '$mailid', '$confirmpass', '$mobile')";
mysql_query($query);
include('mails/registrationmail.php'); 
echo "<p> Hello " . $name . "..!! Thank You for the registration , You are part of NETSCHOOLZONE from now.</p>";

header("Location: index.php");


} else { 
	//echo "Please enter all required fields..!!"; 
	}
?>	