<span style="margin-top: 0px;"><?php echo anchor("admin/circular", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></span>
<fieldset>
    <legend><h1 style="font-size: 20px; margin: 0; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1></legend>

    <style>
        .readonly{
            cursor: not-allowed;
            background-color: #D9ECF3;
            opacity: 1;
        }
        .form-control:valid{
            background-color: #D9ECF3!important;
        }
        .expDate{
            height: 25px!important;
        }
        .expDate:valid{
            background-color: #D9ECF3!important;
        }
        .control-group{
            /*float: left;*/
        }
        .form-group{
            padding: 10px;
        }
        #expiryDate{
            /*background-color:  #D9ECF3!important;*/         
        }  

        .ui-datepicker-trigger{
            cursor: pointer;
        }

    </style>

    <?php
    $attributes = array('id' => 'circular_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/circular/edit', $attributes);

    echo "<div class='form-group'><label for='circular_title'>Circular Title</label></br>";
    $data = array('name' => 'circular_title',
        'id' => 'circular_title',
        'rows' => 2,
        'col' => 4,
        'value' => $circular['circular_title']);
    echo form_textarea($data) . "</div>";


    echo "<div class='form-group'><label for='circular_no'>Circular No</label></br>";
    $data = array('name' => 'circular_no',
        'id' => 'circular_no',
        'value' => $circular['circular_no']);
    echo form_input($data) . "</div>";


    echo "<div class='form-group'><label for='circular_type'>Circular Type</label></br>";
    $options = array('Instruction Circular' => 'Instruction Circular',
        'Information Circular' => 'Information Circular',
        'Circular Letter' => 'Circular Letter',
        'RCD Circular' => 'RCD Circular',
        'ID Circular Letter' => 'ID Circular Letter',
        'FD Circular' => 'FD Circular',
        'FD Circular Letter' => 'FD Circular Letter',
        'Lost Notification' => 'Lost Notification');
    echo form_dropdown('circular_type', $options, $circular['circular_type']) . "</div>";
//echo form_dropdown('circular_type', $type, $circular['circular_type']);


    echo "<div class='form-group'><label for='circular_department'>Circular Department</label></br>";
    $data = array('name' => 'circular_department',
        'id' => 'circular_department',
        'size' => 45,
        'value' => $circular['circular_department']);
    echo form_input($data) . "</div>"; 

   /* echo "<div class='form-group'><label for='circular_department'>Circular Department</label></br>";
    echo form_dropdown('circular_department', $HoDept, $circular['circular_dept_code']) . "</p>";
    echo '<div class="errormessage txt-danger" >' . form_error('tender_offered_by') . '</div></div>'; */
	

    echo "<div class='form-group'><label for='circular_date'>Circular Date</label></br>";
    $data = array('name' => 'circular_date',
        'id' => 'datepicker',
        'class' => 'datepicker',
        'value' => $circular['circular_date']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='circular_pdf_link'>Circular PDF Link</label></br>";
    $data = array('name' => 'circular_pdf_link',
        'id' => 'circular_pdf_link',
        'value' => $circular['circular_pdf_link']);
    echo form_upload($data) . "Current file: " . $circular['circular_pdf_link'] . "</div>";

    echo "<div class='form-group'><label for='publish_status'>Publish Status</label></br>";
    $options = array('Private' => 'Private',
        'Public' => 'Public');
    echo form_dropdown('publish_status', $options, $circular['publish_status']) . "</div>";


    echo "<div class='form-group'><label for='circular_status'>Circular Status</label></br>";
    $options = array('Active' => 'Active',
        'Inactive' => 'Inactive');
    echo form_dropdown('circular_status', $options, $circular['circular_status']) . "</div>";



    echo form_hidden('circular_id', $circular['circular_id']);
    echo "<p class='clear'>" . form_submit('submit', 'SUBMIT', 'class="btn btn-success"') . "</p>";
    echo form_close();
    ?>

</fieldset>
