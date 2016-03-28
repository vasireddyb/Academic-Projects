<!-- ANSWERS -->
<fieldset>
<legend> Answers </legend>
<?php

	$qid = $_GET['qno'];

	$query = "SELECT * FROM REPLIES WHERE question_id='$qid' AND type='1' AND (username='$username' OR visibility = '1' OR visibility = '2')";

	$result = mysql_query($query);

	$row = mysql_fetch_array($result);

	if(empty($row)) { echo "No Answers Found!"; } else {	
    
	$query1 = "SELECT * FROM REPLIES WHERE question_id='$qid' AND type='1' AND (username='$username' OR visibility = '1' OR visibility = '2')";	

	$result1 = mysql_query($query1);

		while($row1 = mysql_fetch_array($result1)) { ?>
			
			<div class="comment">
			<div class="commenthead">
			<div style="width:50%; float:left;">
			<?php echo $row1['subject']; ?>
			</div>
			<div style="width:50%; float:right;text-align:right;">
			By <b style="color:#809bae"><?php echo $row1['username']; ?></b> on 
			<b style="color:#809bae"><?php echo $row1['postedtime']; ?></b>
			</div>			
			</div>
			
			<div class="commenttext">
			<?php if($row1['note'] != "" || $row1['note'] != null) { ?>
			<?php 
				echo $row1['note'];
			?>
			<?php } ?>
		<br />
			<div class="field"><div class="label"><label>Attachments:</label></div><div class="qinputext"><a href="<?php echo "uploads/" . $row1['att1']; ?>"><?php echo $row1['att1']; ?></a><br /><a href="<?php echo "uploads/" . $row1['att2']; ?>"><?php echo $row['att2']; ?></a><br /><a href="<?php echo "uploads/" . $row1['att3']; ?>"><?php echo $row1['att3']; ?></a></div></div>
			</div>

			</div>

<?php
		}

	}
?>
</fieldset>
<!-- ANSWERS -->











<div id="toggleCommentText">
<form enctype="multipart/form-data" id="postcomment" action="postcomment.php" method="POST">
<fieldset >
<legend> Add more notes for clarifications</legend>
<div class="field"><div class="label"><label>Type</label></div>
	<input type="radio" name="type" value="0" /> Comment
	<input type="radio" checked="checked" name="type" value="1" /> Answer
</div>
	<div class="field"><div class="label"><label>Subject</label></div><input id="subject" class="form required" type="text" name="subject" style="width:300px;" /></div>
	<div class="field"><div class="label"><label>Note:</label></div><textarea id="note" class="form" type="text" name="note" style="width:300px; height:150px;"> </textarea></div>
	<div class="field"><div class="label"><label>Choose a file to upload:</label></div><input id="email" class="form" type="file" name="uploadedfile" style="width:300px;" /></div>
	<div class="field"><div class="label"><label>Choose a file to upload:</label></div><input id="email" class="form" type="file" name="uploadedfile1" style="width:300px;" /></div>
	<div class="field"><div class="label"><label>Choose a file to upload:</label></div><input id="email" class="form " type="file" name="uploadedfile2" style="width:300px;" /><input type="hidden" name="qno" value="<?php echo $_GET['qno']; ?>" /></div>
	<div class="field"><div class="label"><label>Note to</label></div>
	<input type="radio" name="visibility" value="1" /> Everbody
	<input type="radio" checked="checked" name="visibility" value="4" /> Admin
</div>

     <div class="field"><input id="submit" class="button" type="submit" value="Post a Comment"  /></div>
</fieldset>
</form>
</div>


















<!-- COMMENTS -->
<fieldset>
<legend> Comments </legend>
<?php

	$query = "SELECT * FROM REPLIES WHERE question_id='$qid' AND type='0' AND (username='$username' OR visibility = '1' OR visibility = '2')";

	$result = mysql_query($query);

	$row = mysql_fetch_array($result);

	if(empty($row)) { echo "No Comments Found!"; } else {	
    
	$query1 = "SELECT * FROM REPLIES WHERE question_id='$qid' AND type='0' AND (username='$username' OR visibility = '1' OR visibility = '2')";	

	$result1 = mysql_query($query1);

		while($row1 = mysql_fetch_array($result1)) { ?>
			
			<div class="comment">
			<div class="commenthead">
			<div style="width:50%; float:left;">
			<?php echo $row1['subject']; ?>
			</div>
			<div style="width:50%; float:right;text-align:right;">
			By <b style="color:#809bae"><?php echo $row1['username']; ?></b> on 
			<b style="color:#809bae"><?php echo $row1['postedtime']; ?></b>
			</div>			
			</div>
			
			<div class="commenttext">
			<?php if($row1['note'] != "" || $row1['note'] != null) { ?>
			<?php 
				echo $row1['note'];
			?>
			<?php } ?>
			<br />
			<?php if($row1['att1'] != "" || $row1['att2'] != "" || $row1['att3'] != "") { ?>
			<div class="field"><div class="label"><label>Attachments:</label></div><div class="qinputext"><a href="<?php echo "uploads/" . $row1['att1']; ?>"><?php echo $row1['att1']; ?></a><br /><a href="<?php echo "uploads/" . $row1['att2']; ?>"><?php echo $row['att2']; ?></a><br /><a href="<?php echo "uploads/" . $row1['att3']; ?>"><?php echo $row1['att3']; ?></a></div></div>
			</div>
			<?php } ?>

			</div>

<?php
		}

	}
?>
</fieldset>
<!-- COMMENTS -->