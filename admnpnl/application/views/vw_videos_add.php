<span style="margin-top: 0px;"><?php echo anchor("admin/videos", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></span>
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
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>

    <!-- Before loop-->
    <?php
    $attributes = array('id' => 'video_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/videos/addVideos', $attributes);

    echo "<div class='form-group'><label for='page_mainmenu'>Page MainMenu</label></br>";
    $data = array(
        'name' => 'page_mainmenu',
        'id' => 'page_mainmenu',
        'readonly' => 'readonly',
        'class' => 'readonly',
        'value' => (isset($_POST['page_mainmenu']) ? $_POST['page_mainmenu'] : '19' )
    );
    echo form_input($data) . "</div>";


    echo "<div class='form-group'><label for='page_submenu'>Page SubMenu</label></br>";
    $data = array(
        'name' => 'page_submenu',
        'id' => 'page_submenu',
        'readonly' => 'readonly',
        'class' => 'readonly',
        'value' => (isset($_POST['page_submenu']) ? $_POST['page_submenu'] : '126' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='name'>Name</label></br>";
    $data = array('name' => 'name',
        'id' => 'name',
        'readonly' => 'readonly',
        'class' => 'readonly',
        'value' => (isset($_POST['name']) ? $_POST['name'] : 'video_gallery' )
    );
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='title'>Video Title</label></br>";
    $data = array('name' => 'title',
        'id' => 'title',
        'rows' => 2,
        'col' => 4,
        'value' => (isset($_POST['title']) ? $_POST['title'] : '' )
    );
    echo form_textarea($data) . "</p>";
    echo '<div class="errormessage">' . form_error('title') . '</div></div>';

    echo "<div class='form-group'><label for='video_path'>Embed Code</label></br>";
    $data = array('name' => 'video_path',
        'id' => 'video_path',
        'rows' => 2,
        'col' => 4,
        'value' => (isset($_POST['video_path']) ? $_POST['video_path'] : '' )
    );
    echo form_textarea($data) . "</p>";
    echo '<div class="errormessage">' . form_error('video_path') . '</div></div>';

    echo "<div class='form-group'><label for='status'>Status</label></br>";
    $data = array(
        'name' => 'status',
        'id' => 'status',
        'readonly' => 'readonly',
        'class' => 'readonly',
        'value' => (isset($_POST['status']) ? $_POST['status'] : 'Active' )
    );
    echo form_input($data) . "</div>";


    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'id' => 'video_submit_id',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success');
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    ?>
</fieldset>