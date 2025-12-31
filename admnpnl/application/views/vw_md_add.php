<style>
    .readonly{
        cursor: not-allowed;
        background-color: #eeeeee;
        opacity: 1;
    }
    .control-group{
        /*float: left;*/
    }
    .form-group{
        padding: 10px;
    }
</style>

<p style="margin-top:-34px;"><?php echo anchor("admin/mds", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

<h1 style="font-size: 20px; margin: 0; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>


<?php
if ($this->session->flashdata('message')){
	echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>'.$this->session->flashdata('message').'</div>';
}
?>

<?php
$attributes = array('id' => 'md_form','class'=>'form-inline');
echo form_open_multipart('admin/mds/addMD',$attributes);

echo "<div class='form-group'><label for='priority'>Priority</label></br>";
$data = array(	'name'=>'priority',
				'id'=>'priority',				
				'value'=>(isset($_POST['priority']) ? $_POST['priority'] : '' )
				);
echo form_input($data) ."</p>";
echo '<div class="errormessage">'.form_error('priority').'</div></div>';

echo "<div class='form-group'><label for='name'>Name</label></br>";
$data = array(	'name'=>'name',
				'id'=>'name',				
				'value'=>(isset($_POST['name']) ? $_POST['name'] : '' ),
                                'size'=> 35
				);
echo form_input($data) ."</p>";
echo '<div class="errormessage">'.form_error('name').'</div></div>'; 

echo "<div class='form-group'><label for='designation'>Designation</label></br>";
echo "<select name='designation' id='designation'> 
<option value=''>-select-</option>
<option value='ব্যবস্থাপনা পরিচালক'>ব্যবস্থাপনা পরিচালক</option>
<option value='ম্যানেজিং ডিরেক্টর এন্ড সিইও'>ম্যানেজিং ডিরেক্টর এন্ড সিইও</option>";
echo "</select></div>";

echo "<div class='form-group'><label for='duration'>Duration</label></br>";
$data = array(
				'name'=>'duration',
				'id'=>'duration',				
				'value'=>(isset($_POST['duration']) ? $_POST['duration'] : '' )				
				);
echo form_input($data) ."</p>";
echo '<div class="errormessage">'.form_error('duration').'</div></div>';

echo "<div class='form-group'><label for='image'>Image</label></br>";
$data = array(
				'name'=>'image',
				'id'=>'image',				
				'value'=>(isset($_POST['image']) ? $_POST['image'] : '' )				
				);
echo form_upload($data) ."</p>";
echo '<div class="errormessage">'.form_error('image').'</div></div>';

echo "<div class='form-group'><label for='bod_status'>Status</label></br>";
echo "<select name='status' id='status'> 
<option value='Active'>Active</option>
<option value='Inactive'>Inactive</option>";
echo "</select></div>";

$attributes = array(
					'name'=>'submit',
					'type'=>'submit',
					'id' => 'md_submit_d', 
					'value'=>'SUBMIT',
					'class'=>'btn btn-primary');
echo "<p class='clear'>".form_submit($attributes)."</p>";
echo form_close();

?>

