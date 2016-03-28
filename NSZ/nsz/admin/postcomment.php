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
$type = $_POST['type'];
$visibility = $_POST['visibility'];
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
$filename2 = $username . "-" . $ran . "-" . basename( $_FILES['uploadedfile1']['name']);
$filename3 = $username . "-" . $ran . "-" . basename( $_FILES['uploadedfile2']['name']);

$target_path = $target_path . $filename;
$target_path2 = $target_path2 . $filename2;
$target_path3 = $target_path3 . $filename3;



if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
	$att1 = $filename;
    echo "The file ".  basename( $_FILES['uploadedfile']['name']). " has been uploaded";


} else{
    // echo "There was an error uploading the file, please try again!";
}


if(move_uploaded_file($_FILES['uploadedfile1']['tmp_name'], $target_path2)) {
	$att2 = $filename2;
   echo "The file ".  basename( $_FILES['uploadedfile1']['name']). " has been uploaded";


} else{
    // echo "There was an error uploading the file, please try again!";
}


if(move_uploaded_file($_FILES['uploadedfile2']['tmp_name'], $target_path3)) {
	$att3 = $filename3;
    echo "The file ".  basename( $_FILES['uploadedfile2']['name']). " has been uploaded";


} else{
    // echo "There was an error uploading the file, please try again!";
}




$query = "insert into replies (username, question_id, subject, type, visibility, note, postedtime, postedtime_gmt, att1, att2, att3) values ( '$username', '$qno', '$subject', '$type', '$visibility', '$note', NOW(), '$postedtime', '$att1', '$att2', '$att3')";
mysql_query($query);

if($type==1)
{
$query2 = "UPDATE questions set status='Completed' WHERE question_id='$qno'";
}
mysql_query($query2);


header('Location: index.php');

//include('../mails/postaquestionmail.php'); 
?>
<?php ob_flush();?>
