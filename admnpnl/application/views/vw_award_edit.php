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
  
<p style="margin-top:-34px;"><?php echo anchor("admin/awards", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>


<?php
$attributes = array("id" => "award_form","class"=>"form-inline");
echo form_open_multipart("admin/awards/edit",$attributes);

echo "<div class='form-group'><label for='award_title'>Title</label></br>";
$data = array(	'name'=>'award_title',
				'id'=>'title',				
				'rows'=>2, 
                                'cols'=>35,
				'value' => $award['award_title']);
echo form_textarea($data)."</div>";

echo "<div class='form-group'><label for='award_description'>Description</label></br>";
$data = array(	'name'=>'award_description',
				'id'=>'title',				
				'rows'=>2, 
                                'cols'=>43,
				'value' => $award['award_description']);
echo form_textarea($data)."</div>";

echo "<div class='form-group'><label for='award_receive_date'>Award Received Date</label></br>";
$data = array(	'name'=>'award_receive_date',
				'id'=>'datepicker',
                                'class'=>'datepicker',
				'value' => $award['award_receive_date']);
echo form_input($data)."</div>";

echo "<div class='form-group'><label for='award_image'>Award Image</label></br>";
$data = array('name'=>'award_image',
              'id'=>'award_image');
echo form_upload($data)."Current file: ". $award['award_image']."</div>";

echo "<div class='form-group'><label for='award_status'>Status</label>";
$options = array('Active' => 'Active', 
               'Inactive' => 'Inactive');
echo form_dropdown('award_status',$options, $award['award_status']) ."</div>";

echo form_hidden("award_id",$award["award_id"]);
echo '<p class="clear">'.form_submit("submit","SUBMIT", 'class="btn btn-primary"').'</p>'; 
echo form_close();
?>

