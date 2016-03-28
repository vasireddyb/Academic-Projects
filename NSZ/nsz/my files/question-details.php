<?php  
session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
include('../includes/connection.php');
require('../includes/functions.php');
?>

<?php
	// IF USER LOGGED IN
	if(is_loggedin()) {	
	$qno = $_GET['qno'];
	$result = mysql_query("SELECT * from questions WHERE question_id='$qno';");
	$row = mysql_fetch_array($result);	
?>

<?php include('admin-header.php'); ?>
<?php // include('admin-sidebar.php'); ?>
<div id="content"><!--content-->
<div id="rightcontent" style="width:800px; ">

<!-- QUESTION DETAILS -->
<fieldset>
<legend> Question details </legend>
<?php 
	if(is_loggedin()) { ?>
<div class="questionutils">
<?php if(is_member() || is_expert()) { ?>
<a class="bluebutton" style="padding-top:4px; padding-bottom:4px;color:#fff;margin-right:10px;" href="#info" rel="facebox">Message Admin</a>
<?php } ?>

<?php if(is_expert()) { ?>
<a class="greenbutton" style="padding-top:4px; padding-bottom:4px;color:#fff;margin-right:10px;"  href="answer-question.php?qno=<?php echo $qno; ?>">Answer the Question..!</a>
<?php } ?>	


<?php if($row['status']!= 'Dropped') { ?>
<?php if(is_member() || is_admin()) { ?>
<a class="redbutton" style="padding-top:4px; padding-bottom:4px;color:#fff;margin-right:10px;" href="cancel-question.php?qno=<?php echo $qno; ?>">Cancel Question</a>
<?php } ?>

<br /><br />
<?php } else { ?>
<a class="greenbutton" style="padding-top:4px; padding-bottom:4px;color:#fff;margin-right:10px;" href="reopen-question.php?qno=<?php echo $qno; ?>">Reopen Question</a>
<br /><br />
<?php } ?>
</div>

<!--POPUP CONTENT-->
<div id="info" style="display:none;">
<h3 style="border:none;padding-bottom:10px;">Send a Message to Admin</h3>
<form action="message.php" method="post" id="reg">
<div id="error"></div>
<div class="mesgfield"><div class="mesglabel"><label>Subject</label></div><input style="width:333px;" type="text" name="subject" class="required form" id="Subject" /></div>
<div class="mesgfield"><div class="mesglabel"><label>Message</label></div><textarea cols="40" rows="9" name="message" class="required" id="Message" ></textarea></div>
<div class="fieldright"><input class="button" type="submit" value="Send a Message" onclick="validate(); return false;" /></div>
<input type="hidden" name="qno" value="<?php echo $qno; ?>" />
<input type="hidden" name="to" value="admin" />
</form>    
</div>
<!--POPUP CONTENT-->


<?php } ?>
<h1><?php echo $row['title'] ;?></h1>
<p style="line-height:30px;">Posted by: <b style="color:#809bae"><?php echo $row['username'] ?></b> on <b style="color:#809bae">


<?php 

$username = $_SESSION['username'];
$timezonequery = mysql_query("SELECT * from users where username='$username'");
$result = mysql_fetch_array($timezonequery);
$tz = $result['timezone'];
//echo $tz;

$time = $row['postedtime_gmt'];
$timestamp = strtotime($time);
$dtzone = new DateTimeZone($tz);
$dtime = new DateTime();
$dtime->setTimestamp($timestamp);
$dtime->setTimeZone($dtzone);
$time = $dtime->format('m-d-Y \a\t g:i A');
echo $time;

$ddate = $row['duedate_gmt'];
//echo $ddate;
$date = new DateTime( $ddate, new DateTimeZone('Etc/Greenwich'));

	//According to user's timezone the duedate is..
	//echo $date->format('Y-m-d H:i:sP') . "<br>";

	$date->setTimezone(new DateTimeZone($tz));

	$duedate_gmt = $date->format('Y-m-d H:i:s');

	

/*
date_default_timezone_set('UTC');
$tz = 'America/Los_Angeles';
echo "<br>" . $tz . " : ";
$time = $row['postedtime_gmt'];
$timestamp = strtotime($time);
$dtzone = new DateTimeZone($tz);
$dtime = new DateTime();
$dtime->setTimestamp($timestamp);
$dtime->setTimeZone($dtzone);
$time = $dtime->format('g:i A m/d/y');
echo $time;

$tz2 = 'Asia/Kolkata';
echo "<br>" . $tz2 . " : ";
$time2 = $row['postedtime_gmt'];
$timestamp2 = strtotime($time2);
$dtzone1 = new DateTimeZone($tz2);
$dtime1 = new DateTime();
$dtime1->setTimestamp($timestamp2);
$dtime1->setTimeZone($dtzone1);
$time2 = $dtime1->format('g:i A m/d/y');

echo $time2 . "<br>";	
*/
?>


</b> in <b style="color:#809bae"><?php echo $row['subject'] ?></b></p>	
<p class="text"><?php echo $row['question'] ?></p>

<br />
<div class="field"><div class="label"><label>Attachments:</label></div><div class="qinputext"><a href="<?php echo "uploads/" . $row['att1']; ?>"><?php echo $row['att1']; ?></a></div></div>

<?php if(is_admin()) { ?>
<div class="field"><div class="label"><label>Member Price:</label></div><div class="qinputext"><?php echo $row['price']; ?></div></div>

<div class="field"><div class="label"><label>Expert Price:</label></div><div class="qinputext"><?php echo $row['expertprice']; ?>&nbsp;&nbsp;&nbsp;<a id="displayText" href="javascript:toggle();">Change Price </a>
<div id="toggleText" style="display: none">
<form action="expert-price.php" method="post">
<input type="text" name="expertprice" />
<input type="hidden" name="qno" value="<?php echo $qno; ?>" />
<input class="button" type="submit" value="submit" />
</form>
</div>
</div></div>
<?php } ?>

<?php if(is_member()) { ?>
<div class="field"><div class="label"><label>Price:</label></div><div class="qinputext"><?php echo $row['price']; ?></div></div>
<?php } ?>

<?php if(is_expert()) { ?>
<div class="field"><div class="label"><label>Price:</label></div><div class="qinputext"><?php echo $row['expertprice']; ?></div></div>
<?php } ?>


<div class="field"><div class="label"><label>Due Date:</label></div><div class="qinputext"><?php echo $duedate_gmt; ?></div></div>


<?php if(is_admin()) { ?>
<div class="field"><div class="label"><label>Assigned To:</label></div><div class="qinputext"><?php if( $row['expert'] != null  ) { ?> <a href="assign-expert.php?qno=<?php echo $row['question_id']; ?>"><?php echo $row['expert']; ?></a> <?php } else { ?> <a href="assign-expert.php?qno=<?php echo $row['question_id']; ?>">Not Assigned</a>  <?php } ?></td>
</div></div>
<div class="field"><div class="label"><label>Status:</label></div>
<form id="updatestatus" action="cancel-question.php" method="post">
<select style="width: 150px;" class="selectstatus" id="status" name="status">
	<option value="Select...">Select...</option>
	<option value="Dropped">Dropped</option>
	<option value="Clarification">Clarification</option>
	<option value="Fixed">Fixed</option>
	<option value="Hold">Hold</option>
	<option value="Open">Open</option>
	<option value="Transferred">Transferred</option>
</select>
&nbsp;&nbsp;&nbsp;<a href="javascript:document.forms[2].submit();">Submit</a></div>
<input type="hidden" name="qno" value="<?php echo $qno; ?>" />
</form>
<?php } ?>	
</fieldset>
<!-- QUESTION DETAILS -->


<!-- COMMENTS -->


<form action="comment.php" method="POST">
<fieldset>
<legend>Comments</legend>
<div class="error">
<?php if($_GET['comment'] == "failed") { echo "Please enter some text..!";} ?>
</div>
<h2>Post a Comment</h2>
<textarea class="inputextarea required" rows="7" cols="40" name="comment" value=""></textarea>
<input type="hidden" name="qno" value="<?php echo $qno; ?>" />
<input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>" />
<div class="field"><input class="button" type="submit" value="submit" /></div>
</fieldset>
</form>
 <form action="comment_delete.php" method="POST">
 <?php 
	 $result3 = mysql_query("SELECT * from comments WHERE question_id='$qno'");
     $row3= mysql_fetch_array($result3);
	 if(empty($row3)) {  } else { 
 ?>
 <fieldset>
 <legend>Comments</legend>
<?php 
	
	$result1 = mysql_query("SELECT * from comments WHERE question_id='$qno'");
	while( $row1= mysql_fetch_array($result1)) { ?>

<?php if(is_loggedin()) { ?>
<div class="comment"><div class="commenthead"><?php if(is_admin()) { ?><input name="checkbox[]" type="checkbox" value="<?php echo $row1['comment_id']; ?> " id="checkbox[]"/><?php } ?>	Comment by <?php echo $row1['username'] . " on " . $row1['comment_time']; ?></div> 


<div class="clear"></div>
<div class="commenttext"><?php echo $row1['comment'] ?></div></div>
<?php } ?>	
<?php } ?>
<?php if(is_admin()) { ?>
<div class="field"><input name="delete" class="button" type="submit" value="Delete" /></div>
<?php } ?>
</fieldset>
<?php } ?>	
</form>
<!-- COMMENTS -->

</div>
</div><!--content-->
<?php include('../footer.php'); ?>
<?php }
//IF USER LOGGED IN
?>


<!-- NOT LOGGED IN -->
<?php if(!is_loggedin()) { include('notloggedin.php'); } ?>
<!-- NOT LOGGED IN -->
