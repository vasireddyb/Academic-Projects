<?php  
session_start(); 
//error_reporting(E_ALL ^ E_NOTICE);
require('../includes/functions.php');
require('../includes/connection.php');
//date_default_timezone_set('America/Halifax');
?>
<?php if(is_member() || is_admin()) { ?>
<?php include('admin-header.php'); ?>
<?php //include('admin-sidebar.php'); ?>
<div id="content">
<div id="rightcontent">

<!-- POST A QUESTION CODE -->
<?php if(isset($_POST['subject']) || isset($_POST['title']) || isset($_POST['question'])) { 
$username = $_SESSION['username']; 
$result = mysql_query("SELECT * from users WHERE username='$username';");
$row = mysql_fetch_array($result);
$tz = $row['timezone'];
if($_POST['subject'] == '0') { $subject = "Others";  } else { $subject =  mysql_prep($_POST['subject']); }
$title =  mysql_prep($_POST['title']);
$question =  mysql_prep($_POST['question']);
$status = 'New';
$price = $_POST['price'];
$today = getdate();
$wday = $today['mday'];
$month = $today['mon'];
$year = $today['year'];
$hours = $today['hours'];
$minutes = $today['minutes'];
$seconds = $today['seconds'];

// this is gmt time regardless of what the server is set to..
$postedtime = $year . "-" . $month . "-" . $wday . " " . $hours . ":" . $minutes . ":" . $seconds;

//echo $postedtime;

if(isset($_POST['duedate'])) { 
	$username = $_SESSION['username'];
	$duedate = $_POST['duedate'];
	$timezonequery = mysql_query("SELECT * from users where username='$username'");
	$result = mysql_fetch_array($timezonequery);
	$usertimezone = $result['timezone'];
	//echo $usertimezone;

	$date = new DateTime( $duedate, new DateTimeZone($usertimezone));

	//According to user's timezone the duedate is..
	//echo $date->format('Y-m-d H:i:sP') . "<br>";

	$date->setTimezone(new DateTimeZone('Etc/Greenwich'));

	$duedate_gmt = $date->format('Y-m-d H:i:s');

	//echo $duedate_gmt;
	
	}



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
    //echo "The file ".  basename( $_FILES['uploadedfile']['name']). " has been uploaded";


} else{
    // echo "There was an error uploading the file, please try again!";
}


if(move_uploaded_file($_FILES['uploadedfile1']['tmp_name'], $target_path2)) {
	$att2 = $filename2;
   //echo "The file ".  basename( $_FILES['uploadedfile1']['name']). " has been uploaded";


} else{
    // echo "There was an error uploading the file, please try again!";
}


if(move_uploaded_file($_FILES['uploadedfile2']['tmp_name'], $target_path3)) {
	$att3 = $filename3;
    //echo "The file ".  basename( $_FILES['uploadedfile2']['name']). " has been uploaded";


} else{
    // echo "There was an error uploading the file, please try again!";
}



$query = "insert into questions (username, title, question, subject, status, postedtime, postedtime_gmt, duedate, duedate_gmt, price, att1, att2, att3) values ( '$username', '$title', '$question', '$subject', '$status', NOW(), '$postedtime', '$duedate', '$duedate_gmt', '$price', '$att1', '$att2', '$att3')";
mysql_query($query);


//header('Location: index.php');

include('../mails/postaquestionmail.php'); 
}
?>
<!-- POST A QUESTION CODE -->


<script type="text/javascript">

$(document).ready
	(
		function()
		{
			$("#ddlCategories").find("option[value='0']").attr("selected","selected");
		}
	);



</script>
<form enctype="multipart/form-data" id="postquestion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<fieldset >
<legend> Post a Question </legend>
    <div class="field"><div class="label"><label>Category:</label></div>
	<select id="ddlCategories" style="float:left;width:200px;" name="subject" size="4" onchange="getSubCategories(this.value);">
	<?php
	$query = "select * from categories where parent_id='0' ORDER BY cat_name ASC";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
	{
	echo "<option value=\"".$row['cat_id']."\">".$row['cat_name']."\n  ";
	}
	?>
	</select>
	<div id="subcategories" style="float:left;">

	</div>
	</div>
	<div class="field"><div class="label"><label>Question title:</label></div><input id="name" class="form required" type="text" name="title" style="width:390px;" /></div>
	<div class="field"><div class="label"><label>Question:</label></div><textarea id="question" class="form required" type="text" name="question" style="width:390px; height:150px;"> </textarea></div>
	<div class="field"><div class="label"><label>Choose a file to upload:</label></div><input id="uf1" class="form" type="file" name="uploadedfile" style="width:350px;" /></div>
	<div class="field"><div class="label"><label>Choose a file to upload:</label></div><input id="uf2" class="form" type="file" name="uploadedfile1" style="width:350px;" /></div>
	<div class="field"><div class="label"><label>Choose a file to upload:</label></div><input id="uf3" class="form " type="file" name="uploadedfile2" style="width:350px;" /></div>
	<div class="field"><div class="label"><label>Due date</label></div><input id="datepicker" class="required form" type="text" value="" name="duedate" style="width:210px;" /></div>
    <div class="field"><div class="label"><label>Price:</label></div><input id="email" class="form " type="text" name="price" style="width:50px;" /></div>
     <div class="field"><input id="submit" type="submit" value="Post Question"/></div>
</fieldset>
</form>
</div>
</div>
<?php include('../footer.php'); ?>

<?php } ?>

<!-- NOT LOGGED IN -->
<?php if(!is_loggedin()) { include('notloggedin.php'); } ?>
<!-- NOT LOGGED IN -->	