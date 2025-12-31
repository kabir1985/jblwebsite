<style>
    .uploaddate{
        cursor: not-allowed;
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
    }
    .formUpload{
        background-color: #0099cc;
        color: white;
    }
    .readonly{
        cursor: not-allowed;
        background-color: #D9ECF3;
        opacity: 1;
    }
</style>
<script type="text/javascript">
    $(function () {
        $("select[name='mainmenu_id']").change(function () {
            var value = this.value;
            if (value === "22")
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/admin/pages/otherPage_based_on_otherMenu",
                    data: {mainmenu_id: $(this).val()},
                    type: "POST",
                    success: function (msg) {
                        $("select[name='page_name']").html(msg);
                    }
                });
            } else {
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/admin/pages/ajax_populate_select_based_on_another_select",
                    data: {mainmenu_id: $(this).val()},
                    type: "post",
                    success: function (msg) {
                        $("select[name='submenu_id']").html(msg);
                    }
                });
            }
        });
    });

    $(function () {
        $("select[name='childmenu_id']").change(function () {
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/admin/pages/ajax_populate_childMenuPage_based_on_subMenuPage",
                data: {submenu_id: $(this).val()},
                type: "post",
                success: function (msg) {
                    $("select[name='page_name']").html(msg);
                }
            });
        });
    });

    $(function () {
        $("select[name='submenu_id']").change(function () {
            // var one="<?php echo base_url(); ?>index.php/admin/pages/subMenuHasChildMenu"";

            // if(!empty(one))
            //{
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/admin/pages/buildDropChildMenus",
                data: {submenuid: $(this).val()},
                type: "POST",
                success: function (msg) {
                    $("select[name='childmenu_id']").html(msg);
                }
            });
            //}
            // else
            // {alert('Hello');}
        });
    });


    $(function () {
        $("select[name='submenu_id']").change(function () {
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/admin/pages/ajax_populate_subMenuPage_based_on_subMenu",
                data: {submenuid: $(this).val()},
                type: "POST",
                success: function (msg) {
                    $("select[name='page_name']").html(msg);
                }
            });
        });
    });

</script>

<script>
    $(document).ready(function () {
        $("#event").change(function () {
            var value = this.value;
            if (value === "0") {
                document.getElementById('mainmenu').style.display = "none";
                document.getElementById('submenu').style.display = "none";
                document.getElementById('childmenu').style.display = "none";
                document.getElementById('page').style.display = "none";
                document.getElementById('title').style.display = "none";
                document.getElementById('path').style.display = "none";
                document.getElementById('status').style.display = "none";
                document.getElementById('user').style.display = "none";
                document.getElementById('description').style.display = "none";
                document.getElementById('extrainfo').style.display = "none";
                document.getElementById('order').style.display = "none";
            } else if (value === "1") {
                // document.getElementById('banner').style.display = "inline-block";
                //document.getElementById('slide').style.display = "none";
                document.getElementById('mainmenu').style.display = "inline-block";
                document.getElementById('submenu').style.display = "inline-block";
                document.getElementById('childmenu').style.display = "inline-block";
                document.getElementById('page').style.display = "inline-block";
                document.getElementById('title').style.display = "inline-block";
                document.getElementById('path').style.display = "inline-block";
                document.getElementById('status').style.display = "inline-block";
                document.getElementById('user').style.display = "inline-block";
                document.getElementById('description').style.display = "none";
                document.getElementById('extrainfo').style.display = "none";
                document.getElementById('order').style.display = "none";
            } else if (value === "2") {
                //document.getElementById('slide').style.display = "inline-block";
                // document.getElementById('banner').style.display = "none";
                document.getElementById('title').style.display = "inline-block";
                document.getElementById('path').style.display = "inline-block";
                document.getElementById('description').style.display = "inline-block";
                document.getElementById('extrainfo').style.display = "inline-block";
                document.getElementById('order').style.display = "inline-block";
                document.getElementById('status').style.display = "inline-block";
                document.getElementById('user').style.display = "inline-block";
                document.getElementById('mainmenu').style.display = "none";
                document.getElementById('submenu').style.display = "none";
                document.getElementById('childmenu').style.display = "none";
                document.getElementById('page').style.display = "none";
            }
        });
    });
</script>

<fieldset>

    <p style="margin: -40px 0 10px -22px;"><?php echo anchor("admin/images", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>    
    <h1 style="font-size: 20px; margin: -32px 0 0 100px; text-decoration: dotted underline;"><?php echo 'Fill up Carefully'; ?></h1>
    <p style="float: right; margin-top: -40px;"><?php echo anchor("admin/images/addImage", '<i style="font-size:13px;color:red" class="fa fa-refresh"></i> CLEAR', 'class="btn btn-primary"'); ?></p>

    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>

    <?php
    $attributes = array(
        'id' => 'image_form',
        'class' => 'form-inline'
    );
    echo form_open_multipart('admin/images/addImage', $attributes);
    ?>

    <div class="form-group" id="">
        <label for="pageTier">Select Event</label></br>
        <select name="event" id="event">
            <option value="0">--select--</option>
            <option value="1">Banner</option>
            <option value="2">Slide Show</option>
        </select>
    </div>

    <?php
    //For Banner
    echo "<div class='form-group' id='mainmenu' style='display: none;'><label for='mainmenu'>Page Main Menue</label></br>";
    echo form_dropdown('mainmenu_id', $categorized_page) . "</div>";

    echo "<div class='form-group' id='submenu' style='display: none;'><label for='submenu'>Page Sub Menu</label></br>";
    echo form_dropdown('submenu_id') . "</div>";

    echo "<div class='form-group' id='childmenu' style='display: none;'><label for='childmenu'>Page Child Menu</label></br>";
    echo form_dropdown('childmenu_id') . "</div>";

    echo "<div class='form-group' id='page' style='display: none;'><label for='imgforpage'>Image for Page</label></br>";
    echo form_dropdown('page_name') . "</div>";

    echo "<div class='form-group' id='title' style='display: none;'><label for='image_title'>Image Title</label></br>";
    $data = array(
        'name' => 'image_title',
        'class' => 'formTextArea',
        'rows' => 1,
        'cols' => 40
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('image_title') . '</div></div>';

    echo "<div class='form-group' id='path' style='display: none;'><label for='image_path'>Image Path</label></br>";
    $data = array(
        'name' => 'image_path',
        'class' => 'formUpload'
    );
    echo form_upload($data);
    echo '<div class="errormessage">' . form_error('image_path') . '</div></div>';

    echo "<div class='form-group' id='description' style='display: none;'><label for='image_short_description'>Short Description</label></br>";
    $data = array(
        'name' => 'image_short_desc',
        'class' => 'formTextArea',
        'rows' => 3,
        'cols' => 60
    );
    echo form_textarea($data);
    echo '<div class="errormessage">' . form_error('image_short_desc') . '</div></div>';

    echo "<div class='form-group' id='status' style='display: none; required='required'><label for='status'>Status</label><br/>";
    $options = array(
        '' => '--select--',
        'active' => 'Active',
        'inactive' => 'Inactive'
    );
    echo form_dropdown('image_status', $options, (isset($_POST['image_status']) ? $_POST['image_status'] : '')) . "</div>";

    echo "<div class='form-group' id='extrainfo' style='display: none;'><label for='extra_information'>Extra Information</label></br>";
    $data = array(
        'name' => 'extra_information',
        'id' => 'extra_information_id',
        'readonly' => 'readonly',
        'class' => 'readonly',
        'value' => (isset($_POST['extra_information']) ? $_POST['extra_information'] : 'slide_show')
    );
    echo form_input($data);
    echo '<div class="errormessage">' . form_error('extra_information') . '</div></div>';

    echo "<div class='form-group' id='user' style='display: none;'><label for='insert_user_name'>Input User</label></br>";
    $data = array(
        'name' => 'insert_user_name',
        'id' => 'insert_user_name',
        'readonly' => 'readonly',
        'class' => 'readonly',
        'value' => (isset($_SESSION['username']) ? $_SESSION['username'] : '')
    );
    echo form_input($data);
    echo '<div class="errormessage">' . form_error('insert_user_name') . '</div></div>';

    /* echo "<div class='form-group'><label for='slide_order'>Slide Order</label></br>";
      $data = array(
      'name' => 'slide_order',
      'id' => 'slide_order ',
      'value' => (isset($_POST['slide_order']) ? $_POST['slide_order'] : '')
      );
      echo form_input($data);
      echo '<div class="errormessage">' . form_error('slide_order') . '</div></div>'; */

    echo "<div class='form-group' id='order' style='display: none;'><label for='slide_order'>Slide Order</label><br/>";
    $options = array(
        '' => '--select--', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9',
        '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17','18' => '18','19' => '19','20' => '20'
    );
//    foreach ($order  as $row) {
//          $options = $row['slide_order'];
//    }
    echo form_dropdown('slide_order', $options, (isset($_POST['slide_order']) ? $_POST['slide_order'] : '')) . "</div>";

    $attributes = array(
        'name' => 'submit',
        'type' => 'submit',
        'id' => 'image_id',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success'
    );
    echo "<p class='clear'>" . form_submit($attributes) . "</p>";
    echo form_close();
    //echo "</div>";
    ?>

</fieldset>

