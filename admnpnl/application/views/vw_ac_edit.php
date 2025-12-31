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
  
<p style="margin-top:-34px;"><?php echo anchor("admin/ac", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

<?php
if ($this->session->flashdata('message')){
	echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>'.$this->session->flashdata('message').'</div>';
}
?>
<?php
$attributes = array('id' => 'ac_form','class'=>'form-inline');
echo form_open_multipart('admin/ac/edit/'.$ac['id'],$attributes);

echo "<div class='form-group'><label for='priority'>Order</label></br>";
echo form_dropdown('priority', $order, $ac["priority"]).'</div>';

echo "<div class='form-group'><label for='name'>Name</label></br>";
echo form_dropdown('name', $name, $ac["name"]).'</div>';

echo "<div class='form-group'><label for='designation'>Designation</label></br>";
echo form_dropdown('designation', $designation, $ac["designation"]).'</div>';
        
echo "<div class='form-group'><label for='committee_status'>Status with Committee</label></br>";
echo form_dropdown('committee_status', $committee_status, $ac["committee_status"]).'</div>';

echo "<div class='form-group'><label for='status'>Status</label></br>";
echo form_dropdown('status', $status, $ac["status"]).'</div>';

echo form_hidden('id',$ac['id']);
echo '<p class="clear">' . form_submit("submit", "SUBMIT", 'class="btn btn-primary"') . '</p>';
echo form_close();

?>
