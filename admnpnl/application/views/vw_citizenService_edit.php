<fieldset>
    <style>
        label{
            font-family: Nikosh,kalpurush,solaimanLipi !important;
            color: #0099cc;
            font-size: 23px;
        }
        .readonly{
            cursor: not-allowed;
            background-color: #D9ECF3;
            opacity: 1;
        }
        .uploaddate{
            /*cursor: not-allowed;*/
            background-color: #D9ECF3;
            opacity: 1;
        }
        .control-group{
            /*float: left;*/
        }
        .issuedate{
            cursor: pointer;
        }

        .ui-datepicker-trigger{
            cursor: pointer;
        }

        .form-group{
            padding: 10px;
        }
        .formTextArea{
            background-color: #D9ECF3;
            font-family: Nikosh,kalpurush,solaimanLipi !important;
            font-size: 18px;
        }
        .formUpload{
            background-color: #0099cc;
            color: white;
        }

    </style>

    <p style="margin: -40px 0 0 -22px;"><?php echo anchor("admin/Citizen_charter", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>
    <h1 style="font-size: 20px; margin: -22px 0 0 100px; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>

    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>
    <?php
    echo validation_errors();
    $attributes = array('id' => 'charter_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/Citizen_charter/edit', $attributes);

    echo "<div class='form-group'><label for='serial'>SL No</label></br>";
    $data = array(
        'name' => 'sl',
        'id' => 'sl',
        'class' => 'readonly',
        'readonly' => '',
        'value' => $citizenService['service_id']
    );
    echo form_input($data);
    echo '<div class="errormessage">' . form_error('sl') . '</div></div>';
    ?>


    <div class="form-group">
        <label for="services">সেবার ধরণ</label>
        <select class="formTextArea" name="typesOfservices" id="services">
             <option value="<?php echo $citizenService['service_type']; ?>"><?php echo $citizenService['service_type']; ?> </option>
            <option value="">--choose an option--</option>
            <option value="citizen_services">নাগরিক সেবা</option>
            <option value="insti_services">প্রাতিষ্ঠানিক সেবা</option>
            <option value="internal_services">অভ‌্যন্তরীণ সেবা</option>
            <option value="compliance">অভিযোগ ব‌্যবস্থাপনা</option>
        </select>
    </div>   

    <div class="form-group" id='hiddenDiv1' style="visibility: hidden;">
        <label for="Category">ক‌্যাটাগোরী</label>
        <select class="formTextArea" name="category" id="category">
            <option value="<?php echo $citizenService['category']; ?>"><?php echo $citizenService['category']; ?> </option>
            <option value="">--choose an option--</option>
            <option value="rightToInfoAct">তথ‌্য অধিকার</option>
            <option value="deposit">আমানত</option>
            <option value="scheme">স্কীম</option>
            <option value="jbPinCash">জেবি পিন ক্যাশ</option>
            <option value="foreignRemittancePayment">বৈদেশিক রেমিট্যান্স পরিশোধ</option>
            <option value="loansAdvance">ঋণ ও অগ্রিম</option>
            <option value="card">কার্ড</option>
            <option value="bondBillSavings">বন্ড/বিল/সঞ্চয়পত্র সেবা</option>
            <option value="otherServices">অন্যান্য সেবা</option>
            <option value="institutionalServices">অভ‌্যন্তরীন সেবা</option>
            <option value="compliance">অভিযোগ ব্যবস্থাপনা</option>
        </select>
    </div>

    <!--     echo "<div class='form-group'><label for='section '>ক‌্যাটাগোরী</label></br>";
        echo "<select name='category' id='section' class='formTextArea'>";
        echo '<option value="' . $citizenService['category'] . '"> ' . $citizenService['category'] . ' </option>';
       echo'<option value="">--SELECT--</option>';
             echo'<option value="rightToInfoAct">তথ‌্য অধিকার</option>';
             echo'<option value="deposit">আমানত</option>';
              echo'<option value="scheme">স্কীম</option>';
              echo'<option value="jbPinCash">জেবি পিন ক্যাশ</option>';
              echo'<option value="foreignRemittancePayment">বৈদেশিক রেমিট্যান্স পরিশোধ</option>';
              echo'<option value="loansAdvance">ঋণ ও অগ্রিম</option>';
              echo'<option value="card">কার্ড</option>';
              echo'<option value="bondBillSavings">বন্ড/বিল/সঞ্চয়পত্র সেবা</option>';
              echo'<option value="otherServices">অন্যান্য সেবা</option>';
              echo'<option value="institutionalServices">অভ‌্যন্তরীন সেবা</option>';
              echo'<option value="internalServices">অভ্যন্তরীণ সেবা</option>';
              echo'<option value="compliance">অভিযোগ ব্যবস্থাপনা</option>';
        echo"</select>";
        echo '<div class="errormessage" style="color:#F00; font-weight:bold; " >' . form_error('category') . '</div></div>';-->

    <div class="form-group" id='hiddenDiv' style="visibility: hidden;">
        <label for="subcat">সাবক‌্যাটাগোরী</label>
        <select class="formTextArea" name="subcat" id="subcat">
            <option value="<?php echo $citizenService['sub_category']; ?>"><?php echo $citizenService['sub_category']; ?> </option>
            <option value="">--choose an option--</option>
            <option value="agriculture_loan">কৃষি ঋণ</option>
            <option value="rural_credit">পল্লী ঋণ</option>
            <option value="green_financing">গ্রীণ ফাইন‌্যান্সিং</option>
            <option value="consumer_financing">কনজুমার  ফাইন‌্যান্সিং</option>
            <option value="sod">এসওডি</option>
            <option value="specialized">বিশেষায়িত ঋণ</option>
            <option value="sme">এসএমই ঋণ</option>
            <option value="industry_project">শিল্প/প্রকল্প ঋণ</option>
            <option value="commercial_working">বাণিজ‌্যিক/চলতি মূলধন ঋণ</option>
            <option value="export_loan">রপ্তানী খাতে অর্থায়ন</option>
            <option value="import_loan">আমদানী খাতে অর্থায়ন</option>
            <option value="others_loan">অন‌্যান‌্য ঋণ</option>
        </select>
    </div>    


    <?php
    echo "<div class='form-group'><label for='service'>সেবার নাম</label></br>";
    $data = array('name' => 'name_of_services',
        'id' => 'name_of_services',
        'rows' => 1,
        'col' => 5,
        'class' => 'formTextArea',
        'value' => $citizenService['name_of_services']
    );
    echo form_textarea($data);
    echo '<span style="color:#F00; font-weight:bold; "><div class="errormessage">' . form_error('name_of_services') . '</div></span></div>';

    echo "<div class='form-group'><label for='charge'>সেবা প্রদান পদ্ধতি</label></br>";
    $data = array(
        'name' => 'metohd_of_providing_services',
        'id' => 'metohd_of_providing_services',
        'rows' => 1,
        'col' => 5,
        'class' => 'formTextArea',
        'value' => $citizenService['metohd_of_providing_services']
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('metohd_of_providing_services') . '</div></div>';

    echo "<div class='form-group'><label for='description'>প্রয়োজনীয় কাগজপত্র  এবং প্রাপ্তিস্থান</label></br>";
    $data = array('name' => 'necessary_doc_and_receipt',
        'id' => 'necessary_doc_and_receipt',
        'rows' => 1,
        'col' => 5,
        'class' => 'formTextArea',
        'value' => $citizenService['necessary_doc_and_receipt']
    );
    echo form_textarea($data);
    echo '<span style="color:#F00; font-weight:bold; "><div class="errormessage">' . form_error('necessary_doc_and_receipt') . '</div></span></div>';

    echo "<div class='form-group'><label for='rate'>সেবার মূল‌্য এবং পরিশোধ পদ্ধতি</label></br>";
    $data = array(
        'name' => 'service_price_and_payment',
        'id' => 'service_price_and_payment',
        'rows' => 1,
        'col' => 5,
        'class' => 'formTextArea',
        'value' => $citizenService['service_price_and_payment']
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('service_price_and_payment') . '</div></div>';

    echo "<div class='form-group'><label for='rate'>সেবা প্রদানের সময়সীমা</label></br>";
    $data = array(
        'name' => 'period_of_service',
        'id' => 'period_of_service',
        'rows' => 1,
        'col' => 5,
        'class' => 'formTextArea',
        'value' => $citizenService['period_of_service']
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('period_of_service') . '</div></div>';

    echo "<div class='form-group'><label for='rate'>বিভাগীয় প্রধানের নাম,পদবী,মোবাইল,ফোন নম্বর ও ই-মেইল</label></br>";
    $data = array(
        'name' => 'officer_in_charge',
        'id' => 'officer_in_charge',
        'rows' => 1,
        'col' => 5,
        'class' => 'formTextArea',
        'value' => $citizenService['officer_in_charge']
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('officer_in_charge') . '</div></div>';

    echo "<div class='form-group'><label for='entryDate'>তারিখ</label></br>";
    $data = array(
        'name' => 'entryDate',
        'id' => 'entryDate',
        'class' => 'entryDate',
        'required' => 'required',
        'class' => 'formTextArea',
        'value' => $citizenService['entryDate']
    );
    echo form_input($data) . "</p>";
    echo '<div class="errormessage">' . form_error('entryDate') . '</div></div>';

    echo "<div class='form-group'><label for='status'>অবস্থা</label></br>";
    $options = array(
        $citizenService['status'] => $citizenService['status'],
        '' => 'SELECT',
        '1' => 'Active',
        '0' => 'Inactive'
    );
    //echo '<input type="checkbox" id="status" name="status" class="selectCheck" value="1" onchange="checkboxClick(this)"> Active<br>';
    //echo '<input type="checkbox" id="status" name="status" class="selectCheck" value="0" onchange="checkboxClick(this)"> Inactive';
    echo form_dropdown('status', $options);
    echo '<div class="errormessage">' . form_error('status') . '</div></div>';

    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'id' => 'noc_submit_id',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success');
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    ?>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#entryDate').datepicker({
                showOn: "both",
                buttonImage: "<?php echo base_url(); ?>assets/images/calendar.gif",
                buttonImageOnly: true,
                buttonText: '',
                dateFormat: 'yy-mm-dd',
                changeYear: true,
                changeMonth: true,
                yearRange: "1971:2071"
            });
        });
    </script>

    <script>
        document.getElementById('category').onchange = e => {
            let hiddenElement = document.getElementById('hiddenDiv');
            e.target.value === 'loansAdvance' ?
                    hiddenElement.style.visibility = 'visible' :
                    hiddenElement.style.visibility = 'hidden';
        };
    </script>

    <script>
        document.getElementById('services').onchange = e => {
            let hiddenElement = document.getElementById('hiddenDiv1');
            e.target.value === 'citizen_services' ?
                    hiddenElement.style.visibility = 'visible' :
                    hiddenElement.style.visibility = 'hidden';
        };
    </script>

</fieldset>
