<div id="perpage" style="float:right;">
<ul class="menu">
<li><a href="?status=<?php echo $status; ?>&pagesize=10">10</a></li>
<li><a href="?status=<?php echo $status; ?>&pagesize=25">25</a></li>
<li><a href="?status=<?php echo $status; ?>&pagesize=50">50</a></li>
<li><a href="?status=<?php echo $status; ?>&pagesize=75">75</a></li>
</ul>
</div>
<!-- TABS -->
<ul class="menu">
			<?php if(is_admin()) { ?>
			<li id="all" <?php if($status=="" || $status=="all") { ?> class="active" <?php } ?>><a href="?status=all">All</a></li>
			<li id="new"<?php if($status=="new") { ?> class="active" <?php } ?>><a href="?status=new">New</a></li>
			<li id="open"<?php if($status=="open") { ?> class="active" <?php } ?>><a href="?status=open">Open</a></li>
			<li id="assigned"<?php if($status=="assigned") { ?> class="active" <?php } ?>><a href="?status=assigned">Assigned</a></li>
			<li id="pending"<?php if($status=="pending") { ?> class="active" <?php } ?>><a href="?status=pending">Payment Pending</a></li>
			<li id="cancelled"<?php if($status=="dropped") { ?> class="active" <?php } ?>><a href="?status=dropped">Cancelled</a></li>
			<li id="cancelled"<?php if($status=="completed") { ?> class="active" <?php } ?>><a href="?status=completed">Completed</a></li>
			<?php if (is_admin() || is_expert()) { ?>
			<li id="cancelled"<?php if($status=="closed") { ?> class="active" <?php } ?>><a href="?status=closed">Closed</a></li>
			<?php } ?>
			<?php } ?>
			<?php if(is_member()) { ?>
			<li id="New"<?php if($status=="new") { ?> class="active" <?php } ?>><a href="?status=new">New</a></li>
			<li id="pending"<?php if($status=="pending") { ?> class="active" <?php } ?>><a href="?status=pending">Pending</a></li>
			<li id="cancelled"<?php if($status=="completed") { ?> class="active" <?php } ?>><a href="?status=completed">Completed</a></li>
			<?php } ?>
			
</ul>
<span class="clear"></span>
