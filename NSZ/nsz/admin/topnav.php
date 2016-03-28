<?php
    if(is_member()){
	//Check if there is a page number
	if (!(isset($_GET['page'])))
	{
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$status = $_GET['status'];	
	if ($status=="all" || $status=="") {
	$data = "SELECT * from questions where username='$username' ORDER BY question_id DESC $max";
	} else { 
	$data = "SELECT * from questions where username='$username' and status='$status' ORDER BY question_id DESC $max;";
	}
	//$data = "SELECT * FROM questions";
	$result = mysql_query($data) or die(mysql_error());


	//check for number of rows
	$rows = mysql_num_rows($result);
	//set no. of rows to display per page
	if(isset($_GET['pagesize'])) { 
	$page_rows = $_GET['pagesize'];
	} else {
	$page_rows = 10;
	}
	//find last page number
	$last = ceil($rows/$page_rows);
	//this if statment will see that the page number is exact the max, not 1 below nor 1 above
	if ($page < 1)
	{
		$page =1;
	} elseif ($page > $last)
	{
		$page = $last;
	}

	$max = 'LIMIT ' .($page - 1) * $page_rows . ',' .$page_rows;	
	$i = (($page-1) * $page_rows)+1; // navigation
	
}



if (is_expert()){
	//Check if there is a page number
	if (!(isset($_GET['page'])))
	{
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$status = $_GET['status'];	
	if ($status=="all" || $status=="") {
	$data = "SELECT * from questions WHERE expert='$username' OR status='Open' ORDER BY question_id DESC $max";
	} else { 
	$data = "SELECT * from questions WHERE expert='$username' and status='$status' ORDER BY question_id DESC $max";
	}
	//$data = "SELECT * FROM questions";
	$result = mysql_query($data) or die(mysql_error());


	//check for number of rows
	$rows = mysql_num_rows($result);
	//set no. of rows to display per page
	if(isset($_GET['pagesize'])) { 
	$page_rows = $_GET['pagesize'];
	} else {
	$page_rows = 10;
	}
	//find last page number
	$last = ceil($rows/$page_rows);
	//this if statment will see that the page number is exact the max, not 1 below nor 1 above
	if ($page < 1)
	{
		$page =1;
	} elseif ($page > $last)
	{
		$page = $last;
	}

	$max = 'LIMIT ' .($page - 1) * $page_rows . ',' .$page_rows;	
	$i = (($page-1) * $page_rows)+1; // navigation
	
}


if (is_admin()){
	//Check if there is a page number
	if (!(isset($_GET['page'])))
	{
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	$status = $_GET['status'];	
	if ($status=="all" || $status=="") {
	$data = "SELECT * from questions ORDER BY question_id DESC $max";
	} else { 
	$data = "SELECT * from questions WHERE status='$status' ORDER BY question_id DESC $max";
	}
	//$data = "SELECT * FROM questions";
	$result = mysql_query($data) or die(mysql_error());


	//check for number of rows
	$rows = mysql_num_rows($result);
	//set no. of rows to display per page
	if(isset($_GET['pagesize'])) { 
	$page_rows = $_GET['pagesize'];
	} else {
	$page_rows = 10;
	}
	//find last page number
	$last = ceil($rows/$page_rows);
	//this if statment will see that the page number is exact the max, not 1 below nor 1 above
	if ($page < 1)
	{
		$page =1;
	} elseif ($page > $last)
	{
		$page = $last;
	}

	$max = 'LIMIT ' .($page - 1) * $page_rows . ',' .$page_rows;	
	$i = (($page-1) * $page_rows)+1; // navigation
	
}


	?>