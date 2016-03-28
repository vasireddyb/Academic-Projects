<?php
require('connection.php');
$valid = "true";
$request = trim(strtolower($_REQUEST['username']));
$result = mysql_query("SELECT * FROM users WHERE username = '$request'");
$num = mysql_num_rows($result);
if ($num > 0) {
$valid = "false";
}
echo $valid;
?>