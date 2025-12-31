<style>
    .readonly{

        cursor: not-allowed;
        background-color: #eeeeee;
        opacity: 1;

    }
</style>

<p style="margin-top:-34px;"><?php echo anchor("admin/mainMenu", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

<h1 style="font-size: 20px; margin: 0; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>


<?php
echo form_open('admin/mainMenu/addMainMenu');
echo "<p><label for='id'>ID</label><br/>";
$data = array('name' => 'mainmenu_id', 'id' => 'mainmenu_id', 'size' => 25, 'readonly' => 'true', 'class' => 'readonly');
echo form_input($data) . "</p>";

echo "<p><label for='parent'>Parent ID</label><br/>";
$data = array('name' => 'parent', 'id' => 'parent', 'size' => 25);
echo form_input($data) . "</p>";

echo "<p><label for='priority'>Priority</label><br/>";
$data = array('name' => 'priority', 'id' => 'priority', 'size' => 25);
echo form_input($data) . "</p>";

echo "<p><label for='name'>Name</label><br/>";
$data = array('name' => 'name', 'id' => 'name', 'size' => 25);
echo form_input($data) . "</p>";

echo "<p><label for='url'>URL</label><br/>";
$data = array('name' => 'url', 'id' => 'url', 'size' => 25);
echo form_input($data) . "</p>";

echo "<p><label for='status'>Status</label><br/>";
echo "<select name='status' id='tatus'>
    <option value=''>---</option>
<option value='Active'>Active</option>
<option value='Inactive'>Inactive</option>";
echo "</select></br></br>";

echo form_submit('submit', 'SUBMIT','class="btn btn-primary"');
echo form_close();
?>