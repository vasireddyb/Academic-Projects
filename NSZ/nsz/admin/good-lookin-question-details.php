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
<div id="rightcontent" style="width:700px; ">

<!-- QUESTION DETAILS -->
<fieldset>
<legend> Question details </legend>
<?php 
	if(is_loggedin()) { ?>
<div style="display:none;" class="infomessage"></div>


<!--POPUP CONTENT-->
<div id="info" style="display:none;">
<h3 style="border:none;padding-bottom:10px;">Send a Message to Admin</h3>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
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

<div style="float:right;width:135px;">
<?php if($row['status']!= 'Dropped') { ?>
<?php if(is_member() || is_admin()) { ?>
<a href="cancel-question.php?qno=<?php echo $qno; ?>" class="redbutton" style="padding-top:4px; padding-bottom:4px;color:#fff;margin-right:10px;">Cancel Question</a>
<?php } ?>
<?php } else { ?>
<a href="reopen-question.php?qno=<?php echo $qno; ?>" class="greenbutton" style="padding-top:4px; padding-bottom:4px;color:#fff;margin-right:10px;">Reopen Question</a>
<?php } ?>
</div>

<div style="width:600px;"><h1><?php echo $row['title'] ;?></h1></div>
<p style="line-height:30px;">Posted by: <b style="color:#1D7E7C"><?php echo $row['username'] ?></b> on <b style="color:#1D7E7C">

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

	$date->setTimezone(new DateTimeZone($tz));

	$duedate_gmt = $date->format('D, M d, Y \a\t H:i');

?>


</b> in <b style="color:#1D7E7C"><?php echo $row['subject'] ?></b></p>	
<p class="text"><?php echo $row['question'] ?></p>

<br />


<?php if(is_admin()) { ?>
<div class="field"><div class="label"><label>Member Price:</label></div><div class="qinputext"><?php echo $row['price']; ?></div></div>


<div class="field"><div class="label"><label>Expert Price:</label></div><div class="qinputext changedexpertprice"><?php echo $row['expertprice']; ?>&nbsp;&nbsp;&nbsp;<a id="displayText" href="javascript:toggle();">Change Price </a>
<div id="toggleText" style="display: none">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<input id = "expertprice" type="text" name="expertprice" />
<input id="qno" type="hidden" name="qno" value="<?php echo $qno; ?>" />
<input class="button" type="submit" value="submit" onclick="changeExpertPrice(); return false; "/>
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

<div class="field"><div class="label"><label>Attachments:</label></div><div class="qinputext"><a href="<?php echo "uploads/" . $row['att1']; ?>"><?php echo $row['att1']; ?></a><br /><a href="<?php echo "uploads/" . $row['att2']; ?>"><?php echo $row['att2']; ?></a><br /><a href="<?php echo "uploads/" . $row['att3']; ?>"><?php echo $row['att3']; ?></a></div></div>


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
<?php //include('question-utils.php'); ?>
</fieldset>
<!-- QUESTION DETAILS -->

<!-- COMMENTS -->
<?php if(is_admin()) { ?> 
<div id="toggleCommentText">
<form enctype="multipart/form-data" id="postcomment" action="postcomment.php" method="POST">
<fieldset >
<legend> Add more notes for clarifications</legend>
<div class="field"><div class="label"><label>Type</label></div>
	<input type="radio" checked="checked" name="type" value="0" /> Comment
	<input type="radio" name="type" value="1" /> Answer
</div>
	<div class="field"><div class="label"><label>Subject</label></div><input id="subject" class="form required" type="text" name="subject" style="width:400px;" /></div>
	<div class="field"><div class="label"><label>Note:</label></div><textarea id="note" class="form" type="text" name="note" style="width:400px; height:150px;"> </textarea></div>
	<div class="field"><div class="label"><label>Choose a file to upload:</label></div><input id="email" class="form" type="file" name="uploadedfile" style="width:300px;" /></div>
	<div class="field"><div class="label"><label>Choose a file to upload:</label></div><input id="email" class="form" type="file" name="uploadedfile1" style="width:300px;" /></div>
	<div class="field"><div class="label"><label>Choose a file to upload:</label></div><input id="email" class="form " type="file" name="uploadedfile2" style="width:300px;" /><input type="hidden" name="qno" value="<?php echo $_GET['qno']; ?>" /></div>
	<div class="field"><div class="label"><label>Note to</label></div><input type="radio" checked="checked" name="visibility" value="0" /> None
<input type="radio" name="visibility" value="1" /> Everbody
<input type="radio" name="visibility" value="2" /> Expert
<input type="radio" name="visibility" value="3" /> Member</div>

     <div style="text-align:right;" class="field"><input id="submit" class="button" type="submit" value="Post a Comment"  /></div>
</fieldset>
</form>
</div>
<?php } ?>



<?php if(is_expert()) { ?> 
<div id="toggleCommentText">
<form enctype="multipart/form-data" id="postcomment" action="postcomment.php" method="POST">
<fieldset >
<legend> Add more notes for clarifications</legend>
<div class="field"><div class="label"><label>Type</label></div>
	<input type="radio" name="type" value="0" /> Comment
	<input type="radio" checked="checked" name="type" value="1" /> Answer
</div>
	<div class="field"><div class="label"><label>Subject</label></div><input id="subject" class="form required" type="text" name="subject" style="width:300px;" /></div>
	<div class="field"><div class="label"><label>Note:</label></div><textarea id="note" class="form" type="text" name="note" style="width:300px; height:150px;"> </textarea></div>
	<div class="field"><div class="label"><label>Choose a file to upload:</label></div><input id="email" class="form" type="file" name="uploadedfile" style="width:300px;" /></div>
	<div class="field"><div class="label"><label>Choose a file to upload:</label></div><input id="email" class="form" type="file" name="uploadedfile1" style="width:300px;" /></div>
	<div class="field"><div class="label"><label>Choose a file to upload:</label></div><input id="email" class="form " type="file" name="uploadedfile2" style="width:300px;" /><input type="hidden" name="qno" value="<?php echo $_GET['qno']; ?>" /></div>
	<div class="field"><div class="label"><label>Note to</label></div>
	<input type="radio" name="visibility" value="1" /> Everbody
	<input type="radio" checked="checked" name="visibility" value="4" /> Admin
</div>

     <div class="field"><input id="submit" class="button" type="submit" value="Post a Comment"  /></div>
</fieldset>
</form>
</div>
<?php } ?>


<?php if(is_member()) { ?> 
<div id="toggleCommentText">
<form enctype="multipart/form-data" id="postcomment" action="postcomment.php" method="POST">
<fieldset >
<legend> Add more notes for clarifications</legend>
	<input type="hidden" name="type" value="0" />
	<div class="field"><div class="label"><label>Subject</label></div><input id="subject" class="form required" type="text" name="subject" style="width:300px;" /></div>
	<div class="field"><div class="label"><label>Note:</label></div><textarea id="note" class="form" type="text" name="note" style="width:300px; height:150px;"> </textarea></div>
	<div class="field"><div class="label"><label>Choose a file to upload:</label></div><input id="email" class="form" type="file" name="uploadedfile" style="width:300px;" /></div>
	<div class="field"><div class="label"><label>Choose a file to upload:</label></div><input id="email" class="form" type="file" name="uploadedfile1" style="width:300px;" /></div>
	<div class="field"><div class="label"><label>Choose a file to upload:</label></div><input id="email" class="form " type="file" name="uploadedfile2" style="width:300px;" /><input type="hidden" name="qno" value="<?php echo $_GET['qno']; ?>" /></div>
	<div class="field"><div class="label"><label>Note to</label></div>
<input type="radio" name="visibility" value="1" /> Everbody
<input type="radio" checked="checked" name="visibility" value="4" /> Admin
</div>
     <div class="field"><input id="submit" class="button" type="submit" value="Post a Comment"  /></div>
</fieldset>
</form>
</div>
<?php } ?>

<!-- IF MEMBER -->
<?php
	if(is_member()) {
	include('replies/member.php');
}
?>
<!-- IF MEMBER -->



<!-- IF EXPERT -->
<?php
	if(is_expert()) {
	include('replies/expert.php');
}
?>
<!-- IF EXPERT -->


<!-- IF ADMIN -->
<?php
	if(is_admin()) {
	include('replies/admin.php');
}
?>
<!-- IF ADMIN -->






</div>
</div><!--content-->
<?php include('../footer.php'); ?>
<?php }
//IF USER LOGGED IN
?>


<!-- NOT LOGGED IN -->
<?php if(!is_loggedin()) { include('notloggedin.php'); } ?>
<!-- NOT LOGGED IN -->