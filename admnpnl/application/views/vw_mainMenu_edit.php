<p><?php echo anchor("admin/mainMenu/index",'<fa class="fa fa-home" aria-hidden="true"></fa> Main Menu Home','class="btn btn-primary"'); ?></p>

<?php
echo form_open('admin/mainMenu/edit');
echo "<p><label for='mainmenu_id'>ID</label><br/>";
$data = array('name'=>'mainmenu_id','id'=>'mainmenu_id','size'=>25, 'value' => $mm['mainmenu_id']);
echo form_input($data) ."</p>";

echo "<p><label for='parent'>Parent ID</label><br/>";
$data = array('name'=>'parent','id'=>'parent','size'=>25, 'value' => $mm['parent']);
echo form_input($data) ."</p>";

echo "<p><label for='priority'>Priority</label><br/>";
$data = array('name'=>'priority','id'=>'priority','size'=>25,'value' => $mm['priority']);
echo form_input($data) ."</p>";

echo "<p><label for='name'>Name</label><br/>";
$data = array('name'=>'name','id'=>'name','size'=>25, 'value' => $mm['name']);
echo form_input($data) ."</p>";

echo "<p><label for='url'>URL</label><br/>";
$data = array('name'=>'url','id'=>'url','size'=>25, 'value' => $mm['url']);
echo form_input($data) ."</p>";

echo "<p><label for='status'>Status</label><br/>";
$options = array('Active' => 'Active', 'Inactive' => 'Inactive');
echo form_dropdown('status',$options, $mm['status']) ."</p>";

//unset($categories[$category['id']]);
//echo "<p><label for='parent'>Category Parent</label><br/>";
//echo form_dropdown('parentid',$categories,$category['parentid']) ."</p>";

//echo form_hidden('hmenu_category_id',$category['hmenu_category_id']);
echo form_submit('submit','SUBMIT','class="btn btn-primary"');
echo form_close();
?>