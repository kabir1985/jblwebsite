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
    .ui-datepicker-trigger
    {
        cursor: pointer
    }
</style>

<script type="text/javascript">
    $(function () {
        $("select[name='mainmenu_id']").change(function () {
            var value = this.value;
            if (value === "22")
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/admin/pages/otherPage_based_on_otherMenu",
                    data: {mainmenu_id: $(this).val()},
                    type: "POST",
                    success: function (msg) {
                        $("select[name='page_name']").html(msg);
                    }
                });
            } else {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/admin/pages/ajax_populate_select_based_on_another_select",
                    data: {mainmenu_id: $(this).val()},
                    type: "post",
                    success: function (msg) {
                        $("select[name='submenu_id']").html(msg);
                    }
                });
            }
        });
    });

    $(function () {
        $("select[name='childmenu_id']").change(function () {
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/admin/pages/ajax_populate_childMenuPage_based_on_subMenuPage",
                data: {submenu_id: $(this).val()},
                type: "post",
                success: function (msg) {
                    $("select[name='page_name']").html(msg);
                }
            });
        });
    });

    $(function () {
        $("select[name='submenu_id']").change(function () {
            // var one="<?php echo base_url(); ?>index.php/admin/pages/subMenuHasChildMenu"";

            // if(!empty(one))
            //{
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/admin/pages/buildDropChildMenus",
                data: {submenuid: $(this).val()},
                type: "POST",
                success: function (msg) {
                    $("select[name='childmenu_id']").html(msg);
                }
            });
            //}
            // else
            // {alert('Hello');}
        });
    });
</script>

<p style="margin-top:-34px;"><?php echo anchor("admin/deposit", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

<?php
$attributes = array("id" => "deposit_form", "class" => "form-inline");
echo form_open_multipart('admin/deposit/edit/' . $deposit['product_id'], $attributes);

echo "<div class='form-group'><label for='mainmenu'>Main Menue</label></br>";
echo form_dropdown('mainmenu_id', $categorized_page, $deposit["productForMainMenu"]) . "</div>";

echo "<div class='form-group'><label for='submenu'>Sub Menu</label></br>";
echo form_dropdown('submenu_id', $deposit["productForSubMenu"]) . "</div>";

echo "<div class='form-group'><label for='childmenu'>Child Menu</label></br>";
echo form_dropdown('childmenu_id', $deposit["productForChildMenu"]) . "</div>";

echo '<div class="form-group"><label  class="control-label"  for="product_group">Group</label>';
$data = array("name" => "product_group",
    "id" => "product_group",
    "size" => 25,
    'readonly' => 'true', 'class' => 'readonly',
    "value" => $deposit["product_group"]);
echo '<div class="controls">' . form_input($data) . '<span class="help-inline">' . form_error('product_group') . '</span></div></div>';

echo '<div class="form-group"><label  class="control-label"  for="Product_Scheme">Scheme Name</label>';
$data = array(
    "name" => "product_scheme",
    "id" => "Product_Scheme",
    'rows' => 2,
    'cols' => 30,
    "value" => $deposit["product_scheme"]);
echo '<div class="controls">' . form_input($data) . '<span class="help-inline">' . form_error('product_scheme') . '</span></div></div>';

/*echo '<div class="form-group"><label  class="control-label"  for="product_type">Type</label>';
$data = array("name" => "product_type",
    "id" => "product_type",
    "size" => 25,
    "value" => $deposit["product_type"]);
echo '<div class="controls">' . form_input($data) . '<span class="help-inline">' . form_error('product_type') . '</span></div></div>';
*/
echo '<div class="form-group"><label  class="control-label"  for="product_type">Product Type</label></br>';
echo "<select name='product_type' id='product_type'> 
<option value='$deposit[product_type]'>$deposit[product_type]</option>
<option value=''>--select--</option>
<option value='Current'>Current</option>
<option value='Savings'>Savings</option>
<option value='Term'>Term</option>
<option value='Short Term'>Short Term</option>
<option value='Scheme'>Scheme</option>
<option value='Agriculture Loan Program'>Agriculture Loan Program</option>
<option value='Working Capital Loan'>Working Capital Loan</option>
<option value='Green Financing'>Green Financing</option>
<option value='Rural Credit'>Rural Credit</option>
<option value='Tannery'>Tannery</option>
<option value='Real Estate'>Real Estate</option>
<option value='House Building'>House Building</option>
<option value='Consumer Financing'>Consumer Financing</option>
<option value='education_loan'>education_loan</option>
<option value='pensioner_loan'>pensioner_loan</option>
<option value='Specialized Loan'>Specialized Loan</option>
<option value='credit_card'>credit_card</option>";
echo "</select></div>";
/////////////////
echo '<div class="form-group"><label  class="control-label"  for="monthly_installment">Monthly Installment</label>';
$data = array(
    "name" => "monthly_installment",
    "id" => "monthly_installment",
    "size" => 25,
    "value" => $deposit["monthly_installment"]);
echo '<div class="controls">' . form_input($data) . '<span class="help-inline">' . form_error('monthly_installment') . '</span></div></div>';
///////////////////



echo '<div class="form-group"><label  class="control-label"  for="interest_rate">Rate</label>';
$data = array(
    "name" => "interest_rate",
    "id" => "interest_rate",
    "size" => 25,
    "value" => $deposit["interest_rate"]);
echo '<div class="controls">' . form_input($data) . '<span class="help-inline">' . form_error('interest_rate') . '</span></div></div>';

echo '<div class="form-group"><label  class="control-label"  for="installment_date">Installment Date</label>';
$data = array(
    "name" => "installment_date",
    'id' => 'startDate',
    "value" => $deposit["installment_date"]);
echo '<div class="controls">' . form_input($data) . '<span class="help-inline">' . form_error('installment_date') . '</span></div></div>';

echo '<div class="form-group"><label  class="control-label"  for="duration">Duration</label>';
$data = array(
    "name" => "duration",
    "id" => "duration",
    "size" => 25,
    "value" => $deposit["duration"]);
echo '<div class="controls">' . form_input($data) . '<span class="help-inline">' . form_error('duration') . '</span></div></div>';

echo '<div class="form-group"><label  class="control-label"  for="Related_Circular">Circular</label>';
$data = array(
    "name" => "related_circular",
    "id" => "Related_Circular",
    "size" => 25,
    "value" => $deposit["related_circular"]);
echo '<div class="controls">' . form_input($data) . '<span class="help-inline">' . form_error('Related_Circular') . '</span></div></div>';

echo '<div class="form-group"><label  class="control-label"  for="circular_pdf_link">Link</label>';
$data = array(
    "name" => "circular_pdf_link",
    "id" => "circular_pdf_link",
    "size" => 25,
    "value" => $deposit["circular_pdf_link"]);
echo '<div class="controls">' . form_input($data) . '<span class="help-inline">' . form_error('circular_pdf_link') . '</span></div></div>';

/* echo '<div class="control-group"><label  class="control-label"  for="opening_rule">Opening Rule</label>';
  $data = array(
  "name"=>"opening_rule",
  "id"=>"opening_rule",
  "size"=>25,
  "value" => $deposit["opening_rule"]);
  echo '<div class="controls">'.form_input($data) .'<span class="help-inline">'.form_error('opening_rule').'</span></div></div>'; */

echo '<div class="form-group"><label class="control-label" for="opening_rule">Opening Rule</label><br/>';
$data = array(
    'name' => 'opening_rule',
    'id' => 'opening_rule',
    'value' => $deposit["opening_rule"],
    'rows' => 2,
    'cols' => '40');
echo '<div class="controls">' . form_textarea($data) . '<span class="help-inline">' . form_error('opening_rule') . '</span></div></div>';

echo '<div class="form-group"><label  class="control-label"  for="close_before_maturity">Close Before Maturity</label>';
$data = array(
    'name' => 'close_before_maturity',
    'id' => 'close_before_maturity',
    'value' => $deposit["close_before_maturity"],
    'rows' => 2,
    'cols' => '30');
echo '<div class="controls">' . form_textarea($data) . '<span class="help-inline">' . form_error('close_before_maturity') . '</span></div></div>';

//echo '<div class="form-group"><label  class="control-label"  for="product_status">Status</label>';
//$data = array(
//				"name"=>"product_status",
//				"id"=>"product_status",				
//				"size"=>25,
//				"value" => $deposit["product_status"]);
//echo '<div class="controls">'.form_input($data) .'<span class="help-inline">'.form_error('product_status').'</span></div></div>'; 
//echo '<div class="form-group">label class="control-label">Status</label>";
//echo form_dropdown('product_status', $product_status, $deposit['product_status'])</div>';
echo "<div class='form-group'><label>Status</label><br>";
echo "<select name='product_status' id='product_status'> 
<option value='$deposit[product_status]'>$deposit[product_status]</option>
<option value='---------'>--------</option>    
<option value='Inactive'>Inactive</option>
<option value='Active'>Active</option>";
echo "</select></div>";

echo form_hidden("product_id", $deposit["product_id"]);
echo '<div class="form-actions">' . form_submit("submit", "SUBMIT", 'class="btn btn-primary"') . '</div>';
echo form_close();
?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#startDate').datepicker({
            showOn: "both",
            buttonImage: "<?php echo base_url(); ?>assets/images/calendar.gif",
            buttonImageOnly: true,
            buttonText: '',
            dateFormat: 'yy-mm-dd',
            changeYear: true,
            changeMonth: true,
            yearRange: "1971:"
        });
    });
</script>