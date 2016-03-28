<?php
ob_start(); 
session_start();
$url = getenv('HTTP_REFERER');
error_reporting(E_ALL ^ E_NOTICE);
include('../includes/connection.php');
require('../includes/functions.php');
?>

<?php
if(is_expert() || is_member()) {	
	$qno = $_POST['qno'];
	$username = $_SESSION['username'];
	$subject = $_POST['subject'];
	$message = mysql_prep($_POST['message']);
	$to = $_POST['to'];
	echo "Your message has been sent !" ;
	$query = "insert into messages (question_id, message_time, username, message, tousername, subject) values('$qno', NOW(), '$username', '$message', '$to', '$subject')";
	mysql_query($query);
	//header( 'Location:' . $url ) ;
}
?>



<!-- NOT LOGGED IN -->
<?php if(!is_loggedin()) { include('notloggedin.php'); } ?>
<!-- NOT LOGGED IN -->

<?php ob_flush();?>