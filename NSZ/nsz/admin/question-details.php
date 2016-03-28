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
<fieldset style="background:#eee;">
<legend> Question details </legend>
<?php 
	if(is_loggedin()) { ?>
<div style="display:none;" class="infomessage"></div>

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
$time = $dtime->format('D, M d, Y \a\t H:i');
$posteddate_gmt_con = $dtime->format('y-m-d h:i:s');


// CURRENT TIME
$today = getdate();
$wday = $today['mday'];
$month = $today['mon'];
$year = $today['year'];
$hours = $today['hours'];
$minutes = $today['minutes'];
$seconds = $today['seconds'];

// this is gmt time regardless of what the server is set to..
$currenttime = $year . "-" . $month . "-" . $wday . " " . $hours . ":" . $minutes . ":" . $seconds;


//$currenttime = time();
$currenttimestamp = strtotime($currenttime);
$currentdtzone = new DateTimeZone($tz);
$currentdtime = new DateTime();
$currentdtime->setTimestamp($currenttimestamp);
$currentdtime->setTimeZone($currentdtzone);
$currenttime = $currentdtime->format('D, M d, Y \a\t H:i');
$timenow = $currentdtime->format('y-m-d h:i:s');

echo $timenow;







//echo $posteddate_gmt_con . " ";
//echo $time;

$ddate = $row['duedate_gmt'];
//echo $ddate;
$date = new DateTime( $ddate, new DateTimeZone('Etc/Greenwich'));

	$date->setTimezone(new DateTimeZone($tz));

	$duedate_gmt_con = $date->format('y-m-d h:i:s');
//echo $duedate_gmt_con;

	$duedate_gmt = $date->format('D, M d, Y \a\t H:i');

$d1 = strtotime($timenow);
$d2 = strtotime($duedate_gmt_con);
$difftime = floor(($d2-$d1)/3600);
?>

<?php } ?>

<div style="float:right;width:140px;">
<?php if($row['status']!= 'Dropped') { ?>
<?php if(is_member() || is_admin()) { ?>
<a href="cancel-question.php?qno=<?php echo $qno; ?>" class="redbutton" style="padding-top:4px; padding-bottom:4px;color:#fff;margin-right:10px;">Cancel Question</a>
<?php } ?>
<?php } else { ?>
<a href="reopen-question.php?qno=<?php echo $qno; ?>" class="greenbutton" style="padding-top:4px; padding-bottom:4px;color:#fff;margin-right:10px;">Reopen Question</a>
<?php } ?>
</div>

<div class="field"><div class="labelsmall"><label>Question ID:</label></div><div class="qinputext"><?php echo $row['question_id'] ;?></div></div>
<div class="field"><div class="labelsmall"><label>Subject:</label></div><div class="qinputext"><?php echo $row['title'] ;?></div></div>
<div class="field"><div class="labelsmall"><label>Category:</label></div><div class="qinputext"><?php echo $row['subject'] ;?></div></div>

<div class="field"><div class="labelsmall"><label>Description</label></div><div class="qinputext"><p><?php echo  $row['question']; ?></p></div></div>




<div class="field"><div class="labelsmall"><label>Attachments:</label></div><div class="qinputext"><?php if($row['att1'] == "" && $row['att2'] == "" && $row['att3'] == "") { ?> No Attachments Found <?php } ?><a href="<?php echo "uploads/" . $row['att1']; ?>"><?php echo $row['att1']; ?></a><br /><a href="<?php echo "uploads/" . $row['att2']; ?>"><?php echo $row['att2']; ?></a><br /><a href="<?php echo "uploads/" . $row['att3']; ?>"><?php echo $row['att3']; ?></a>

</div></div>



<div class="field"><div class="labelsmall"><label>Posted By:</label></div><div class="qinputext"><?php echo $row['username']; ?></div></div>
<div class="field"><div class="labelsmall"><label>Posted On:</label></div><div class="qinputext"><?php echo $time;  ?></div></div>





<?php //echo $row['subject'] ?>
<?php //echo $row['question'] ?>

<br />




<div class="field"><div class="labelsmall"><label>Due Date:</label></div><div class="qinputext"><?php echo $duedate_gmt; ?> <b style="color:red"><?php echo " (" . $difftime . " Hours Left)"; ?></b></div></div>

<?php if(is_member()) { ?>
<div class="field"><div class="labelsmall"><label>Price:</label></div><div class="qinputext"><?php echo $row['price']; ?></div></div>
<?php } ?>

<?php if(is_expert()) { ?>
<div class="field"><div class="label"><label>Price:</label></div><div class="qinputext"><?php echo $row['expertprice']; ?></div></div>
<?php } ?>


<?php if(is_admin()) { ?>
<div class="field"><div class="labelsmall"><label>Member Price:</label></div><div class="qinputext"><?php echo $row['price']; ?></div></div>


<div class="field"><div class="labelsmall"><label>Expert Price:</label></div><div class="qinputext changedexpertprice"><?php echo $row['expertprice']; ?>&nbsp;&nbsp;&nbsp;<a id="displayText" href="javascript:toggle();">Change Price </a>
<div id="toggleText" style="display: none">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<input id = "expertprice" type="text" name="expertprice" />
<input id="qno" type="hidden" name="qno" value="<?php echo $qno; ?>" />
<input class="button" type="submit" value="submit" onclick="changeExpertPrice(); return false; "/>
</form>
</div>

</div></div>

<?php } ?>






<?php if(is_admin()) { ?>
<div class="field"><div class="labelsmall"><label>Assigned To:</label></div><div class="qinputext"><?php if( $row['expert'] != null  ) { ?> <a href="assign-expert.php?qno=<?php echo $row['question_id']; ?>"><?php echo $row['expert']; ?></a> <?php } else { ?> <a href="assign-expert.php?qno=<?php echo $row['question_id']; ?>">Not Assigned</a>  <?php } ?></td>
</div></div>
<div class="field"><div class="labelsmall"><label>Status:</label></div>
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
&nbsp;&nbsp;&nbsp;<a href="javascript:document.forms[1].submit();">Submit</a></div>
<input type="hidden" name="qno" value="<?php echo $qno; ?>" />

</form>
<?php } ?>	
<?php //include('question-utils.php'); ?>
</fieldset>
<!-- QUESTION DETAILS -->

<!-- COMMENTS -->
<?php if(is_admin()) { ?> 

<?php } ?>



<?php if(is_expert()) { ?> 

<?php } ?>


<?php if(is_member()) { ?> 

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
