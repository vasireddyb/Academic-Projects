<?php  
session_start(); 
error_reporting(E_ALL ^ E_NOTICE);
include('../includes/connection.php');
include('../includes/functions.php');
?>

<?php
// IF ADMIN
if(is_admin()) {
?>

<?php include('admin-header.php'); ?>
<?php //include('admin-sidebar.php'); ?>
<div id="fullcontent"><!--content-->
<script type="text/javascript">

$(document).ready(function() {	
	// validate signup form on keyup and submit
	var validator = $("#categories").validate({
		rules: {			
			catname: {
					required: true				
				}
		},


		messages: {
			
			catname: {
				required: "*"
			}
		},
		// the errorPlacement has to take the table layout into account
		
		// specifying a submitHandler prevents the default submit, good for the demo
		
		// set this class to error-labels to indicate valid fields
	
	});
	
	// propose username by combining first- and lastname
	

});
</script>
<div id="rightcontent">
<form style="width:450px;float:left;" id="categories" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<fieldset>
<legend>Add a new Category</legend>
	<div class="field" style="width:400px;"><div class="label"><label>Name:</label></div><input id="name" class="form required" type="text" name="catname" /></div>
	<div class="field" style="width:400px;"><div class="label"><label>Parent:</label></div>
	<select name="category">
	<?php
	$query = "select * from categories where parent_id='0'";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
	{
	echo "<option value=\"".$row['cat_id']."\">".$row['cat_name']."\n  ";
	}
	?>
	</select>

	</div>
	<div class="field" style="width:400px;"><input type="submit" value="Add New Category" class="button"/></div>
	</fieldset>
</form>


<?php
$catname = $_POST['catname'];
$category = $_POST['category'];

if ($catname != null) {
$query = "INSERT INTO categories (parent_id, cat_name) VALUES ('$category', '$catname')";
mysql_query($query);
}

?>
<div style="float:left;width:470px; margin-left:20px;">
<fieldset>
	<legend>Categories</legend>

	<?php 

		$categories = "SELECT * from categories where parent_id='0' ORDER BY cat_name ASC";
		$results = mysql_query($categories);	

	?>

	<table class="users">
	<tbody>
	<tr style="color:#444;">
	<th>Name</th>
	
	</tr>
	<?php		
		while( $row1 = mysql_fetch_array($results) ) {
	?>
	<tr>
	
	<td>	
	<?php  
		
	
	$cat_id = $row1['cat_id'];
	echo $row1['cat_name']. "<br />";

	if($row1['cat_id'] != 0) {

		$subcategories = "SELECT * from categories where parent_id='$cat_id' ORDER BY cat_name ASC";
		$results1 = mysql_query($subcategories);

		

		if(!empty($results1)) {
			while( $row2 = mysql_fetch_array($results1)) {

			echo "- " . $row2['cat_name'] . "<br />";
		} 
	}

	}

	
	//if($row1['parent_id'] == 0) { echo $row1['cat_name']; } else if($row1['parent_id'] == $row1['cat_id']) { echo $row1['cat_name']; }?>
	</td>
	
		
	</tr>	
	<?php } ?>
	
	
	
	

	<tbody>
	</table>
	
</fieldset>
</div>

</div>
</div><!--content-->
<?php include('../footer.php'); ?>
<?php } 
//IF ADMIN
?>

<!-- NOT LOGGED IN -->
<?php if(!is_loggedin()) { include('notloggedin.php'); } ?>
<!-- NOT LOGGED IN -->	