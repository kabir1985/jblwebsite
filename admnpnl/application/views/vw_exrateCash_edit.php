<style>
    .readonly{
        cursor: not-allowed;
        background-color: #D9ECF3;
        opacity: 1;
    }
    .control-group{
        /*float: left;*/
    }
    .form-group{
        padding: 10px;
    }
</style>

<p style="margin-top:-34px;"><?php echo anchor("admin/exchange_rates/jblRateCash", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>


<?php
if ($this->session->flashdata('message')) {
    echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
}
?>
<?php
$attributes = array('id' => 'atm_form', 'class' => 'form-inline');
echo form_open_multipart('admin/exchange_rates/rateCashEdit/' . $cash['id'], $attributes);

echo "<div class='form-group'><label for='currency'>Currency</label></br>";
$data = array(
    'name' => 'currency',
    'id' => 'currency',
    'readonly' => 'readonly',
    'class' => 'readonly',
    'value' => $cash['currency'],
    'size' => '20',
);
echo form_input($data) . "</div>";

echo "<div class='form-group'><label for='address'>Selling Rate</label></br>";
$data = array(
    'name' => 'selling',
    'id' => 'selling',
    'value' => $cash['selling'],
);
echo form_input($data) . "</div>";

echo "<div class='form-group'><label for='address'>Buying Rate</label></br>";
$data = array(
    'name' => 'buying',
    'id' => 'buying',
    'value' => $cash['buying'],
);
echo form_input($data) . "</div>";

echo "<div class='form-group'><label for='address'>Date</label></br>";
$data = array(
    'name' => 'date',
    'id' => 'date',
    //'class'=>'datepicker',
    'readonly' => 'readonly',
    'class' => 'readonly',
    'value' => $today = date('Y-m-d'),
    'readonly' => 'readonly',
);
echo form_input($data) . "</div></br>";

echo form_hidden('id', $cash['id']);
echo form_submit('submit', 'SUBMIT', 'class="btn btn-primary"');
echo form_close();

