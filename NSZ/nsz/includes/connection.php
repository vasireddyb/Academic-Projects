<?php 
// This is an example opendb.php
$conn = mysql_connect("localhost", "root", "") or die('Error connecting to mysql');
$dbname = "nsz";
mysql_select_db($dbname, $conn) or 
   die (mysql_errno().":<b> ".mysql_error()."</b>");
?>
