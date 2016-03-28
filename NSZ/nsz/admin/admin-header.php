<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head profile="http://gmpg.org/xfn/11">
<title>NETSCHOOLZONE - Tutoring your way...</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<?php 
require('../includes/connection.php');
error_reporting(E_ALL ^ E_NOTICE);
$globalurl = "http://localhost/nsz/";

?>

<!-- Stylesheets -->
<link href="../css/style.css" media="screen" type="text/css" rel="stylesheet" />
<link href="../css/print.css" media="print" type="text/css" rel="stylesheet" />
<link href="../css/jquery-ui.css" media="screen" type="text/css" rel="stylesheet" />
<!--[if IE 6]>
<link href="../css/ie6.css" media="screen" type="text/css" rel="stylesheet" />
<![endif]-->	

<link href="../css/tabs.css" media="screen" type="text/css" rel="stylesheet" />
<link href="../js/facebox/facebox.css" media="screen" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" src="../js/validations-admin.js"></script>
<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui-timepicker.js"></script>
<script type="text/javascript" src="../js/loginvalidation.js"></script>
<script type="text/javascript" src="../js/ajaxreq.js"></script>

<script src="http://connect.facebook.net/en_US/all.js"></script>
<script type="text/javascript" src="../js/faceBook-admin.js"></script>



  <?php //$date = getCurrentUserTime(); ?>

<script type="text/javascript">

</script>


<script language="javascript"> 
function toggleChangePassword() {
	var ele = document.getElementById("toggleChangePasswordText");
	var text = document.getElementById("displayChangePasswordText");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "Change Price";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "Cancel";
	}
} 
</script>

<script>
	$(function() {		
		$( "#datepicker1" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: '1940:2012',			
			dateFormat: 'yy-mm-dd'
			
		});
		$( "#datepicker1" ).datepicker("option", "maxDate", 'getDate()');
		//$( "#datepicker" ).datepicker("setDate", new Date(1980,1,01) );
		//$( "#datepicker" ).dpSetStartDate('01/01/2000');


	});
	</script>


<script>
	$(function() {		
		$( "#datepicker" ).datetimepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: '2011:2013',
			stepMinute: 15,
			dateFormat: 'yy-mm-dd'
		});
		//alert(getDate());
		//$( "#datepicker" ).datepicker("setDate", "<?php echo $date; ?>" );
		$( "#datepicker" ).datepicker("option", "minDate", '<?php echo $date; ?>');
		//$( "#datepicker" ).datepicker("setDate",new Date( '<?php echo $date; ?>'));
		//$( "#datepicker" ).datepicker( "option", "defaultDate", new Date( '<?php echo $date; ?>'));

	});
	</script>

<script language="javascript"> 
function toggle() {
	var ele = document.getElementById("toggleText");
	var text = document.getElementById("displayText");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "Change Price";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "Cancel";
	}
} 
</script>


<script language="javascript"> 
function toggleComment() {	
	var ele = document.getElementById("toggleCommentText");
	var text = document.getElementById("displayCommentText");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "Change Price";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "Cancel";
	}
} 
</script>


<script language="javascript"> 
function toggleAnswer() {
	var ele = document.getElementById("toggleAnswerText");
	var text = document.getElementById("displayAnswerText");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "Change Price";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "Cancel";
	}
} 
</script>


<script language="javascript"> 
function toggleAdminComment() {
	var ele = document.getElementById("toggleAdminCommentText");
	var text = document.getElementById("displayAdminCommentText");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		//text.innerHTML = "Change Price";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "Cancel";
	}
} 
</script>



<script type="text/javascript">
function ajaxRequest(){
 var activexmodes=["Msxml2.XMLHTTP", "Microsoft.XMLHTTP"] //activeX versions to check for in IE
 if (window.ActiveXObject){ //Test for support for ActiveXObject in IE first (as XMLHttpRequest in IE7 is broken)
  for (var i=0; i<activexmodes.length; i++){
   try{
    return new ActiveXObject(activexmodes[i])
   }
   catch(e){
    //suppress error
   }
  }
 }
 else if (window.XMLHttpRequest) // if Mozilla, Safari etc
  return new XMLHttpRequest()
 else
  return false
}
</script>


</head>
<body>
	<div id="fb-root"></div>

	<div id="wrap">
	<div id="header">
    <a href="<?php echo $globalurl;?>"><div id="logo"></div></a>
	<?php if(is_loggedin()) { ?>
	<div id="loginutils">
	<div class="loggedin">
	Welcome <span style="color:#F4A460; font-weight:bold"><?php echo $_SESSION['username']; ?> </span> | <a style="color:#183154; font-weight:bold" onclick="logout(); return false;">Logout</a> | <a style="color:#183154; font-weight:bold" href="<?php echo $globalurl;?>admin/profile.php">My Profile</a>
	</div>
	</div>
	<?php } ?>
	<?php include('../facebook.php'); ?>
	<div id="navs"><!-- NAVS -->
	<ul id="nav">
	
	<!-- IF IS_ADMIN -->
	<?php if(is_admin()) { ?>
	<li><a class="navli" href="<?php echo $globalurl;?>admin/index.php">Questions</a></li>
	<li><a class="navli" href="<?php echo $globalurl;?>admin/categories.php"/>Categories</a></li>
	<li><a class="navli" href="<?php echo $globalurl;?>admin/members.php"/>Members</a></li>
	<li><a class="navli" href="<?php echo $globalurl;?>admin/experts.php"/>Experts</a></li>
	<li><a class="navli" href="<?php echo $globalurl;?>admin/create-user.php"/>Create User</a></li>
	<?php } ?>

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
		<!--<li class="loginout"><a href="<?php echo $globalurl;?>admin/">Go to Control Panel</a></li>-->
	<?php } ?>

<!-- IF IS_ADMIN -->



<!-- IF IS_EXPERT -->
	<?php if(is_expert()) { ?>
	<li><a class="navli" href="<?php echo $globalurl;?>admin/index.php">Questions</a></li>	
	<?php } ?>

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
		<!--<li class="loginout"><a href="<?php echo $globalurl;?>admin/">Go to Control Panel</a></li>-->
	<?php } ?>

<!-- IF IS_MEMBER -->

<!-- IF IS_MEMBER -->
	<?php if(is_member()) { ?>
	<li><a class="navli" href="<?php echo $globalurl;?>admin/index.php">Questions</a></li>
	<li><a class="navli" href="<?php echo $globalurl;?>admin/post-a-question.php"/>Post a Question</a></li>
	<li><a class="navli" href="<?php echo $globalurl;?>admin/refer-a-friend.php"/>Refer a Friend</a></li>
	<?php } ?>

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
		<!--<li class="loginout"><a href="<?php echo $globalurl;?>admin/">Go to Control Panel</a></li>-->
	<?php } ?>

<!-- IF IS_EXPERT -->




	</ul>	
	</div><!-- NAVS -->

	</div>
    <div id="maincontent">