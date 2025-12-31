<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.min.js"></script>  
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script> 

<script type="text/javascript">
    $(document).ready(function () {
        $("#districtDrp").change(function () {
            /*dropdown post *///  
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/admin/atm/buildDropUpazilas",
                data: {id: $(this).val()},
                type: "POST",
                success: function (data) {
                    $("#upazilaDrp").html(data);
                }
            });
        });

    });
</script>  

<script type="text/javascript">
//$("#subject").change(function(){
    $(function () {
        $("select[name='branch']").click(function () {
            //alert("Im in");
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/admin/atm/branch_select_address",
                data: {branch: $(this).val()},
                type: "post",
                success: function (msg) {
                    //$("#teacher").html();
                    $("select[name='address']").html(msg);
                }
            });
        });
    });

</script>

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

<p style="margin-top:-34px;"><?php echo anchor("admin/atm", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

<h1 style="font-size: 20px; margin: 0; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>


<?php
if ($this->session->flashdata('message')) {
    echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="glyphicon glyphicon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
}
?>

<?php
$attributes = array('id' => 'atm_form','class'=>'form-inline');
echo form_open_multipart('admin/atm/addATM',$attributes);

echo "<div class='form-group'><label for='branch_name'>ATM Name/Supervised Branch</label></br>";
//echo form_dropdown('branch',$select_branch) ."</p>";
$data = array(
    'name' => 'branch_name',
    'id' => 'branch',
    'value' => (isset($_POST['branch_name']) ? $_POST['branch_name'] : '' ),
    'size' => '52',
);
echo form_input($data).'</div>';

echo "<div class='form-group'><label for='address'>ATM Address/Location</label></br>";
//echo form_dropdown('address')."</p>";
$data = array(
    'name' => 'address',
    'id' => 'address',
    'value' => (isset($_POST['address']) ? $_POST['address'] : '' ),
    'rows' => '2',
    'cols' => '50',
);
echo form_textarea($data).'</div>';

echo "<div class='form-group'><label for='district'>District</label></br>";
echo "<select name='district' id='districtDrp'>";
echo '<option value="">--select--</option>';
foreach ($district as $row) {
    echo"<option value='$row[district_id]'>$row[district_name]</option>";
}
echo "</select></div>";

echo "<div class='form-group'><label for='upazila'>Area-Upazila/Thana</label></br>";
echo "<select name='upazila' id='upazilaDrp'>";
echo '<option value="">--select district first--</option>';
echo "</select></div>";

echo "<div class='form-group'><label for='map'>Google Map URL</label></br>";
$data = array(
    'name' => 'map',
    'id' => 'map',
    'value' => (isset($_POST['map']) ? $_POST['map'] : '' ),
    'rows' => '3',
    'cols' => '90',
);
echo form_textarea($data).'</div>';

echo "<div class='form-group'><label for='status'>Status</label></br>";
$options = array('' => '--select--', 'Active' => 'Active', 'Inactive' => 'Inactive');
echo form_dropdown('status', $options) . "</div>";

echo "<p class='clear'>".form_submit('submit', 'SUBMIT', 'class="btn btn-primary"')."</p>";
//echo "<p class='clear'>".form_submit($attributes)."</p>";
echo form_close();

