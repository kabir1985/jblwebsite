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


    <?php
    $attributes = array('id' => 'image_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/photo_gallery/imageToAlbumEdit', $attributes);


    echo '<div class="form-group"><label for="imageName"> Image Name</label></br>';
    $data = array("name" => "imageName",
        "id" => "imageName",
        "value" => $images['imageName']);
    echo '<div class="controls">' . form_upload($data) . '<span class="help-inline">Current file: ' . $images["imageName"] . '</span></div></div>';


    echo "<div class='form-group'><label for='caption'>Image Caption</label></br>";
    $data = array('name' => 'caption',
        'id' => 'caption',
        'rows' => 2,
        'col' => 10,
        'value' => $images['caption']);
    echo form_textarea($data) . "</div>";

    echo "<div class='form-group'><label for='albumID'>Album ID</label></br>";
    echo form_dropdown('albumID', $ID, $images['albumID']) . "</div>";


    echo "<div class='form-group'><label for='imageStatus'>Status</label></br>";
    echo "<select name='imageStatus' id='imageStatus'> 
    <option value='$images[imageStatus]'>$images[imageStatus]</option>
    <option value='---------'>--------</option> 
    <option value='Active'>Active</option>
    <option value='Inactive'>Inactive</option>";
     echo "</select></div>";

    echo form_hidden('galleryID', $images['galleryID']);
    echo "<p class='clear'>" . form_submit('submit', 'SUBMIT', 'class="btn btn-success"') . "</p>";
    echo form_close();
    ?>

</fieldset>
