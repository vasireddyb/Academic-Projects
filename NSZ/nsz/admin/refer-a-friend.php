<?php  
session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
require('../includes/functions.php');
if($_SESSION['is_loggedin'] == 'true'){	
?>
<?php include('admin-header.php'); ?>
<?php //include('sidebar.php'); ?>
<div id="content">
<noscript>Please Enable Javascript to register</noscript>
<?php 
	
	if(isset($_POST['emails']) && isset($_POST['message'])) {

		$name = $_POST['name'];
		$email = $_POST['email'];
		$referral_id = rand();
		$referredby = $_SESSION['username'];
		$subject = $_POST['subject'];
		$referrals = mysql_prep($_POST['emails']);
		$message = $_POST['message'];

		$query = "INSERT INTO referrals (referral_id, referredby, referrals) values ('$referral_id', '$referredby', '$referrals')";

		mysql_query($query);

		//$array = explode(',', $referrals);		

		include('../mails/refer-a-friend-mail.php');


		

		
	}
?>
<form id="reg" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<fieldset>
<legend> Refer a friend..! </legend>

<p>Please fill the form below to send information about NSZ to your friend. This form will automatically send an email to your friend about NSZ. Complete the form below and click on the 'Send to Friend' button when you are ready.</p><br />
	<div class="field"><div class="label"><label>Name:</label></div><input type="text" /></div>
	<div class="field"><div class="label"><label>Email ID:</label></div><input id="email" class="form" type="text" /></div>
	<div class="field"><div class="label"><label>Subject:</label></div><input id="subject" class="form" type="text" name="subject" /></div>
	<div class="field"><div class="label"><label>List Your Friend(s) Email:</label></div><textarea name="emails" rows="5" cols="40" id="emails"> </textarea></div>	
	<div class="field"><div class="label"><label>Message:</label></div><textarea name="message" id="message" rows="5" cols="40"> </textarea></div>
	<input type="hidden" name="usertype" value="2" />
</fieldset><br/>

<div class="field" style="text-align:center;"><input type="submit" value="Refer Now" class="button"/></div>

</form>
</div>
<?php include('../footer.php'); ?>
<?php } ?>

<!-- NOT LOGGED IN -->
<?php if(!is_loggedin()) { include('notloggedin.php'); } ?>
<!-- NOT LOGGED IN -->	
	
	