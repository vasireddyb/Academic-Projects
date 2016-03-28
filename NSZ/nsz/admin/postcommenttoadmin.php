<?php ob_start(); ?>
<?php  
session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
include('../includes/connection.php');
require('../includes/functions.php');
?>


<?php
$username = $_SESSION['username'];
$subject =  mysql_prep($_POST['subject']);
$type = 2; // comment
$note =  mysql_prep($_POST['note']);
$today = getdate();
$wday = $today['mday'];
$month = $today['mon'];
$year = $today['year'];
$hours = $today['hours'];
$minutes = $today['minutes'];
$seconds = $today['seconds'];

$qno = $_POST['qno'];

// this is gmt time regardless of what the server is set to..
$postedtime = $year . "-" . $month . "-" . $wday . " " . $hours . ":" . $minutes . ":" . $seconds;


// FILE UPLOAD
$target_path = "uploads/";
$target_path2 = "uploads/";
$target_path3 = "uploads/";
$ran = strtotime($postedtime);

$filename = $username . "-" . $ran . "-" . basename( $_FILES['uploadedfile']['name']);
$filename1 = $username . "-" . $ran . "-" . basename( $_FILES['uploadedfile1']['name']);
$filename2 = $username . "-" . $ran . "-" . basename( $_FILES['uploadedfile2']['name']);

$target_path = $target_path . $filename;
$target_path2 = $target_path2 . $filename1;
$target_path3 = $target_path3 . $filename2;


for($i=0; $i<2; $i++) {
if(move_uploaded_file($_FILES['uploadedfile' . $i]['tmp_name'], $target_path)) {
	$att1 = $filename;
	$att2 = $filename;
	$att3 = $filename;
    //echo "The file ".  basename( $_FILES['uploadedfile'. $i]['name']). " has been uploaded";


} else{
    echo "There was an error uploading the file, please try again!";
}

}



$query = "insert into replies (username, question_id, subject, type, note, postedtime, postedtime_gmt, att1, att2, att3) values ( '$username', '$qno', '$subject', '$type', '$note', NOW(), '$postedtime', '$att1', '$att2', '$att3')";
mysql_query($query);
header('Location: index.php');

//include('../mails/postaquestionmail.php'); 
?>
<?php ob_flush();?>
