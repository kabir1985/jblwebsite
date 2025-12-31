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

<h1 style="font-size: 20px; margin: 0; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>

<?php
$attributes = array("id" => "deposit_form", "class" => "form-inline");
echo form_open_multipart("admin/deposit/addDepositProduct", $attributes);

echo "<div class='form-group'><label for='mainmenu'>Main Menue</label></br>";
echo form_dropdown('mainmenu_id', $categorized_page) . "</div>";

echo "<div class='form-group'><label for='submenu'>Sub Menu</label></br>";
echo form_dropdown('submenu_id') . "</div>";

echo "<div class='form-group'><label for='childmenu'>Child Menu</label></br>";
echo form_dropdown('childmenu_id') . "</div>";

echo '<div class="form-group"><label  class="control-label"  for="product_group">Product Group</label>';
$data = array("name" => "product_group",
    "id" => "Product_Group",
    "value" => (isset($_POST["product_group"]) ? $_POST["product_group"] : "Deposit" ),
    "readonly" => "readonly",
    'class' => 'readonly'
);
echo '<div class="controls">' . form_input($data) . '<span class="help-inline">' . form_error('product_group') . '</span></div></div>';
//echo '<div class="errormessage">'.form_error("product_group").'</div></p>'; 
//2
echo '<div class="form-group"><label  class="control-label"  for="Product_Scheme">Product Name</label>';
$data = array("name" => "product_scheme",
    "id" => "product_scheme",
    'rows' => 2,
    'cols' => 30,
    "value" => (isset($_POST["product_scheme"]) ? $_POST["product_scheme"] : "" )
);
echo '<div class="controls">' . form_textarea($data) . '<span class="help-inline">' . form_error('product_scheme') . '</span></div></div>';
//echo '<div class="errormessage">'.form_error("affback_office_code").'</div></p>'; 
//3
echo '<div class="form-group"><label  class="control-label"  for="product_type">Product Type</label></br>';
echo "<select name='product_type' id='product_type'> 
<option value=''>--select--</option>
<option value='Current'>Current</option>
<option value='Savings'>Savings</option>
<option value='Term'>Term</option>
<option value='Short Term'>Short Term</option>
<option value='Scheme'>Scheme</option>
<option value='Double Benefit'>Double Benefit</option>
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
/* $data = array(
  "name" => "product_type",
  "id" => "product_type",
  "value" => (isset($_POST["product_type"]) ? $_POST["product_type"] : "" )
  );
  echo '<div class="controls">' . form_input($data) . '<span class="help-inline">' . form_error('product_type') . '</span></div></div>';
 */

echo '<div class="form-group"><label  class="control-label"  for="monthly_installment">Monthly Installment </label>';
$data = array("name" => "monthly_installment",
    "id" => "monthly_installment",
    "value" => (isset($_POST["monthly_installment"]) ? $_POST["monthly_installment"] : "" )
);
echo '<div class="controls">' . form_input($data) . '<span class="help-inline">' . form_error('monthly_installment') . '</span></div></div>';
//echo '<div class="errormessage">'.form_error("Product_Scheme").'</div></p>'; 
//5
echo '<div class="form-group"><label  class="control-label"  for="interest_rate">Interest Rate</label>';
$data = array("name" => "interest_rate",
    "id" => "interest_rate",
    "value" => (isset($_POST["interest_rate"]) ? $_POST["interest_rate"] : "" )
);
echo '<div class="controls">' . form_input($data) . '<span class="help-inline">' . form_error('interest_rate') . '</span></div></div>';
//echo '<div class="errormessage">'.form_error("product_scheme_short").'</div></p>';
//6
echo '<div class="form-group"><label  class="control-label"  for="installment_date">Date of Installment</label>';
$data = array("name" => "installment_date",
    'id' => 'startDate',
    "value" => (isset($_POST["installment_date"]) ? $_POST["installment_date"] : "" )
);
echo '<div class="controls">' . form_input($data) . '<span class="help-inline">' . form_error('installment_date') . '</span></div></div>';
//echo '<div class="errormessage">'.form_error("short_name").'</div></p>';  
//7
echo '<div class="form-group"><label  class="control-label"  for="duration">Duration</label>';
$data = array(
    "name" => "duration",
    "id" => "duration",
    "value" => (isset($_POST["duration"]) ? $_POST["duration"] : "" )
);
echo '<div class="controls">' . form_input($data) . '<span class="help-inline">' . form_error('duration') . '</span></div></div>';
//echo '<div class="errormessage">'.form_error("product_type").'</div></p>'; 



echo '<div class="form-group"><label  class="control-label"  for="Related_Circular">Related Circular</label>';
$data = array(
    "name" => "related_circular",
    "id" => "Related_Circular",
    "value" => (isset($_POST["related_circular"]) ? $_POST["related_circular"] : "" )
);
echo '<div class="controls">' . form_input($data) . '<span class="help-inline">' . form_error('related_circular') . '</span></div></div>';
//echo '<div class="errormessage">'.form_error("High_lighted").'</div></p>'; 
//11
echo '<div class="form-group"><label  class="control-label"  for="circular_pdf_link">PDF Link</label>';
$data = array(
    "name" => "circular_pdf_link",
    "id" => "circular_pdf_link",
    "value" => (isset($_POST["circular_pdf_link"]) ? $_POST["circular_pdf_link"] : "" )
);
echo '<div class="controls">' . form_input($data) . '<span class="help-inline">' . form_error('circular_pdf_link') . '</span></div></div>';

echo '<div class="form-group"><label class="control-label" for="opening_rule">Opening Rule</label><br/>';
$data = array('name' => 'opening_rule', 'id' => 'opening_rule', 'rows' => 2, 'cols' => '40');
echo '<div class="controls">' . form_textarea($data) . '<span class="help-inline">' . form_error('opening_rule') . '</span></div></div>';

echo '<div class="form-group"><label  class="control-label"  for="close_before_maturity">Rules for closing before maturity</label>';
$data = array('name' => 'close_before_maturity', 'id' => 'close_before_maturity', 'rows' => 2, 'cols' => '30');
echo '<div class="controls">' . form_textarea($data) . '<span class="help-inline">' . form_error('close_before_maturity') . '</span></div></div>';

echo '<div class="form-group"><label  class="control-label"  for="product_status">Status</label></br>';
//$data = array(
//    "name" => "product_status",
//    "id" => "product_status",
//    "value" => (isset($_POST["product_status"]) ? $_POST["product_status"] : "" )
//);
//echo '<div class="controls">' . form_input($data) . '<span class="help-inline">' . form_error('product_status') . '</span></div></div>';
echo "<select name='product_status' id='product_status'> 
<option value=''>--select--</option>
<option value='Active'>Active</option>
<option value='Inactive'>Inactive</option>";
echo "</select></div>";

$attributes = array(
    "name" => "submit",
    "type" => "submit",
    "id" => "deposit_submit_d",
    "value" => "SUBMIT",
    "class" => "btn btn-primary");
echo '<div class="form-actions">' . form_submit($attributes) . '</div>';

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
