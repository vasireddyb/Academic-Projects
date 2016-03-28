<?php 
// IF MEMBER
$username = $_SESSION['username'];
include('admin-header.php');
$status = $_GET['status'];

?>
<?php // include('admin-sidebar.php'); ?>
<div id="fullcontent"><!--content-->
<div id="rightcontent" style="width:765px; ">
<?php include('nav.php'); ?>
<div class="tabcontent all">

<?php 
	if ($status=="all" || $status=="") {
	$result2 = mysql_query("SELECT * from questions where username='$username' $max");
	} else { 
	$result2 = mysql_query("SELECT * from questions where username='$username' and status='$status' $max;");
	}
	$row = mysql_fetch_array($result2);
    if(empty($row)) { echo "Sorry, No Questions Found !"; } else { 
?>
<table cellpadding="0" cellspacing="0" border="0" class="users">
<tbody>
<tr style="background:#444; color:#444;">
<th>Q.ID</th>
<th>Title</th>
<!--<th>Posted On</th>-->
<th>Due Date</th>
<th>Price</th>
<th>Payment</th>
</tr>

<?php 
    include('topnav.php');
	if ($status=="all" || $status=="") {
	$result3 = mysql_query("SELECT * from questions where username='$username' ORDER BY question_id DESC $max");
	} else { 
	$result3 = mysql_query("SELECT * from questions where username='$username' and status='$status' ORDER BY question_id DESC $max;");
	}
	while( $row2 = mysql_fetch_array($result3)) {	
		
		?>
<tr>
	    <td style="text-align:center;width:5%;"><?php echo $row2['question_id']; //echo $i; $i++; ?></td>
		<td style="width:30%;"><a href="question-details.php?qno=<?php echo $row2['question_id']; ?>&page=<?php echo $page; ?>"><?php echo $row2['title'] ?></a></td>
		<!--<td style="width:16%;">
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
		 </td> -->
		<td style="width:10%;"><?php 
		$username = $_SESSION['username'];
        $timezonequery = mysql_query("SELECT * from users where username='$username'");
        $result1 = mysql_fetch_array($timezonequery);
        $tz = $result1['timezone'];
        $ddate = $row2['duedate_gmt'];
        $date = new DateTime( $ddate, new DateTimeZone('Etc/Greenwich'));
        //According to user's timezone the duedate is..
        $date->setTimezone(new DateTimeZone($tz));
        $duedate_gmt = $date->format('Y-m-d H:i');	
        echo $duedate_gmt;
		?>
		</td>
        <td style="width:5%;"><?php echo $row2['price']; ?> </td>
		<td style="width:5%;text-align:center;"><?php if ($row2['payment'] == $row2['price']){ echo "<img src='./../images/checked.gif' />"; } 
		else if($row2['payment'] == 0) { echo "<img src='./../images/paypal_logo.png' />"; } 
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
<div id="rightsidebar" style="float:left; background: url(../images/wideskyscraper_img.jpg); height:600px;  border: 2px solid #ccc; width:156px; margin-left:15px; margin-top:21px;">
</div>
</div><!--content-->
<?php include('../footer.php'); ?>
