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
        .controls  .help-inline{
            background-color:  #DAF7A6;
        }
    </style>

     <p style="margin: -40px 0 0 -22px;"><?php echo anchor("admin/exchange_houses", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>

    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>
    
    <?php
    $attributes = array('id' => 'house_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/exchange_houses/edit', $attributes);

    echo "<div class='form-group'><label for='exchg_house_name'>Name</label></br>";
    $data = array('name' => 'exchg_house_name',
        'id' => 'exchg_house_name',
        'class' => 'formTextArea',
        'rows' => 2,
        'col' => 5,
        'value' => $tda['exchg_house_name']);
    echo form_textarea($data) . "</div>";

    echo "<div class='form-group'><label for='exchg_house_address'>Address</label></br>";
    $data = array(
        'name' => 'exchg_house_address',
        'id' => 'exchg_house_address',
        'class' => 'formTextArea',
        'rows' => 2,
        'col' => 5,
        'value' => $tda['exchg_house_address']);
    echo form_textarea($data) . "</div>";

    echo "<div class='form-group'><label for='exchg_house_phone'>Phone</label></br>";
    $data = array(
        'name' => 'exchg_house_phone',
        'id' => 'exchg_house_phone',
        'class' => 'formTextArea',
        'rows' => 2,
        'col' => 5,
        'value' => $tda['exchg_house_phone']);

    echo form_textarea($data) . "</div>";

    echo "<div class='form-group'><label for='exchg_house_fax'>Fax</label></br>";
    $data = array(
        'name' => 'exchg_house_fax',
        'id' => 'exchg_house_fax',
        'class' => 'formTextArea',
        'rows' => 2,
        'col' => 5,
        'value' => $tda['exchg_house_fax']);
    echo form_textarea($data) . "</div>";

    echo "<div class='form-group'><label for='exchg_house_email'>Email</label></br>";
    $data = array(
        'name' => 'exchg_house_email',
        'id' => 'exchg_house_email',
        'class' => 'formTextArea',
        'rows' => 2,
        'col' => 5,
        'value' => $tda['exchg_house_email']);
    echo form_textarea($data) . "</div>";

    echo "<div class='form-group'><label for='exchg_house_country'>Country</label></br>";
    $data = array(
        'name' => 'exchg_house_country',
        'id' => 'exchg_house_country',
        'class' => 'formTextArea',
        'rows' => 2,
        'col' => 5,
        'value' => $tda['exchg_house_country']);
    echo form_textarea($data) . "</div>";

    echo "<div class='form-group'><label for='exchg_house_status'>Status</label></br>";
    echo "<select name='exchg_house_status' id='exchg_house_status' class='formTextArea'> 
    <option value='Active'>Active</option>
    <option value='Inactive'>Inactive</option>";
    echo "</select></div>";

    echo form_hidden('id', $tda['id']);
    echo "<p class='clear'>" . form_submit('submit', 'SUBMIT', 'class="btn btn-success"') . "</p>";
    echo form_close();
    ?>

</fieldset>
