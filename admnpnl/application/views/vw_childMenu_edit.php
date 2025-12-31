<p><?php echo anchor("admin/childMenu/index",'<fa class="fa fa-home" aria-hidden="true"></fa> Child Menu Home','class="btn btn-primary"'); ?></p>

<?php
echo form_open('admin/childMenu/edit');
echo "<p><label for='childmenu_id'>Child Menu ID</label><br/>";
$data = array('name'=>'childmenu_id','id'=>'childmenu_id','size'=>25, 'value' => $cm['childmenu_id']);
echo form_input($data) ."</p>";

echo "<p><label for='childmenu_parent'>Child Menu Parent</label><br/>";
$data = array('name'=>'childmenu_parent','id'=>'childmenu_parent','size'=>25, 'value' => $cm['childmenu_parent']);
echo form_input($data) ."</p>";

echo "<p><label for='childmenu_name'>Child Menu Name</label><br/>";
$data = array('name'=>'childmenu_name','id'=>'childmenu_name','size'=>25, 'value' => $cm['childmenu_name']);
echo form_input($data) ."</p>";

echo "<p><label for='childmenu_url'>Child Menu URL</label><br/>";
$data = array('name'=>'childmenu_url','id'=>'childmenu_url','size'=>25, 'value' => $cm['childmenu_url']);
echo form_input($data) ."</p>";

echo "<p><label for='childmenu_status'>Child Menu Status</label><br/>";
$options = array('Active' => 'Active', 'Inactive' => 'Inactive');
echo form_dropdown('childmenu_status',$options, $cm['childmenu_status']) ."</p>";

echo "<p><label for='top_bar'>Top Menu Bar</label><br/>";
$data = array('name'=>'top_bar','id'=>'top_bar','size'=>25, 'value' => $cm['top_bar']);
echo form_input($data) ."</p>";

echo "<p><label for='childmenu_priority'>Chil Menu Priority</label><br/>";
$data = array('name'=>'childmenu_priority','id'=>'childmenu_priority','size'=>25,'value' => $cm['childmenu_priority']);
echo form_input($data) ."</p>";


echo form_submit('submit','SUBMIT','class="btn btn-primary"');
echo form_close();
?>