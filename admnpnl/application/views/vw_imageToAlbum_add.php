<span style="margin-top: 0px;"><?php echo anchor("admin/photo_gallery/uploadImageToAlbum", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></span>
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
    echo form_open_multipart('admin/photo_gallery/addImageToAlbum', $attributes);

    echo "<div class='form-group'><label for='imageName'>Image Name</label></br>";
    $data = array(
        'name' => 'imageName',
        'id' => 'imageName',
        'value' => (isset($_POST['imageName']) ? $_POST['imageName'] : '')
    );
    echo form_upload($data);
    echo '<div class="errormessage">' . form_error('imageName') . '</div></div>';

    echo "<div class='form-group'><label for='caption'>Caption</label></br>";
    $data = array(
        'name' => 'caption',
        'id' => 'caption',
        'rows' => 2,
        'col' => 10,
        'value' => (isset($_POST['caption']) ? $_POST['caption'] : '')
    );
    echo form_textarea($data) . "</p>";
    echo '<div class="errormessage">' . form_error('caption') . '</div></div>';

    echo "<div class='form-group'><label for='albumID'>Album ID</label></br>";
    echo form_dropdown('albumID', $ID);

    echo "<div class='form-group'><label for='imageStatus'>Status</label><br/>";
    $options = array(
        'Active' => 'Active',
        'Inactive' => 'Inactive'
    );
    echo form_dropdown('imageStatus', $options, (isset($_POST['imageStatus']) ? $_POST['imageStatus'] : '')) . "</div>";

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
