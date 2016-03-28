<?php
ob_start();
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require('includes/functions.php');
?>
<?php
if(is_loggedin()) { header( 'Location: admin/index.php') ; }
include('header.php');
?>

<?php include('sidebar.php'); ?>
<div id="content"><!--content-->
<div id="rightcontent"><!-- RIGHTCONTENT-->

<div id="login">

<div class="error"></div>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

<?php if(isset($_POST['username']) || isset($_POST['password'])) { echo $error; } ?>
<fieldset style="border:none; padding:50px 100px; margin:0 auto;">

<div class="field" style="padding-top:15px; padding-bottom:15px;"><div style="width:75px;" class="label"><label>Username:</label></div><input id="username" class="required form" type="text" name="username" /></div>
<div class="field"><div style="width:75px;" class="label"><label>Password:</label></div><input id="password" class="required form" type="password" name="password" /></div>

<div class="submit"><input type="submit" value="Login" class="button" onclick="validateLogin(); return false;" /></div>
</fieldset>

</form>
</div>

</div> <!-- RIGHTCONTENT-->
</div><!--content-->
<?php include('footer.php'); ?>
<?php ob_flush(); ?> 