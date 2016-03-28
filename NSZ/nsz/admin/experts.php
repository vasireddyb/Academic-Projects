<?php  
session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
include('../includes/connection.php');
require('../includes/functions.php');
?>


<?php 
// IF ADMIN
if(is_admin()) { ?>
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
<th>Expertise</th>
<th>Mobile</th>
<th>Status</th>
</tr>


<?php 

	$result = mysql_query("SELECT * from users WHERE usertype='3'");
	while( $row2= mysql_fetch_array($result)) { ?>
<tr>
	    <td style="width:20%;"><?php echo $row2['name'] ?></td>
   	    <td style="width:20%;"><?php echo $row2['username'] ?></td>
		<td style="width:40%;"><?php echo $row2['email'] ?></td>
		<td style="width:40%;"><?php echo $row2['expertisein'] ?></td>
		<td style="width:20%;"><?php echo $row2['mobile'] ?></td>		
		<td style="width:20%;"><?php if($row2['active'] == 0) { echo "<a href='activate-expert.php?activate={$row2['username']}'>Activate</a>"; } else { echo "<a href='deactivate-expert.php?deactivate={$row2['username']}'>Deactivate</a>"; } ?></td>
</tr>

<?php } ?>

</tbody>
</table>


</div>
</div><!--content-->
<?php include('../footer.php'); ?>
<?php } 
// IF ADMIN
?>


<!-- NOT LOGGED IN -->
<?php if(!is_loggedin()) { include('notloggedin.php'); } ?>
<!-- NOT LOGGED IN -->