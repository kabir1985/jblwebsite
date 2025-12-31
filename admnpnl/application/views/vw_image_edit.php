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
    .help-inline{
        background-color: #0099cc;
        color: white;
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

    <p style="margin: -40px 0 0 -22px;"><?php echo anchor("admin/images", '<i style="font-size:13px;color:red" class="fa fa-angle-double-left"></i> Back', 'class="btn btn-primary"'); ?></p>
    <p style="float: right; margin-top: -40px;"><?php echo anchor("admin/images/edit/$image[image_id]", '<i style="font-size:13px;color:red" class="fa fa-refresh"></i> Refresh', 'class="btn btn-primary"'); ?></p>

    <?php
    if ($this->session->flashdata('message')) {
        echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="icon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
    }
    ?>

    <?php
    $attributes = array('id' => 'image_form', 'class' => 'form-inline');
    echo form_open_multipart('admin/images/edit', $attributes);
    ?>

    <!--div class="form-group" id="">
        <label for="pageTier">Only For Banner</br>[In Case of Editing Page]</label></br>
        <select name="event" id="event">
            <option value="0">--select--</option>
            <option value="1">Banner</option>
            <option value="2">Slide Show</option>
        </select>
    </div-->

    <?php
    /* echo "<div class='form-group' id='mainmenu' style='display: none;'><label for='mainmenu'>Page Main Menue</label></br>";
      echo form_dropdown('mainmenu_id', $categorized_page) . "</div>";

      echo "<div class='form-group' id='submenu' style='display: none;'><label for='submenu'>Page Sub Menu</label></br>";
      echo form_dropdown('submenu_id') . "</div>";

      echo "<div class='form-group' id='childmenu' style='display: none;'><label for='childmenu'>Page Child Menu</label></br>";
      echo form_dropdown('childmenu_id') . "</div>";

      echo "<div class='form-group' id='page' style='display: none;'><label for='imgforpage'>Image for Page</label></br>";
      //echo form_dropdown('page_name') . "</div>";
      echo '<div class="controls">' . form_dropdown('page_name') . '<span class="help-inline">Current Page: ' . $image["imageforpage"] . '</span></div></div>';
     */

    if ($image['extra_information'] === 'slide_show') {
        
    } else {
        echo "<div class='form-group'><label for='page'>Page Name</label></br>";
        $data = array(
            'name' => 'page_name',
            'id' => 'image_status',
            'class' => 'formTextArea',
            //'type' =>  'hidden',
            'value' => $image['imageforpage']);
        echo form_input($data) . "</div>";
    }

    echo "<div class='form-group'><label for='image_title'>Image Title</label></br>";
    $data = array('name' => 'image_title',
        'id' => 'image_title_id',
        'class' => 'formTextArea',
        'rows' => 1,
        'cols' => 40,
        'value' => $image['image_title']);
    echo form_textarea($data) . "</div>";

    echo "<div class='form-group'><label for='image_path'>Image Path</label></br>";
    $data = array(
        'name' => 'image_path',
        'id' => 'image_path');
    echo '<div class="controls">' . form_upload($data) . '<span class="help-inline">Current Image: ' . $image["image_path"] . '</span></div></div>';

    echo "<div class='form-group'><label for='short_description'>Short Description</label></br>";
    $data = array(
        'name' => 'image_short_desc',
        'id' => 'image_short_desc_id',
        'class' => 'formTextArea',
        'rows' => 6,
        'cols' => 60,
        'value' => $image['image_short_desc']);
    echo form_textarea($data) . "</div>";

    echo "<div class='form-group'><label for='status'>Status</label><br/>";
    $options = array('active' => 'Active',
        'inactive' => 'Inactive');
    echo form_dropdown('image_status', $options, $image['image_status']) . "</div>";

    echo "<div class='form-group'><label for='image_other2'>Extra Information</label></br>";
    $data = array(
        'name' => 'extra_information',
        'id' => 'extra_information_id',
        'readonly' => 'readonly',
        'class' => 'readonly',
        'value' => $image['extra_information']);
    echo form_input($data) . "</div>";

    echo "<div class='form-group'><label for='insert_user_name'>Input user</label></br>";
    $data = array(
        'name' => 'insert_user_name',
        'id' => 'insert_user_name',
        'readonly' => 'readonly',
        'class' => 'readonly',
        'value' => $image['insert_user_name']);
    echo form_input($data) . "</div>";

    if ($image['extra_information'] === 'slide_show') {
        echo "<div class='form-group' id='order'><label for='slide_order'>Slide Order</label><br/>";
        $options = array(
            '' => '--select--', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9',
            '10' => '10', '11' => '11', '12' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18','19' => '19','20' => '20'
        );
        echo form_dropdown('slide_order', $options, $image['slide_order']) . "</div>";
    } else {
        
    }

    /* echo "<div class='form-group' id='order'><label for='slide_order'>Slide Order</label><br/>";
      $options = array(
      '' => '--select--', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9',
      '10' => '10', '11' => '11', '12' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18'
      );
      echo form_dropdown('slide_order', $options, $image['slide_order']) . "</div>"; */

    /* echo "<div class='form-group'><label for='slide_order'>Slide Order</label></br>";
      $data = array(
      'name' => 'slide_order',
      'id' => 'slide_order',
      'value' => $image['slide_order']);
      echo form_input($data) . "</div>"; */

    $attributes_button = array(
        'name' => 'submit',
        'type' => 'submit',
        'id' => 'submit_id',
        'value' => 'SUBMIT',
        'class' => 'btn btn-success');
    echo form_hidden('image_id', $image['image_id']);
    //echo form_submit($attributes_button);
    echo "<p class='clear'>" . form_submit($attributes_button) . "</p>";
    echo form_close();
    ?>

</fieldset>