<style>
    .readonly{

        cursor: not-allowed;
        background-color: #eeeeee;
        opacity: 1;

    }
</style>

<p style="margin-top:-34px;"><?php echo anchor("admin/subMenu", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

<h1 style="font-size: 20px; margin: 0; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>

<?php
echo form_open('admin/subMenu/addSubMenu');
echo "<p><label for='submenu_id'>Sub Menu ID</label><br/>";
$data = array('name' => 'submenu_id', 'id' => 'submenu_id', 'size' => 25, 'readonly' => 'true', 'class' => 'readonly');
echo form_input($data) . "</p>";

echo "<p><label for='submenu_parent'>Sub Menu Parent ID</label><br/>";
echo "<select name='submenu_parent' id='submenu_parent'>";
echo'<option value="">Select</option>';
foreach ($smdrp as $row) {
    echo '<option value="' . $row->mainmenu_id . '">' . $row->mainmenu_id . '--' . $row->name . '</option>';
}
echo"</select>";

echo "<p><label for='submenu_priority'>Sub Menu Priority</label><br/>";
$data = array('name' => 'submenu_priority', 'id' => 'submenu_priority', 'size' => 25);
echo form_input($data) . "</p>";

echo "<p><label for='submenu_name'>Sub Menu Name</label><br/>";
$data = array('name' => 'submenu_name', 'id' => 'submenu_name', 'size' => 25);
echo form_input($data) . "</p>";

echo "<p><label for='submenu_url'>Sub menu URL</label><br/>";
$data = array('name' => 'submenu_url', 'id' => 'submenu_url', 'size' => 25);
echo form_input($data) . "</p>";

echo "<p><label for='submenu_status'>Sub Menu Status</label><br/>";
echo "<select name='submenu_status' id='submenu_status'> 
    <option value='Active'>---------</option>
<option value='Active'>Active</option>
<option value='Inactive'>Inactive</option>";
echo "</select></br></br>";

echo form_submit('submit', 'SUBMIT','class="btn btn-primary"');
echo form_close();
?>