<?php ob_start(); ?>
<?php  
session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
include('../includes/connection.php');
require('../includes/functions.php');
?>

<!-- DO THIS ONLY IF THE USER IS ADMIN -->
	<?php
	if( is_admin()) { 
	$deactivate = $_GET['deactivate'];
	$query = "UPDATE users set active='0' where username='$deactivate'";
	mysql_query($query);
	header( 'Location: experts.php' ) ;
	}	
	?>
<!-- DO THIS ONLY IF THE USER IS ADMIN -->


<!-- NOT LOGGED IN -->
	<?php if(!is_loggedin()) { include('notloggedin.php'); } ?>
<!-- NOT LOGGED IN -->

<?php ob_flush();?>