<?php
	// navigation
	$next = $page+1;
	$prev = $page-1;
	if($page==1 && $last==1) { $new= 1; } else if($page == 1 && $last != 1) { $new = 0; }
	echo " <div class=\"topnav\" align=\"right\"> ";
	if($new == 0) {
	echo " <div class=\"numbers\"> $page <small>of</small> $last &nbsp;&nbsp; | &nbsp;&nbsp; ";
	} else if($new == 1) {
	echo " <div class=\"numbers\">";
	}
	
	

	if($new == 0){
		echo "Prev&nbsp;&nbsp;<a href='{$_SERVER['PHP_SELF']}?page=$next&status=$status&pagesize=$pagesize'>Next &raquo;</a> ";
	} else if($new == 1){
		echo "";
	}

	else if ($page == $last) {		 
		echo "<a href='{$_SERVER['PHP_SELF']}?page=$prev&status=$status&pagesize=$pagesize'>&laquo; Prev</a>&nbsp;&nbsp Next";
	} else {
	echo " <a href='{$_SERVER['PHP_SELF']}?page=$prev&status=$status&pagesize=$pagesize'>&laquo; Prev</a>&nbsp;&nbsp; ";
	echo " <a href='{$_SERVER['PHP_SELF']}?page=$next&status=$status&pagesize=$pagesize'>Next ></a> ";
	}
	
	echo "</div></div>";
?>
