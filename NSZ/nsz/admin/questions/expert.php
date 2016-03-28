<?php
// IF EXPERT
$username = $_SESSION['username'];
$status = $_GET['status'];
$result1 = mysql_query("SELECT usertype from users WHERE username = '$username';");
$row1 = mysql_fetch_array($result1);
$usertype = $row1['usertype'];
	if($_SESSION['is_loggedin'] == 'true' && $usertype == "3"){	
?>

<?php include('admin-header.php'); ?>
<?php // include('admin-sidebar.php'); ?>
<div id="fullcontent"><!--content-->
<div id="rightcontent">

<?php include('nav.php'); ?>

<div class="tabcontent all">

 <?php 
	if ($status=="all" || $status=="") {
	$result2 = mysql_query("SELECT * from questions WHERE expert='$username' OR status='Open' $max");
	} else { 
	$result2 = mysql_query("SELECT * from questions WHERE expert='$username' and status='$status' $max");
	}
	$row = mysql_fetch_array($result2);
    if(empty($row)) { echo "Sorry, No Questions Found !"; } else { 
?>
<table cellpadding="0" cellspacing="0" border="0" class="users">
<tbody>
<tr style="background:#444; color:#444;">
<th>Q.ID</th>
<th>Title</th>
<th>Posted Date</th>
<th>Due Date</th>
<th>Status</th>
<th>Price</th>
<th>Payment</th>
</tr>

<?php 
    include('topnav.php');
    if ($status=="all" || $status=="") {
	$result4 = mysql_query("SELECT * from questions WHERE expert='$username' OR status='Open' ORDER BY question_id DESC $max");
	} else { 
	$result4 = mysql_query("SELECT * from questions WHERE expert='$username' and status='$status' ORDER BY question_id DESC $max");
	}
	$i = 1;
	while( $row2= mysql_fetch_array($result4)) { ?>
<tr>
	    <td style="text-align:center;width:5%;"><?php echo $row2['question_id']; //echo $i; $i++; ?></td>
		<td style="width:25%;"><a href="question-details.php?qno=<?php echo $row2['question_id']; ?>"><?php echo $row2['title'] ?></a></td>
		<td style="width:14%;"><?php 
		$username = $_SESSION['username'];
        $timezonequery = mysql_query("SELECT * from users where username='$username'");
        $result = mysql_fetch_array($timezonequery);
        $tz = $result['timezone'];
        $pdate = $row2['postedtime_gmt'];
        $date = new DateTime( $pdate, new DateTimeZone('Etc/Greenwich'));
    	//According to user's timezone the duedate is..
        $date->setTimezone(new DateTimeZone($tz));
        $postdate_gmt = $date->format('Y-m-d H:i:s');	
        echo $postdate_gmt;	 ?></td>
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
                               echo $duedate_gmt;  ?></td>		
		<td style="width:7%;"><?php echo $row2['status'];  ?></td>
        <td style="width:7%;"><?php echo $row2['expertprice']; ?></td>
        <td style="width:7%;text-align:center;"><?php if ($row2['payment'] == $row2['expertprice']){ echo "<img src='./../images/checked.gif' />"; } 
		else if($row2['payment'] == 0) { echo "<img src='./../images/unchecked.gif' />"; } 
		else if($row2['payment'] < $row2['price']) { echo "<div style='background:#F7B16F;color:#000; font-weight:bold; line-height:15px;'>"; echo $row2['price']; echo "</div>"; }
		?></td>  		
</tr>

<?php } ?>

</tbody>
</table>
<?php } ?>
<?php if(!empty($row)) { include('navigation.php'); } ?>
</div>
</div>
</div><!--content-->
<?php include('../footer.php'); ?>
<?php } 
//IF EXPERT
?>