<?php 
// IF ADMIN
include('admin-header.php');
$status = $_GET['status'];

?>
<?php //include('admin-sidebar.php'); ?>
<div id="fullcontent"><!--content-->
<div id="rightcontent" style="width:100%;">
<?php include('nav.php'); ?>
<div class="tabcontent all">
<?php
	$status = $_GET['status']; 
	if ($status=="all" || $status=="") {
	$result2 = mysql_query("SELECT * from questions $max");
	} else { 
	$result2 = mysql_query("SELECT * from questions WHERE status='$status' $max");
	}
$row = mysql_fetch_array($result2);
if(empty($row)) { echo "Sorry, No Questions Found !"; } else { 
?>
<table cellpadding="2px" cellspacing="0" border="0" class="users">
<tbody>
<tr style="color:#444;">
<th>Q.ID</th>
<th>Title</th>
<th>Posted Date</th>
<th>Due Date</th>
<!--<th>TD</th>-->
<th>Status</th>
<th>Price</th>
<th>ExPrice</th>
<th>Payment</th>
<th>Assigned To</th>
</tr>

<?php
	include('topnav.php');
	$status = $_GET['status'];
	if ($status=="all" || $status=="") {
	$result2 = mysql_query("SELECT * from questions ORDER BY question_id DESC $max");
	} else { 
	$result2 = mysql_query("SELECT * from questions WHERE status='$status' ORDER BY question_id DESC $max");
	}
	while( $row2 = mysql_fetch_array($result2)) {	
?>

<tr>
	    <td style="text-align:center;width:5%;"><?php echo $row2['question_id']; ?></td>
		<td style="width:25%;"><a href="question-details.php?qno=<?php echo $row2['question_id']; ?>"><?php echo $row2['title'] ?></a></td>
		<td style="width:14%;">
		<?php
        $username = $_SESSION['username'];
        $timezonequery = mysql_query("SELECT * from users where username='$username'");
        $result = mysql_fetch_array($timezonequery);
        $tz = $result['timezone'];
        $pdate = $row2['postedtime_gmt'];
        $date = new DateTime( $pdate, new DateTimeZone('Etc/Greenwich'));
    	//According to user's timezone the duedate is..
        $date->setTimezone(new DateTimeZone($tz));
        $postdate_gmt = $date->format('Y-m-d H:i');	
        echo $postdate_gmt;
        ?>
		</td>
		<td style="width:14%;">
		<?php 
	    $username = $_SESSION['username'];
        $timezonequery = mysql_query("SELECT * from users where username='$username'");
        $result = mysql_fetch_array($timezonequery);
        $tz = $result['timezone'];
        $ddate = $row2['duedate_gmt'];
        $date = new DateTime( $ddate, new DateTimeZone('Etc/Greenwich'));
        //According to user's timezone the duedate is..
        $date->setTimezone(new DateTimeZone($tz));
        $duedate_gmt = $date->format('Y-m-d H:i');	
        echo $duedate_gmt;
		?>
		</td>
		<!--TIME DIFFERENCE
		<td>
			
		</td>
		TIME DIFFERENCE-->
		
		<!--<td style="width:16%;"><?php $time1 = time(); echo dateDiff($row2['duedate'], $time1); ?></td>-->
		<td style="width:7%;"><?php echo $row2['status']; ?></td>
        <td style="width:7%;"><?php echo $row2['price']; ?></td>
		<td style="width:7%;"><?php echo $row2['expertprice']; ?></td>
		<td style="width:7%;text-align:center;"><?php if ($row2['payment'] == $row2['price']){ echo "<img src='./../images/checked.gif' />"; } 
		else if($row2['payment'] == 0) { echo "<img src='./../images/unchecked.gif' />"; } 
		else if($row2['payment'] < $row2['price']) { echo "<div style='background:#F7B16F;color:#000; font-weight:bold; line-height:15px;'>"; echo $row2['price']; echo "</div>"; }
		?></td> 
        <td style="width:11%;"> <?php if( $row2['expert'] != null  ) { ?> <a href="assign-expert.php?qno=<?php echo $row2['question_id']; ?>&page=<?php echo $page; ?>"><?php echo $row2['expert']; ?></a> <?php } else { ?> <a href="assign-expert.php?qno=<?php echo $row2['question_id']; ?>&page=<?php echo $page; ?>">Not Assigned</a>  <?php } ?></td>
               
</tr>

<?php } ?>

</tbody>
</table>
<?php include('navigation.php'); ?>
<?php } ?>
</div>
<!-- TABS -->

</div>
</div><!--content-->
<?php include('../footer.php'); ?>
