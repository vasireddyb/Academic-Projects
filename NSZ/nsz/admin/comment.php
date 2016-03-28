<?php
ob_start(); 
session_start();
$url = getenv('HTTP_REFERER');
error_reporting(E_ALL ^ E_NOTICE);
include('../includes/connection.php');
require('../includes/functions.php');
?>

<?php
if(is_loggedin()) {	
	if($_POST['comment'] != ""){
	$qno = $_POST['qno'];
	$username = $_SESSION['username'];
	$comment = $_POST['comment'];
	$query = "insert into comments (question_id, comment_time, username, comment) values('$qno', NOW(), '$username', '$comment')";
	mysql_query($query);
	header( 'Location:' . $url ) ;
	}
	else { 
		header( 'Location:' . $url . '&comment=failed' ) ; 
		
		}
}
?>



<!-- NOT LOGGED IN -->
<?php if(!is_loggedin()) { include('notloggedin.php'); } ?>
<!-- NOT LOGGED IN -->

<?php ob_flush();?>