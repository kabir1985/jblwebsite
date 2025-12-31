
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

    .formUpload{
        background-color: #0099cc;
        color: white;
    }
</style>

<?php
if ($this->session->flashdata('message')) {
    echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="fa fa-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
}
?>

<?php

echo form_open_multipart('admin/Bod/directorsInfo');

echo "<div  class='form-group'><label for='upload'>Upload File</label>";
$data = array('name' => 'dirRelatedInfo',
              'id' => 'upload',
              'class' => 'formUpload'
              );
echo form_upload($data) . "</div>";
echo '<p class="clear">' . form_submit("submit", "SUBMIT", 'class="btn btn-primary"') . '</p>';
echo form_close();
