	<!--<ul>
	<li><b><?php //echo anchor("admin/deposit/","Manage Deposits");?>.</b>
	</li>
	<li><b><?php //echo anchor("admin/pages/","Manage Pages");?>.</b>
	</li>
	<li><b><?php //echo anchor("admin/uploads/","Manage Files");?>.</b>
	</li>
	<li><b><?php //echo anchor("admin/admins/","Manage Users");?>.</b>
	</li>
	<li><b><?php //echo anchor("admin/dashboard/logout/","Logout");?>.</b>
	</li>
	</ul>-->
	
	<h1><div id="admin_index_content">
			
			<?php
			echo "Welcome! ".$_SESSION['department'];
			?>
			
   </div></h1>
	<?php 
		
		
		/*echo form_open('admin/dashboard/build_site');
		echo form_submit('submit', 'build site now!');
		echo form_close();
		
		echo "<br/><br/>";
	
		if (isset($_SESSION['target_ready']) && $_SESSION['target_ready'] == true){
		  echo '<a href='.target_url().' target="_blank">see site</a>';
		}*/

	?>

</div>