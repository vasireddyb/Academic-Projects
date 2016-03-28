<?php
ob_start();  
session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
include('../includes/connection.php');
require('../includes/functions.php');
$url = getenv('HTTP_REFERER');
?>

<!-- IF ADMIN -->
<?php if(is_admin()) { ?>
<?php include('admin-header.php'); ?>
<?php //include('admin-sidebar.php'); ?>
<div id="content"><!--content-->
<div id="rightcontent">
<?php
    $checkresult = mysql_query("SELECT * from users WHERE usertype='3' and active='1'");
	$row = mysql_fetch_array($checkresult);
	if(empty($row)) { echo "Sorry, No active experts found !"; } else { 
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="users">
<tbody>
<tr style="color:#444;">
<th></th>
<th>Name</th>
<th>Username</th>
<th>Expertise</th>
<th>E-mail</th>
<th>Mobile</th>
</tr>
<?php
   $result = mysql_query("SELECT * from users WHERE usertype='3' and active='1'");
	while( $row2= mysql_fetch_array($result)) { ?>
<tr>
	    <td style="width:3%;"><input type="radio" name="assign" value="<?php echo $row2['username']; ?>"/><input type="hidden" name="qno" value="<?php echo $_GET['qno']; ?>" /><input type="hidden" name="page" value="<?php echo $_GET['page']; ?>" /></td>
		<td style="width:20%;"><?php echo $row2['name'] ?></td>
   	    <td style="width:20%;"><?php echo $row2['username'] ?></td>
     	<td style="width:20%;"><?php echo $row2['expertisein'] ?></td>
		<td style="width:40%;"><?php echo $row2['email'] ?></td>
		<td style="width:17%;"><?php echo $row2['mobile'] ?></td>		
</tr>


<?php } ?>

</tbody>
</table>
<div id="submit"> <input type="submit" value="Assign !" class="button"/> </div>
</form>
<?php } ?>

<?php
	$assignuser = $_POST['assign'];	
	$qno = $_POST['qno'];
	$page = $_POST['page'];
	$query = "UPDATE questions set expert='$assignuser', status='Assigned' where question_id='$qno'";
	mysql_query($query);
	if (isset($_POST['qno'])) {
	$referer = $_SERVER['HTTP_REFERER'];
	header( 'Location: index.php?page=' . $page ) ;

	}
	
	?>
</div>
</div><!--content-->
<?php include('../footer.php'); ?>
<?php } ob_flush(); ?>
<!-- IF ADMIN -->

<!-- NOT LOGGED IN -->
<?php if(!is_loggedin()) { include('notloggedin.php'); } ?>
<!-- NOT LOGGED IN -->