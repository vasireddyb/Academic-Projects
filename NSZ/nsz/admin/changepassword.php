<?php  
session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
require('../includes/functions.php');
if($_SESSION['is_loggedin'] == 'true'){	
?>
<?php include('admin-header.php'); ?>
<?php include('admin-sidebar.php'); ?>
<div id="content"><!--content-->
<div id="rightcontent">
<style>
.field { width: 323px; }
.label { width: 104px; }
</style>
<form id="reg" action="update-profile.php" method="POST">

<?php
	$username = $_SESSION['username'];
	$result1 = mysql_query("SELECT usertype from users WHERE username = '$username';");
	$row1 = mysql_fetch_array($result1);
	$usertype = $row1['usertype'];
	$result = mysql_query("SELECT * from users WHERE username = '$username';");
	$row = mysql_fetch_array($result);	
?>


<fieldset>
<legend>Change Password</legend>
<div class="field" style="text-align:right; width:640px;"><a style="font-weight:bold" href="changepassword.php">Change Password</a></div>
	<div class="field"><div class="label"><label>Name:</label></div><input id="name" class="required form" type="text" name="name" value="<?php echo $row['name']; ?>"/></div>
	<div class="field"><div class="label"><label>username:</label></div><input id="username" class="form" type="text" disabled="disabled" name="username" value="<?php echo $row['username']; ?>"/><input id="username" class="form" type="hidden" name="username" value="<?php echo $row['username']; ?>"/></div>
	<div class="field"><div class="label"><label>Email ID:</label></div><input id="email" class="form required email" type="text" name="email" value="<?php echo $row['email']; ?>" /></div>
	<?php if(is_expert()){ ?>
	<div class="field"><div class="label"><label>Expertise in:</label></div><input id="email" class="form required" type="text" name="email" value="<?php echo $row['expertisein']; ?>" /></div>
	<div class="field"><div class="label"><label>Expertise details:</label></div><input id="email" class="form required" type="text" name="email" value="<?php echo $row['expertisedetails']; ?>" /></div>
    <div class="field"><div class="label"><label>University:</label></div><input id="email" class="form required" type="text" name="email" value="<?php echo $row['university']; ?>" /></div>
	<?php } ?>
	<div class="field"><div class="label"><label>Home Phone:</label></div><input id="homephone" class="required form" type="text" name="homephone" value="<?php echo $row['homephone']; ?>"/></div>
	<div class="field"><div class="label"><label>Work Phone:</label></div><input class="required form" type="text" name="workphone" value="<?php echo $row['workphone']; ?>" /></div>
	<div class="field"><div class="label"><label>Mobile Number:</label></div><input class="required form" type="text" name="mobile" value="<?php echo $row['mobile']; ?>" /></div>
	<div class="field"><div class="label"><label>Fax Number:</label></div><input class="form" type="text" name="fax" value="<?php echo $row['fax']; ?>"/></div>
	<div class="field"><div class="label"><label>IM Id:</label></div><input class="form" type="text" name="im" value="<?php echo $row['im']; ?>"/></div>
	<div class="field"><div class="label"><label>Address1:</label></div><input class="required form" type="text" name="addr1" value="<?php echo $row['address1']; ?>" /></div>
	<div class="field"><div class="label"><label>Address2:</label></div><input class="form" type="text" name="addr2" value="<?php echo $row['address2']; ?>" /></div>
	<div class="field"><div class="label"><label>City</label></div><input class="required form" type="text" name="city" value="<?php echo $row['city']; ?>" /></div>
	<div class="field"><div class="label"><label>State:</label></div><input class="required form" type="text" name="state" value="<?php echo $row['state']; ?>"/></div>
	<div class="field"><div class="label"><label>Country:</label></div><select style="width:210px;" name="country" class="required form">
<?php include('../countries.inc'); ?>
</select></div>
	<div class="field"><div class="label"><label>TimeZone</label></div>
<select style="width:210px;" name="tz">
	<option value="Pacific/Honolulu">(GMT-10:00) Hawaii</option>
	<option value="America/Anchorage">(GMT-09:00) Alaska</option>
	<option value="America/Los_Angeles">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
	<option value="America/Phoenix">(GMT-07:00) Arizona</option>
	<option value="America/Denver">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
	<option value="America/Chicago">(GMT-06:00) Central Time (US &amp; Canada)</option>
	<option value="America/New_York">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
	<option value="America/Indiana/Indianapolis">(GMT-05:00) Indiana (East)</option>
	<option disabled="disabled">&#8212;&#8212;&#8212;&#8212;&#8212;&#8212;&#8211;</option>
<?php
foreach($zonelist as $key => $value) {
	echo '		<option value="' . $key . '">' . $value . '</option>' . "\n";
}
?>
	</select>
</div>
	<div class="field"><div class="label"><label>Pin Code:</label></div><input class="required form" type="text" name="pincode" value="<?php echo $row['pincode']; ?>"/></div>
	<div class="field"><div class="label"><label>Date of Birth:</label></div><input class="required form" id="datepicker1" type="text" name="dob" value="<?php echo $row['dob']; ?>"/></div>                                                                                                                                      
	<div class="field" style="text-align:right; width:650px;"><input type="submit" class="button" value="Update Profile"></div>
</fieldset>

</form>
</div>
</div><!--content-->
<?php include('../footer.php'); ?>
<?php } ?>


<!-- NOT LOGGED IN -->
<?php if(!is_loggedin()) { include('notloggedin.php'); } ?>
<!-- NOT LOGGED IN -->	