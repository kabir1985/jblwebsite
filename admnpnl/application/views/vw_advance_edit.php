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

<p style="margin-top:-34px;"><?php echo anchor("admin/advance", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>


<?php
$attributes = array("id" => "advance_form", "class" => "form-inline");
echo form_open_multipart("admin/advance/edit", $attributes);

echo "<div class='form-group'><label for='mainmenu'>Main Menue</label></br>";
echo form_dropdown('mainmenu_id', $categorized_page, $advance['productForMainMenu']) . "</div>";

echo "<div class='form-group'><label for='submenu'>Sub Menu</label></br>";
echo form_dropdown('submenu_id', $advance['productForSubMenu']) . "</div>";

echo "<div class='form-group'><label for='childmenu'>Child Menu</label></br>";
echo form_dropdown('childmenu_id', $advance['productForChildMenu']) . "</div>";

echo "<div class='form-group'><label for='product_group'>Product Group</label><br>";
$data = array('name' => 'product_group',
    'id' => 'product_group',
    'value' => $advance['product_group'],
    'readonly' => 'true', 'class' => 'readonly',
    'readonly' => 'readonly');
echo form_input($data) . "</div>";

echo "<div class='form-group'><label for='product_scheme'>Product Name</label><br>";
$data = array('name' => 'product_scheme',
    'id' => 'product_scheme',
    'rows' => 2, 'cols' => '40',
    'value' => $advance['product_scheme']);
echo form_input($data) . "</div>";

echo "<div class='form-group'><label>Product Type</label><br>";
echo "<select name='product_type' id='product_type'> 
<option value='$advance[product_type]'>$advance[product_type]</option>
<option value='---------'>--------</option>    
<option value='Savings'>Savings</option>
<option value='Current'>Current</option>
<option value='Scheme'>Scheme</option>
<option value='Term'>Term</option>
<option value='Short Term'>Short Term</option>
<option value='Agriculture Loan Program'>Agriculture Loan Program</option>
<option value='Continious Loan'>Continious Loan</option>
<option value='Rural Credit'>Rural Credit</option>
<option value='credit_card'>credit_card</option>
<option value='Tannery'>Tannery</option>
<option value='Real Estate'>Real Estate</option>
<option value='House Building'>House Building</option>
<option value='Cow'>Cow</option>
<option value='Consumer Financing'>Consumer Financing</option>
<option value='Specialized Loan'>Specialized Loan</option>
<option value='education_loan'>Education Loan</option>
<option value='Working Capital Loan'>Working Capital Loan</option>
<option value='pensioner_loan'>Pensioner Loan</option>
<option value='personal_loan'>Personal Loan</option>
<option value='Green Financing'>Green Financing</option>";
echo "</select></div>";

//echo "<div class='form-group'><label for='product_type'>Product Type</label><br>";
//echo form_dropdown('product_type', $product_type, $advance['product_type']);
//echo "</div>";
//echo "<div class='form-group'><label for='product_scheme'>Product Type</label><br>";
//$data = array('name' => 'product_type',
//    'id' => 'product_type',
//    'value' => $advance['product_type']);
//echo form_input($data) . "</div>";
//echo "<div class='form-group'><label for='loan_installment_type'>Installment Type</label><br>";
//echo form_dropdown('loan_installment_type', $installment_type, $advance['loan_installment_type']);
//echo "</div>";

/* echo "<div class='form-group'><label for='loan_installment_type'>Installment Type</label><br>";
  $data = array(
  'name' => 'loan_installment_type',
  'id' => 'loan_installment_type',
  'rows' => 2, 'cols' => '40',
  'value' => $advance['loan_installment_type']);
  echo form_input($data) . "</div>"; */

echo "<div class='form-group'><label for='loan_installment_type'>Installment Type</label><br>";
echo "<select name='loan_installment_type' id='loan_installment_type'> 
<option value='$advance[loan_installment_type]'>$advance[loan_installment_type]</option>
<option value='-----------------------------'>---------------------------------</option> 
<option value='চলমান ঋণ'>চলমান ঋণ</option>
<option value='চলমান ধাপ'>চলমান ধাপ</option>
<option value='এককালীন'>এককালীন</option>
<option value='সাপ্তাহিক'>সাপ্তাহিক</option>
<option value='পাক্ষিক'>পাক্ষিক</option>
<option value='মাসিক'>মাসিক</option>
<option value='মাসিক/সেমিস্টার অনুযায়ী'>মাসিক/সেমিস্টার অনুযায়ী</option>
<option value='ত্রৈমাসিক'>ত্রৈমাসিক</option>
<option value='ষান্মাসিক'>ষান্মাসিক</option>
<option value='ত্রৈমাসিক/ষান্মাসিক'>ত্রৈমাসিক/ষান্মাসিক</option>
<option value='পাক্ষিক/ত্রৈমাসিক/ষান্মাসিক'>পাক্ষিক/ত্রৈমাসিক/ষান্মাসিক</option>
<option value='সাপ্তাহিক/পাক্ষিক'/ত্রৈমাসিক/ষান্মাসিক'>সাপ্তাহিক/পাক্ষিক'/ত্রৈমাসিক/ষান্মাসিক</option>
<option value='অর্ধ বার্ষিক'>অর্ধ বার্ষিক</option>
<option value='বার্ষিক'>বার্ষিক</option>
<option value='পাক্ষিক/মাসিক/ত্রৈমাসিক/ষান্মাসিক'>পাক্ষিক/মাসিক/ত্রৈমাসিক/ষান্মাসিক</option>
<option value='এককালীন/কিস্তিতে(পাক্ষিক/মাসিক/ত্রৈমাসিক/ষান্মাসিক'>এককালীন/কিস্তিতে(পাক্ষিক/মাসিক/ত্রৈমাসিক/ষান্মাসিক</option>
<option value='আয়ের ধরনের উপর ভিত্তি করে কিস্তি নির্ধারনযোগ্য'>আয়ের ধরনের উপর ভিত্তি করে কিস্তি নির্ধারনযোগ্য</option>
<option value='কৃষক যে পরিমান শষ্য ছাড়িয়ে নিতে ইচ্ছুক সে পরিমান শষ্যের গুদাম ভাড়া এবং ঋণ পরিশোধ করবেন'>কৃষক যে পরিমান শষ্য ছাড়িয়ে নিতে ইচ্ছুক সে পরিমান শষ্যের গুদাম ভাড়া এবং ঋণ পরিশোধ করবেন</option>";
echo "</select></div>";

echo "<div class='form-group'><label for='loan_eligibility'>Eligibility</label><br>";
$data = array(
    'name' => 'loan_eligibility',
    'id' => 'loan_eligibility',
    'rows' => 2, 'cols' => '40',
    'value' => $advance['loan_eligibility']);
echo form_textarea($data) . "</div>";

echo "<div class='form-group'><label for='loan_interest_rate'>Interest Rate</label><br>";
$data = array(
    'name' => 'loan_interest_rate',
    'id' => 'loan_interest_rate',
    'rows' => 2, 'cols' => '40',
    'value' => $advance['loan_interest_rate']);
echo form_input($data) . "</div>";

echo "<div class='form-group'><label for='loan_period'>Period</label><br>";
$data = array(
    'name' => 'loan_period',
    'id' => 'loan_period',
    'rows' => 2, 'cols' => '40',
    'value' => $advance['loan_period']);
echo form_input($data) . "</div>";

echo "<div class='form-group'><label for='loan_security'>Security</label><br>";
$data = array(
    'name' => 'loan_security',
    'id' => 'loan_security',
    'rows' => 2, 'cols' => '40',
    'value' => $advance['loan_security']);
echo form_textarea($data) . "</div>";

echo "<div class='form-group'><label for='loan_branches'>Designated Branches</label><br>";
$data = array(
    'name' => 'loan_branches',
    'id' => 'loan_branches',
    'rows' => 2, 'cols' => '40',
    'value' => $advance['loan_branches']);
echo form_textarea($data) . "</div>";

echo "<div class='form-group'><label for='loan_limit'>Limit</label><br>";
$data = array(
    'name' => 'loan_limit',
    'id' => 'loan_limit',
    'rows' => 2, 'cols' => '40',
    'value' => $advance['loan_limit']);
echo form_input($data) . "</div>";

//echo "<div class='form-group'><label for='product_status'>Status</label><br>";
//echo form_dropdown('product_status', $status, $advance['product_status']);
//echo "</div>";
echo "<div class='form-group'><label>Status</label><br>";
echo "<select name='product_status' id='product_status'> 
<option value='$advance[product_status]'>$advance[product_status]</option>
<option value='---------'>--------</option>    
<option value='Inactive'>Inactive</option>
<option value='Active'>Active</option>";
echo "</select></div>";

echo form_hidden("product_id", $advance["product_id"]);
echo '<div class="form-actions">' . form_submit("submit", "SUBMIT", 'class="btn btn-primary"') . '</div>';
echo form_close();
?>


