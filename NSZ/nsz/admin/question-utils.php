<div style="float:left;clear:left;margin-top:20px;" class="questionutils">

<?php if(is_member() || is_expert()) { ?>
<a class="bluebutton" style="padding-top:4px; padding-bottom:4px;color:#fff;margin-right:10px;" href="#" onclick="toggleAdminComment(); return false;" >Message to  Admin</a>
<?php } ?>


<a class="bluebutton" style="padding-top:4px; padding-bottom:4px;color:#fff;margin-right:10px;" href="#" onclick="toggleComment(); return false;">Post a Comment!</a>


<?php if(is_admin()) {?>
<a class="bluebutton" style="padding-top:4px; padding-bottom:4px;color:#fff;margin-right:10px;" href="#" onclick="toggleAdminComment(); return false;" >Post a note to Myself</a>
<?php } ?>

<?php if(is_admin()) {?>
<a class="bluebutton" style="padding-top:4px; padding-bottom:4px;color:#fff;margin-right:10px;" href="#" onclick="toggleAdminComment(); return false;" >Message to Expert</a>
<?php } ?>

<?php if(is_admin()) {?>
<a class="bluebutton" style="padding-top:4px; padding-bottom:4px;color:#fff;margin-right:10px;" href="#" onclick="toggleAdminComment(); return false;" >Message to Superadmin</a><br /><br />
<?php } ?>

<?php if($row['status']!= 'Dropped') { ?>
<?php if(is_member() || is_admin()) { ?>
<a href="cancel-question.php?qno=<?php echo $qno; ?>" class="redbutton" style="padding-top:4px; padding-bottom:4px;color:#fff;margin-right:10px;">Cancel Question</a>
<?php } ?>
<?php } else { ?>
<a href="reopen-question.php?qno=<?php echo $qno; ?>" class="greenbutton" style="padding-top:4px; padding-bottom:4px;color:#fff;margin-right:10px;">Reopen Question</a>
<?php } ?>





<?php if(is_expert()) { ?>
<a id="toggleAnswer" class="greenbutton" style="padding-top:4px; padding-bottom:4px;color:#fff;margin-right:10px;"  href="javascript:toggleAnswer();">Answer the Question..!</a>
<?php } ?>	


</div>

