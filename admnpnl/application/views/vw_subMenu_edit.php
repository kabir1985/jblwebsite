
<p><?php echo anchor("admin/subMenu/index",'<fa class="fa fa-home" aria-hidden="true"></fa> Sub Menu Home','class="btn btn-primary"'); ?></p>
<?php
echo form_open('admin/subMenu/edit');
echo "<p><label for='submenu_id'>Sub Menu ID</label><br/>";
$data = array('name'=>'submenu_id','id'=>'submenu_id','size'=>25, 'value' => $sm['submenu_id']);
echo form_input($data) ."</p>";

echo "<p><label for='submenu_parent'>Sub Menu Parent ID</label><br/>";
$data = array('name'=>'submenu_parent','id'=>'submenu_parent','size'=>25, 'value' => $sm['submenu_parent']);
echo form_input($data) ."</p>";

echo "<p><label for='submenu_priority'>Sub Menu Priority</label><br/>";
$data = array('name'=>'submenu_priority','id'=>'submenu_priority','size'=>25,'value' => $sm['submenu_priority']);
echo form_input($data) ."</p>";

echo "<p><label for='submenu_name'>Sub Menu Name</label><br/>";
$data = array('name'=>'submenu_name','id'=>'submenu_name','size'=>25, 'value' => $sm['submenu_name']);
echo form_input($data) ."</p>";

echo "<p><label for='submenu_url'>Sub Menu URL</label><br/>";
$data = array('name'=>'submenu_url','id'=>'submenu_url','size'=>25, 'value' => $sm['submenu_url']);
echo form_input($data) ."</p>";

echo "<p><label for='submenu_status'>Sub Menu Status</label><br/>";
$options = array('Active' => 'Active', 'Inactive' => 'Inactive');
echo form_dropdown('submenu_status',$options, $sm['submenu_status']) ."</p>";

echo form_submit('submit','SUBMIT','class="btn btn-primary"');
echo form_close();
?>