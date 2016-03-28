<?php
include('includes/connection.php');
include('includes/functions.php');
?>

<?php

	$username = $_POST['username'];
	$status = $_POST['status'];




	if($status == "All") {
		if($username == "admin") { 
	    $q =  mysql_query("SELECT question_id,title,duedate, price, payment, status FROM questions");
		}

		else { 
		$q =  mysql_query("SELECT question_id,title,duedate, price, payment, status FROM questions WHERE username='$username'");
		}
		

	} else {

	if($username == "admin") { 

	  $q =  mysql_query("SELECT question_id,title,duedate, price, payment, status FROM questions WHERE status='$status'");

	} else {

		$q =  mysql_query("SELECT question_id,title,duedate, price, payment, status FROM questions WHERE username='$username' and status='$status'");

	}


	}

          while($e=mysql_fetch_assoc($q))

                  $output[]=$e;

               print(json_encode($output));
?>