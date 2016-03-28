<?php
ob_start(); 
session_start();
$url = getenv('HTTP_REFERER');
error_reporting(E_ALL ^ E_NOTICE);
include('../includes/connection.php');
require('../includes/functions.php');
?>

<?php
if(is_admin()) {	
// Check if delete button active, start this
if (isset($_POST['delete']) && isset($_POST['checkbox'])) {
$checkbox = $_POST['checkbox'];
if(is_array($checkbox)) {
	foreach($checkbox as $key => $del_id) { 
	//echo $checkbox[$i];
	$sql = "DELETE FROM comments WHERE comment_id='$del_id'";
	$result = mysql_query($sql);
	header('Location:' . $url );
	}
   }
  }
  else { header('Location:' . $url ); }
 }
?>



<!-- NOT LOGGED IN -->
<?php if(!is_loggedin()) { include('notloggedin.php'); } ?>
<!-- NOT LOGGED IN -->

<?php ob_flush();?>