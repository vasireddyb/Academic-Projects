<?php
session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
include('../includes/connection.php');
require('../includes/functions.php');
?>
<?php
if(isset($_GET['pagesize'])) { 
$pagesize = $_GET['pagesize']; 
} else { $pagesize = 10; }
?>
<?php if(is_admin()) { include('questions/admin.php'); } ?>

<?php if(is_member()) { include('questions/member.php'); } ?>

<?php if(is_expert()) { include('questions/expert.php'); } ?>


<!-- NOT LOGGED IN -->
<?php
if($_SESSION['is_loggedin'] != 'true'){
	?>
<?php include('../header.php'); ?>
<?php include('../sidebar.php'); ?>
<div id="content"><!--content-->
<div id="rightcontent">
 <h3> You are not logged in. Please login to view control panel.</h3>
</div>
<div id="rightsidebar" style="float:left; background:red; height:100px; width:150px;">
</div>
</div><!--content-->
<?php include('../footer.php'); ?>
<?php } ?>
<!-- NOT LOGGED IN -->
	