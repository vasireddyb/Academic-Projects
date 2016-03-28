<?php ob_start(); ?>
<?php
session_start();
require('includes/connection.php');
//require('includes/functions.php');
error_reporting(E_ALL ^ E_NOTICE);
$globalurl = "http://localhost/nsz/";
$globalurl1 = "http://localhost/nsz";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">

<head profile="http://gmpg.org/xfn/11">
<title>NETSCHOOLZONE - Tutoring your way...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" >
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

<!-- Favicon 
<link type="image/x-icon" href="http://localhost/infosage/favicon.ico" rel="icon">
<link type="image/x-icon" href="http://localhost/infosage/favicon.ico" rel="shortcut icon">
-->

<!-- Stylesheets -->
<link href="<?php echo $globalurl;?>css/style.css" media="screen" type="text/css" rel="stylesheet" />
<link href="<?php echo $globalurl;?>css/jquery-ui.css" media="screen" type="text/css" rel="stylesheet" />
<link href="css/print.css" media="print" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $globalurl;?>js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/validations.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script type="text/javascript" src="js/FaceBook.js"></script>
<script type="text/javascript" src="js/loginvalidation.js"></script>
<script type="text/javascript" src="js/qtip.js"></script>



<script>
	$(function() {		
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: '1940:2012',			
			dateFormat: 'yy-mm-dd'
			
		});
		$( "#datepicker" ).datepicker("option", "maxDate", 'getDate()');
		//$( "#datepicker" ).datepicker("setDate", new Date(1980,1,01) );
		//$( "#datepicker" ).dpSetStartDate('01/01/2000');


	});
	</script>

</head>
<body>
<div id="fb-root"></div>

	<div id="wrap"><!--WRAP-->
	<div id="header"><!-- HEADER -->
	
    <a href="<?php echo $globalurl;?>"><div id="logo"></div></a>
    

	<div id="loginutils">
	<?php
     if($_SESSION['is_loggedin'] != 'true'){
	?>
	<div id="loginform">
	<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<div style="color:#183154; height:10px;  padding-top: 10px;" class="error"></div>
	<input type="text" style="background:#ccc" name="username" id="username" value="Username" onfocus="if(this.value == 'Username') {this.value = '';}" onblur="if(this.value == '') {this.value = 'Username';}">
	<input id="password" style="background:#ccc" type="password" name="password" value="Password" onfocus="if(this.value == 'Password') {this.value = '';}" onblur="if(this.value == '') {this.value = 'Password';}" />
	<input type="submit" value="Login" class="button" onclick="validateLogin(); return false;" />
	<br />
	<div id="fb" style="padding-top:10px;">
   <b><a href="member.php" style="margin-right:60px; margin-left:20px; color:#183154;">Signup Now !</a></b>
   <b><a href="expert.php" style="margin-right:60px; margin-left:20px; color:#183154;">Expert Signup!! !</a></b>
	</div>
	</form>
	</div>
	<?php } else { ?>
	<div style="display:none" id="loggedin">
	Welcome <span style="color:#F4A460; font-weight:bold"><?php echo $_SESSION['username']; ?> </span> | <a style="color:#183154; font-weight:bold" onclick="facebookLogout(); return false;">Logout</a> | <a style="color:#183154; font-weight:bold" href="<?php echo $globalurl;?>admin/profile.php">My Profile</a>
	</div>
	<?php } ?>
	</div>
	<?php include('facebook.php'); ?>
	<div id="navs"><!-- NAVS -->
	<ul id="nav">
	<li><a class="navli" href="<?php echo $globalurl;?>index.php"/>Home</a></li>
	<li><a class="navli" href="<?php echo $globalurl;?>testimonials.php""/>Testimonials</a></li>
	<li><a class="navli" href="<?php echo $globalurl;?>faqs.php""/>FAQ's</a></li>
	<li><a class="navli" href="<?php echo $globalurl;?>aboutus.php"/>About us</a></li>
	<li><a class="navli" href="<?php echo $globalurl;?>contactus.php"/>Contact us</a></li>
	<li><a class="navli" href="<?php echo $globalurl;?>termsnconditions.php"/>Terms and Conditions</a></li>
	<?php
     if($_SESSION['is_loggedin'] != 'true'){
	?>
		<!--<li class="loginout"><a href="<?php echo $globalurl;?>member.php">Register</a></li>-->
		<!--<li class="loginout"><a href="<?php echo $globalurl;?>login.php">Log In</a></li>-->
	<?php } ?>	



	<?php  
     if($_SESSION['is_loggedin'] == 'true'){
	?>
		<!--<li class="loginout"><a href="<?php echo $globalurl;?>logout.php">Logout</a></li>-->
		<li class="loginout"><a href="<?php echo $globalurl;?>admin/">Go to Control Panel</a></li>		
	<?php } ?>



	</ul>	
	</div><!-- NAVS -->
	</div><!-- HEADER -->
<div id="maincontent"><!-- MAINCONTENT -->
<?php ob_flush(); ?>	