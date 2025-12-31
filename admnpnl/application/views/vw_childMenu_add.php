<style>
    .readonly{

        cursor: not-allowed;
        background-color: #eeeeee;
        opacity: 1;

    }
</style>

<p style="margin-top:-34px;"><?php echo anchor("admin/childMenu", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

<h1 style="font-size: 20px; margin: 0; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>


<?php
echo form_open('admin/childMenu/addChildMenu');

echo "<p><label for='childmenu_id'>Child Menu ID</label><br/>";
$data = array('name' => 'childmenu_id', 'id' => 'childmenu_id', 'size' => 25, 'readonly' => 'true', 'class' => 'readonly');
echo form_input($data) . "</p>";


echo "<p><label for='childmenu_parent'>Child Menu Parent</label><br/>";
echo "<select name='childmenu_parent' id='childmenu_parent'>";
echo'<option value="">Select</option>';
foreach ($cm as $row) {
    echo '<option value="' . $row->submenu_id . '">' . $row->submenu_id . '--' . $row->submenu_name . '</option>';
}
echo"</select>";

echo "<p><label for='childmenu_name'>Child Menu Name</label><br/>";
$data = array('name' => 'childmenu_name', 'id' => 'childmenu_name', 'size' => 25);
echo form_input($data) . "</p>";


echo "<p><label for='childmenu_url'>Child Menu URL</label><br/>";
$data = array('name' => 'childmenu_url', 'id' => 'childmenu_url', 'size' => 25);
echo form_input($data) . "</p>";


echo "<p><label for='childmenu_status'>Child Menu Status</label><br/>";
echo "<select name='childmenu_status' id='childmenu_status'> 
<option value=''>------------------------------</option>
<option value='Active'>Active</option>
<option value='Inactive'>Inactive</option>";
echo "</select></br></br>";

echo "<p><label for='childmenu_priority'>Child Menu Priority</label><br/>";
$data = array('name' => 'childmenu_priority', 'id' => 'childmenu_priority', 'size' => 25);
echo form_input($data) . "</p>";

echo "<p><label for='top_bar'>Top Menu Bar</label><br/>";
$data = array('name' => 'top_bar', 'id' => 'top_bar', 'size' => 25);
echo form_input($data) . "</p>";

echo form_submit('submit', 'SUBMIT','class="btn btn-primary"');
echo form_close();
?>