<!--h1><?php echo $title;?></h1-->
<?php
if ($this->session->flashdata('message')){
	echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>'.$this->session->flashdata('message').'</div>';
}
?>

<?php

if (count($admins)){

	echo "<table  class='table table-striped table-bordered bootstrap-datatable datatable'>";// class="table table-striped table-bordered bootstrap-datatable datatable"
	echo "<thead><tr>";
	echo "<th>ID</th>
		  <th>User Name</th>
		  <th>Department</th>
		  <th>User Group</th>
		  <th>Status</th>
		  <th>Actions</th>";
	echo "</tr></thead>";
	foreach ($admins as $key => $list){
			
		echo "<tr>";
		echo "<td>".$list['id']."</td>";
		echo "<td>".$list['username']."</td>";
		echo "<td>".$list['department']."</td>";
		echo "<td>".$list['user_group']."</td>";
		echo "<td align='center'>".$list['status']."</td>";
		
		echo '<td  class="center">'.anchor('admin/card_mgt/edit/'.$list['id'],'<i class="icon-edit icon-white"></i> Update/Manage Password','class="btn btn-info"').' </td>';
				   	
	
		/*echo anchor('admin/admins/edit/'.$list['id'],'edit');
		echo " | ";
		echo anchor('admin/admins/delete/'.$list['id'],'delete','class="delete"');*/
		//echo '<a href="'.base_url().'index.php/admin/admins/delete/'.$list['id'].'" onclick=" return confirm("Are you sure to delete this user record?");" >delete</a>';
		
		echo "</tr>";
		
	}
	echo "</table>";
}
?>
<script type="text/javascript">
$('.delete').click(function(){
  var answer = confirm('Delete user');
  return answer; // answer is a boolean
});  

</script>