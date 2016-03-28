<?php  
session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
include('../includes/connection.php');
include('../includes/functions.php');
?>

<?php
// IF ADMIN
	$username = $_SESSION['username'];
	$result1 = mysql_query("SELECT usertype from users WHERE username = '$username';");
	$row1 = mysql_fetch_array($result1);
	$usertype = $row1['usertype'];
	//echo $usertype;
	if($_SESSION['is_loggedin'] == 'true' && $usertype == 1){	
?>

<?php include('admin-header.php'); ?>
<?php //include('admin-sidebar.php'); ?>
<div id="fullcontent"><!--content-->
<div id="rightcontent">
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="users">
<tbody>
<tr style="color:#444;">
<th>Name</th>
<th>Username</th>
<th>E-mail</th>
<th>Mobile</th>
<th>Country</th>
</tr>

<?php 

	$result = mysql_query("SELECT * from users WHERE usertype='2'");
	while( $row2= mysql_fetch_array($result)) { ?>
<tr>
	    <td style="width:20%;"><a href="member_details.php?username=<?php echo $row2['name']; ?>"><?php echo $row2['name'] ?></a></td>
   	    <td style="width:20%;"><?php echo $row2['username'] ?></td>
		<td style="width:40%;"><?php echo $row2['email'] ?></td>
		<td style="width:20%;"><?php echo $row2['mobile'] ?></td>
		<td style="width:20%;"><?php echo $row2['country'] ?></td>
</tr>

<?php } ?>

</tbody>
</table>


</div>
</div><!--content-->
<?php include('../footer.php'); ?>
<?php 
	} 
// IF ADMIN
 ?>



<!-- NOT LOGGED IN -->
<?php if(!is_loggedin()) { include('notloggedin.php'); } ?>
<!-- NOT LOGGED IN -->	