<?php 
include('header.php'); 
include('includes/functions.php');
/*if(isset($_POST['tz'])) {
	// store the selected value for future use in DateTimeZone
	$_SESSION['tz'] = $_POST['tz'];
}*/
?>
 
<div id="content"><!--content-->

<?php  

$name = $_POST['name'];
$username = $_POST['username'];
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
$humancode = $_POST['humancode'];
$randomcode = $_POST['randomcode'];

if ($name != "" && $username != "" && $mailid != "" && $password != "" && $confirmpass != "" && $homephone != "" && $mobile != "" && $address1 != "" && $city != "" && $state != "" && $country != "" && $tz != "" && $pincode != "" && $dob != "") {

if($randomcode == $humancode) { 

if ($usertype == 2) { $activate = 1; } else { $activate = 0; }

$query = "insert into users (timezone, active, expertisein, expertisedetails, university, usertype, name, username, email, password, homephone, workphone, mobile, fax, im, address1, address2, city, state, country, pincode, dob) values('$tz', '$activate','$expertisein','$expertisedetails','$university','$usertype' , '$name', '$username', '$mailid', '$confirmpass', '$homephone', '$workphone', '$mobile', '$fax', '$im', '$address1', '$address2', '$city', '$state', '$country', '$pincode', '$dob')";
mysql_query($query);
include('mails/registrationmail.php'); 
echo "<p> Hello " . $name . "..!! Thank You for the registration , You are part of NETSCHOOLZONE from now.</p>";
} else { echo "You have entered a wrong code, Please try again !"; }
} else { echo "Please enter all required fields..!!"; }
?>

</div><!--content-->
<?php include('footer.php'); ?>
	
	