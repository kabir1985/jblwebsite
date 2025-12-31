<fieldset>
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
        .opnDate{
            cursor: pointer;
        }

        .ui-datepicker-trigger{
            cursor: pointer;
        }

        .formUpload{
            background-color: #0099cc;
            color: white;
        }

    </style> 
    <p style="margin: -40px 0 10px -22px;"><?php echo anchor("admin/exchange_rates/home", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>

    <?php
    $attributes = array('id' => 'ex_file_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/exchange_rates/edit', $attributes);
    
    
     $data = array('name' => 'ex_id',
        'id' => 'ex_id',
        'size' => 30,
        'value' => isset($_POST['ex_id']) ? $_POST['ex_id'] : $ex_file_info['ex_id']);
    echo form_hidden($data);

    echo "<div class='form-group'><label for='name'>বর্তমান ফাইল এর নাম আছে</label></br>";
    $data = array('name' => 'name',
        'id' => 'name',
        'size' => 30,
        'readonly' => 'readonly',
        'class' => 'readonly',
        'value' => isset($_POST['name']) ? $_POST['name'] : $ex_file_info['ex_file_path']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='name'>প্রথম আপলোডের  তারিখ এবং সময়</label></br>";
    $data = array('name' => 'upload_date_time',
        'id' => 'upload_date_time',
        'size' => 25,
        'readonly' => 'readonly',
        'class' => 'readonly',
        'value' => isset($_POST['upload_date_time']) ? $_POST['upload_date_time'] : $ex_file_info['upload_dt']);
    echo form_input($data) . "</div>";

/////////////
    if ($_SESSION['username'] == 'batayan' && ($ex_file_info['upload_by'] == 'batayan' || $ex_file_info['upload_by'] == 'jbtd')) {
        echo "<div class='form-group'><label for='name'>ফাইলটি প্রথম আপলোড আইডি</label></br>";
        $data = array('name' => 'upload_by_id',
            'id' => 'upload_by_id',
            'size' => 25,
            'readonly' => 'readonly',
            'class' => 'readonly',
            'value' => isset($_POST['upload_by_id']) ? $_POST['upload_by_id'] : $ex_file_info['upload_by']);
        echo form_input($data) . "</div>";
    } elseif ($_SESSION['username'] == 'jbtd' && $ex_file_info['upload_by'] == 'jbtd') {
        echo "<div class='form-group'><label for='name'>প্রথম আপলোডের  তারিখ এবং সময়</label></br>";
        $data = array('name' => 'upload_by_id',
            'id' => 'upload_by_id',
            'size' => 25,
            'readonly' => 'readonly',
            'class' => 'readonly',
            'value' => isset($_POST['upload_by_id']) ? $_POST['upload_by_id'] : $ex_file_info['upload_by']);
        echo form_input($data) . "</div>";
    } elseif ($_SESSION['username'] == 'jbtd' && $ex_file_info['upload_by'] == 'batayan') {
        echo "<div class='form-group'><label for='name'>প্রথম আপলোডের  তারিখ এবং সময়</label></br>";
        $data = array('name' => 'upload_by_id',
            'id' => 'upload_by_id',
            'size' => 25,
            'readonly' => 'readonly',
            'class' => 'readonly',
            'value' => isset($_POST['upload_by_id']) ? $_POST['upload_by_id'] : 'N/A');
        echo form_input($data) . "</div>";
    } else {
        echo "<div><label for='name'>প্রথম আপলোডের  তারিখ এবং সময়</label></br>";
        $data = array('name' => 'upload_by_id',
            'id' => 'upload_by_id',
            'size' => 25,
            'readonly' => 'readonly',
            'class' => 'readonly',
            'value' => isset($_POST['upload_by_id']) ? $_POST['upload_by_id'] : 'WEB ADMIN');
        echo form_input($data) . "</div>";
    }
////////

    echo "<div class='form-group'><label for='name'>পরবর্তীতে আপডেটের তারিখ এবং সময়)</label></br>";
    $data = array('name' => 'edited_dt',
        'id' => 'edited_dt',
        'size' => 25,
        'readonly' => 'readonly',
        'class' => 'readonly',
        'value' => isset($_POST['edited_dt']) ? $_POST['edited_dt'] : $ex_file_info['edited_dt']);
    echo form_input($data) . "</div>";

/////
    if (($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'jbtd') && ($ex_file_info['edited_by'] == '' || $ex_file_info['edited_by'] == 'jbtd')) {
        echo "<div class='form-group'><label for='name'>পরবর্তী আপডেট  আইডি </label></br>";
        $data = array('name' => 'edited_by',
            'id' => 'edited_by',
            'size' => 25,
            'readonly' => 'readonly',
            'class' => 'readonly',
            'value' => isset($_POST['edited_by']) ? $_POST['edited_by'] : $ex_file_info['edited_by']);
        echo form_input($data) . "</div>";
    } elseif ($_SESSION['username'] == 'jbtd' && $ex_file_info['edited_by'] == 'batayan') {
        echo "<div class='form-group'><label for='name'>পরবর্তী আপডেট  আইডি</label></br>";
        $data = array('name' => 'edited_by',
            'id' => 'edited_by',
            'size' => 25,
            'readonly' => 'readonly',
            'class' => 'readonly',
            'value' => isset($_POST['edited_by']) ? $_POST['edited_by'] : 'WEB ADMIN');
        echo form_input($data) . "</div>";
    } else {
        echo "<div class='form-group'><label for='name'>পরবর্তী আপডেট  আইডি</label></br>";
        $data = array('name' => 'edited_by',
            'id' => 'edited_by',
            'size' => 25,
            'readonly' => 'readonly',
            'class' => 'readonly',
            'value' => isset($_POST['edited_by']) ? $_POST['edited_by'] : 'N/A');
        echo form_input($data) . "</div>";
    }



    echo "<div class='form-group'><label for='name'>ফাইলটি কত সংখ্যক বার আপডেট হয়েছে</label></br>";
    $data = array('name' => 'update_count',
        'id' => 'update_count',
        'size' => 25,
        'readonly' => 'readonly',
        'class' => 'readonly',
        'value' => isset($_POST['update_count']) ? $_POST['update_count'] : $ex_file_info['update_count']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='upload'>নতুন ফাইল আপলোড করূণঃ</label></br>";
    $data = array(
        'name' => 'myfile',
        'id' => 'upload',
        'class' => 'formUpload'
    );
    echo form_upload($data) . "</div>";

    if (isset($error_mssg) && !empty($error_mssg)) {
        echo '<p><div class="errormessage" style="color:#F00; font-weight:bold; ">' . $error_mssg . '</div></p>';
    }


    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success');
    echo form_hidden('ex_id', isset($_POST['ex_id']) ? $_POST['ex_id'] : $ex_file_info['ex_id']);
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    ?>
</fieldset>
