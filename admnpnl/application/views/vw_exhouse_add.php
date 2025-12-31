<fieldset>
    <style>
        .form-group{
            padding: 10px;
        }
        .formTextArea{
            background-color: #D9ECF3;
        }
        .formUpload{
            background-color: #0099cc;
            color: white;
        }
    </style>

    <p style="margin: -40px 0 10px -22px;"><?php echo anchor("admin/exchange_houses", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>
    <h1 style="font-size: 20px; margin: -32px 0 10px 100px; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>
    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>

    <?php
    $attributes = array('id' => 'house_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/exchange_houses/addExchangeHouses', $attributes);

    echo "<div class='form-group'><label for='exchg_house_name'>Name</label><br>";
    $data = array('name' => ' exchg_house_name',
        'id' => ' exchg_house_name',
        'class' => 'formTextArea',
        'rows' => 2,
        'col' => 5,
        'value' => (isset($_POST['exchg_house_name']) ? $_POST['exchg_house_name'] : '' )
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('exchg_house_name') . '</div></div>';

    echo "<div class='form-group'><label for='exchg_house_address'>Address</label></br>";
    $data = array('name' => 'exchg_house_address',
        'id' => 'exchg_house_address',
        'value' => (isset($_POST['exchg_house_address']) ? $_POST['exchg_house_address'] : '' ),
        'class' => 'formTextArea',
        'rows' => 2,
        'col' => 5
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('exchg_house_address') . '</div></div>';

    echo "<div class='form-group'><label for='exchg_house_phone'>Phone</label></br>";
    $data = array('name' => 'exchg_house_phone',
        'id' => 'exchg_house_phone',
        'value' => (isset($_POST['exchg_house_phone']) ? $_POST['exchg_house_phone'] : '' ),
        'class' => 'formTextArea',
        'rows' => 2,
        'col' => 5
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('exchg_house-phone') . '</div></div>';

    echo "<div class='form-group'><label for='exchg_house_fax'>Fax</label></br>";
    $data = array('name' => 'exchg_house_fax',
        'id' => 'exchg_house_fax',
        'value' => (isset($_POST['exchg_house_fax']) ? $_POST['exchg_house_fax'] : '' ),
        'class' => 'formTextArea',
        'rows' => 2,
        'col' => 5
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('exchg_house_fax') . '</div></div>';

    echo "<div class='form-group'><label for='exchg_house_email'>Email</label></br>";
    $data = array('name' => 'exchg_house_email',
        'id' => 'exchg_house_email',
        'value' => (isset($_POST['exchg_house_email']) ? $_POST['exchg_house_email'] : '' ),
        'class' => 'formTextArea',
        'rows' => 2,
        'col' => 5
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('exchg_house_email') . '</div></div>';

    echo "<div class='form-group'><label for='exchg_house_country'>Country</label></br>";
    $data = array('name' => 'exchg_house_country',
        'id' => 'exchg_house_country',
        'value' => (isset($_POST['exchg_house_country']) ? $_POST['exchg_house_country'] : '' ),
        'class' => 'formTextArea',
        'rows' => 2,
        'col' => 5
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('exchg_house_country') . '</div></div>';

    echo "<div class='form-group'><label for='exchg_house_status'>Status</label></br>";
    echo "<select name='exchg_house_status' id='status' class='formTextArea'> 
    <option value=''>--select--</option>
    <option value='Active'>Active</option>
    <option value='Inactive'>Inactive</option>";
    echo "</select></div>";

    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'id' => 'submit_d',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success');
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    ?>
</fieldset>
