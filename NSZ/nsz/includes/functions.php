<?php

require('connection.php');

//MYSQL PREP FUNCTION
function mysql_prep($value) {
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists("mysql_real_escape_string");
		if ($new_enough_php) {
			if ($magic_quotes_active) { $value = stripslashes($value); }
			$value = mysql_real_escape_string($value);			
		} else {
			if(!magic_quotes_active) { $value = addslashes($value); }			
		}
		return $value;
	}


// PASSWORD ENCRYPTION
function eliteEncrypt($string) {
    // Create a salt
    $salt = md5($string."%*4!#$;\.k~'(_@");
   
    // Hash the string
    $string = md5("$salt$string$salt");
   
    return $string;
}

// IF USER IS LOGGED IN AND IS ADMIN
function is_admin() {
	$username = $_SESSION['username'];
	$usertype = $_SESSION['usertype'];
	if($_SESSION['is_loggedin'] == 'true' && $usertype == 1) {
		return true;
	} else { 
		return false;
	}
}


// IF USER IS LOGGED IN AND IS A MEMBER
function is_member() {
	$username = $_SESSION['username'];
	$usertype = $_SESSION['usertype'];
	if($_SESSION['is_loggedin'] == 'true' && $usertype == 2) {
		return true;
	} else { 
		return false;
	}
}

// IF USER IS LOGGED IN AND IS AN EXPERT
function is_expert() {
	$username = $_SESSION['username'];
	$usertype = $_SESSION['usertype'];
	if($_SESSION['is_loggedin'] == 'true' && $usertype == 3) {
		return true;
	} else { 
		return false;
	}
}


// CHECK IF USER IS LOGGED IN
function is_loggedin() { 
	if($_SESSION['is_loggedin'] == 'true') { return true; } else { return false; }
}



//DATE DIFFERENCE


  // Set timezone
  date_default_timezone_set("UTC");
 
  // Time format is UNIX timestamp or
  // PHP strtotime compatible strings
  function dateDiff($time1, $time2, $precision = 6) {
    // If not numeric then convert texts to unix timestamps
    if (!is_int($time1)) {
      $time1 = strtotime($time1);
    }
    if (!is_int($time2)) {
      $time2 = strtotime($time2);
    }
 
    // If time1 is bigger than time2
    // Then swap time1 and time2
    if ($time1 > $time2) {
      $ttime = $time1;
      $time1 = $time2;
      $time2 = $ttime;
    }
 
    // Set up intervals and diffs arrays
    $intervals = array('year','month','day','hour','minute','second');
    $diffs = array();
 
    // Loop thru all intervals
    foreach ($intervals as $interval) {
      // Set default diff to 0
      $diffs[$interval] = 0;
      // Create temp time from time1 and interval
      $ttime = strtotime("+1 " . $interval, $time1);
      // Loop until temp time is smaller than time2
      while ($time2 >= $ttime) {
	$time1 = $ttime;
	$diffs[$interval]++;
	// Create new temp time from time1 and interval
	$ttime = strtotime("+1 " . $interval, $time1);
      }
    }
 
    $count = 0;
    $times = array();
    // Loop thru all diffs
    foreach ($diffs as $interval => $value) {
      // Break if we have needed precission
      if ($count >= $precision) {
	break;
      }
      // Add value and interval 
      // if value is bigger than 0
      if ($value > 0) {
	// Add s if value is not 1
	if ($value != 1) {
	  $interval .= "s";
	}
	// Add value and interval to times array
	$times[] = $value . " " . $interval;
	$count++;
      }
    }
 
    // Return string with times
    return implode(", ", $times);
  }
 



function getField($field, $tbl_name, $condition = 1)
{
	$result = mysql_query("SELECT $field FROM $tbl_name WHERE $condition");
	return @mysql_result($result, 0);
}


function getCurrentUserTime(){

	$username = $_SESSION['username'];

	$timezonequery = mysql_query("SELECT timezone from users where username='$username'");

	$gettimezone = mysql_fetch_array($timezonequery);

	$timezone = $gettimezone['timezone'];

	$today = getdate();
	$wday = $today['mday'];
	$month = $today['mon'];
	$year = $today['year'];
	$hours = $today['hours'];
	$minutes = $today['minutes'];
	$seconds = $today['seconds'];

	// this is gmt time regardless of what the server is set to..
	$postedtime = $year . "-" . $month . "-" . $wday . " " . $hours . ":" . $minutes . ":" . $seconds;
    $timestamp = strtotime($postedtime);

	$dtzone = new DateTimeZone($timezone);
	$dtime = new DateTime();
	$dtime->setTimestamp($timestamp);
	$dtime->setTimeZone($dtzone);
	$time = $dtime->format('Y-m-d');

	return $time;

}


?> 