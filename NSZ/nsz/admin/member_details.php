<?php
session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
include('../includes/connection.php');
require('../includes/functions.php');
?>




<?php 
// IF MEMBER
if(is_admin()){
$username = $_GET['username'];
include('admin-header.php'); 
?>
<?php // include('admin-sidebar.php'); ?>
<div id="fullcontent"><!--content-->
<div id="rightcontent" style="width:100%; ">
<?php
    $checkresult = mysql_query("SELECT * from questions where username='$username'");
	$row = mysql_fetch_array($checkresult);
	if(empty($row)) { echo "Sorry, No Questions Found !"; } else { 
?>

<table cellpadding="0" cellspacing="0" border="0" class="users">
<tbody>
<tr style="background:#444; color:#fff;">
<th>Q.No</th>
<th>Title</th>
<th>Posted On</th>
<th>Due Date</th>
<th>Price</th>
<th>Status</th>
</tr>

<?php 
    include('topnav.php');
	$result3 = mysql_query("SELECT * from questions where username='$username' $max;");
	while( $row2 = mysql_fetch_array($result3)) {	
		
		?>
<tr>
	    <td style="text-align:center;width:5%;"><?php echo $i; $i++; ?></td>
		<td style="width:40%;"><a href="question-details.php?qno=<?php echo $row2['question_id']; ?>&page=<?php echo $page; ?>"><?php echo $row2['title'] ?></a></td>
		<td style="width:16%;"><?php
		$username = $_SESSION['username'];
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
		<td style="width:16%;"><?php 
		$username = $_SESSION['username'];
                               $timezonequery = mysql_query("SELECT * from users where username='$username'");
                               $result1 = mysql_fetch_array($timezonequery);
                               $tz = $result1['timezone'];
                               $ddate = $row2['duedate_gmt'];
                               $date = new DateTime( $ddate, new DateTimeZone('Etc/Greenwich'));
                               //According to user's timezone the duedate is..
                               $date->setTimezone(new DateTimeZone($tz));
                               $duedate_gmt = $date->format('Y-m-d H:i:s');	
                               echo $duedate_gmt; 	
	                           ?></td>
        <td style="width:15%;"><?php echo $row2['price']; ?></td>
		<td style="width:15%;"><?php echo $row2['status']; ?></td>        
</tr>

<?php } ?>

</tbody>
</table>

<?php 
	/* echo "<p> --Page $page of $last-- <p>"; 
	if($page == 1) { }  else { echo " <a href='{$_SERVER['PHP_SELF']}?page=1'> <<-First</a> "; echo " "; $previous = $page-1; echo "<a  href='{$_SERVER['PHP_SELF']}?page=$previous'> <-Previous</a> "; }

	if($page == $last) { } else { $next = $page+1; echo " <a href='{$_SERVER['PHP_SELF']}?page=$next'>Next -></a> "; echo " "; echo " <a href='{$_SERVER['PHP_SELF']}?page=$last'>Last ->></a> "; } */

	// navigation
	$next = $page+1;
	$prev = $page-1;
	echo " <div class=\"topnav\" align=\"right\"> ";
	echo " <div class=\"numbers\"> $page <small>of</small> $last &nbsp;&nbsp; | &nbsp;&nbsp; ";
	if($page == 1){
		echo "Prev&nbsp;&nbsp;<a href='{$_SERVER['PHP_SELF']}?page=$next'>Next &raquo;</a> ";
	}
	else if ($page == $last) {
		echo "<a href='{$_SERVER['PHP_SELF']}?page=$prev'>&laquo; Prev</a>&nbsp;&nbsp Next";
	} else {
	echo " <a href='{$_SERVER['PHP_SELF']}?page=$prev'>&laquo; Prev</a>&nbsp;&nbsp; ";
	echo " <a href='{$_SERVER['PHP_SELF']}?page=$next'>Next ></a> ";
	}
	
	echo "</div></div>";
?>

<?php } ?>
</div>
</div><!--content-->
<?php include('../footer.php'); ?>
<?php 
//IF MEMBER	
} ?>










<!-- NOT LOGGED IN -->
<?php
if($_SESSION['is_loggedin'] != 'true'){
	?>
<?php include('../header.php'); ?>
<?php include('../sidebar.php'); ?>
<div id="content"><!--content-->
<div id="rightcontent">
 <h3> You are not logged in. Please login to view control panel.</h3>
</div>
</div><!--content-->
<?php include('../footer.php'); ?>
<?php } ?>
<!-- NOT LOGGED IN -->
	