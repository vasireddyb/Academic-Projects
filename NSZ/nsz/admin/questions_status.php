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


<table cellpadding="2px" cellspacing="0" border="0" class="users">
<tbody>
<tr style="background:#444; color:#fff;">
<th>Q.No</th>
<th>Title</th>
<th>Posted Date</th>
<th>Due Date</th>
<th>Status</th>
<th>Price</th>
<th>Expert Price</th>
<th>Assigned To</th>
<th>Payment</th>
</tr>

<?php

	include('topnav.php');
	
	$result2 = mysql_query("SELECT * from questions $max");
	while( $row2 = mysql_fetch_array($result2)) {	
?>

<tr>
	    <td style="text-align:center;width:5%;"><?php echo $i; $i++; ?></td>
		<td style="width:25%;"><a href="question-details.php?qno=<?php echo $row2['question_id']; ?>"><?php echo $row2['title'] ?></a></td>
		<td style="width:14%;"><?php
        $username = $_SESSION['username'];
echo $username;
        $status = $_GET['status'];
		echo $status;
        $timezonequery = mysql_query("SELECT * from users where username='$username'");
        $result = mysql_fetch_array($timezonequery);
        $tz = $result['timezone'];
        $pdate = $row2['postedtime_gmt'];
        $date = new DateTime( $pdate, new DateTimeZone('Etc/Greenwich'));
    	//According to user's timezone the duedate is..
        $date->setTimezone(new DateTimeZone($tz));
        $postdate_gmt = $date->format('Y-m-d H:i:s');	
        echo $postdate_gmt;
        ?></td>
		<td style="width:14%;"><?php 
	                           $username = $_SESSION['username'];
                               $timezonequery = mysql_query("SELECT * from users where username='$username'");
                               $result = mysql_fetch_array($timezonequery);
                               $tz = $result['timezone'];
                               $ddate = $row2['duedate_gmt'];
                               $date = new DateTime( $ddate, new DateTimeZone('Etc/Greenwich'));
                               //According to user's timezone the duedate is..
                               $date->setTimezone(new DateTimeZone($tz));
                               $duedate_gmt = $date->format('Y-m-d H:i:s');	
                               echo $duedate_gmt; 
                               ?></td>
		<!--<td style="width:16%;"><?php $time1 = time(); echo dateDiff($row2['duedate'], $time1); ?></td>-->
		<td style="width:7%;"><?php echo $row2['status']; ?></td>
        <td style="width:7%;"><?php echo $row2['price']; ?></td>
		<td style="width:10%;"><?php echo $row2['expertprice']; ?></td>
        <td style="width:12%;"> <?php if( $row2['expert'] != null  ) { ?> <a href="assign-expert.php?qno=<?php echo $row2['question_id']; ?>&page=<?php echo $page; ?>"><?php echo $row2['expert']; ?></a> <?php } else { ?> <a href="assign-expert.php?qno=<?php echo $row2['question_id']; ?>&page=<?php echo $page; ?>">Not Assigned</a>  <?php } ?></td>
        <td style="width:7%;"><?php echo $row2['price']; ?></td>

        
</tr>

<?php } ?>

</tbody>
</table>


</div>
</div><!--content-->
<?php include('../footer.php'); ?>
<?php }
//IF USER LOGGED IN
?>


<!-- NOT LOGGED IN -->
<?php if(!is_loggedin()) { include('notloggedin.php'); } ?>
<!-- NOT LOGGED IN -->