<span style="margin-top: 0px;"><?php echo anchor("admin/photo_gallery", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></span>
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

    <!--Form Validation Error Dispaly-->
    <?php echo validation_errors('<div class="message">', '</div>'); ?>
    <!--Form Validation-->
    <?php
    $attributes = array(
        'id' => 'image_form',
        'class' => 'form-inline'
    );
    echo form_open_multipart('admin/photo_gallery/addPhotoGallery', $attributes);

    
     //echo "<div class='form-group'><label for='albumID'>Album ID</label></br>";
    $data = array(
        'name' => 'albumID',
        'id' => 'albumID',
        'value' => (isset($_POST['albumID']) ? $_POST['albumID'] : '')
    );
    echo form_hidden($data);
    //echo '<div class="errormessage">' . form_error('albumName') . '</div></div>';
    
    
    echo "<div class='form-group'><label for='albumName'>Album Name</label></br>";
    $data = array(
        'name' => 'albumName',
        'id' => 'albumName',       
        'rows' => 2,
        'col' => 4,
        'required' => 'required',
        'value' => (isset($_POST['albumName']) ? $_POST['albumName'] : '')
    );
    echo form_textarea($data) . "</p>";
    echo '<div class="errormessage">' . form_error('albumName') . '</div></div>';


    echo "<div class='form-group'><label for='default_image'>Cover Photo</label></br>";
    $data = array(
        'name' => 'default_image',
        'id' => 'default_image',
        'value' => (isset($_POST['default_image']) ? $_POST['default_image'] : '')
    );
    echo form_upload($data);
    echo '<div class="errormessage">' . form_error('default_image') . '</div></div>';

    echo "<div class='form-group'><label for='albumDescription'>Description</label></br>";
    $data = array(
        'name' => 'albumDescription',
        'id' => 'albumDescription',
        'rows' => 2,
        'col' => 4,
        'required' => 'required',
        'value' => (isset($_POST['albumDescription']) ? $_POST['albumDescription'] : '')
    );

    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('albumDescription') . '</div></div>';

    /*     * ********************* */
    echo "<div class='form-group'><label for='albumStatus'>Status</label><br/>";
    $options = array(
        'Active' => 'Active',
        'Inactive' => 'Inactive',
    );
    echo form_dropdown('albumStatus', $options, (isset($_POST['albumStatus']) ? $_POST['albumStatus'] : '')) . "</div>";

    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'id' => 'image_submit_d',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success'
    );
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    ?>
</fieldset>
