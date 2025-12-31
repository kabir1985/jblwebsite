<style>
    .form-group{
        padding: 10px;
    }
    .formDrpDown{
        background-color: #D9ECF3;
    }
</style>

<script type="text/javascript">
    $(function () {

        if ($("select[name='page_level']").val() == 1)
            $("#subMenuShowHide").hide();

        $("select[name='page_level']").click(function () {
            if ($(this).val() == 1)
                $("#subMenuShowHide").hide();
            else
                $("#subMenuShowHide").show();
        });

        $("select[name='mainmenu_id']").change(function () {

            $.ajax({
                url: "<?php echo base_url(); ?>index.php/admin/pages/ajax_populate_select_based_on_another_select",
                data: {mainmenu_id: $(this).val()},
                type: "post",
                success: function (msg) {
                    if ($("select[name='mainmenu_id']").val() === "22")
                    {
                        $("#page_info").html(msg);
                        document.getElementById('subMenuShowHide').style.display = "none";
                    } else {
                        document.getElementById('subMenuShowHide').style.display = "inline-block";
                        $("select[name='submenu_id']").html(msg);
                    }
                }
            });
        });


        $("select[name='submenu_id']").change(function () {
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/admin/Pages/ajax_populate_html_based_on_another_select",
                data: {submenu_id: $(this).val()},
                type: "post",
                success: function (msg) {
                    $("#page_info").html(msg);
                }
            });
        });
    });


    $("select[name='submenu_id']").change(function () {
        if ($("select[name='submenu_id']").val() === "0")
            document.getElementById('page_info').style.display = "none";
    });

    $("select[name='mainmenu_id']").change(function () {
        if ($("select[name='mainmenu_id']").val() === "0")
            document.getElementById('page_info').style.display = "none";
    });

</script>

<!--h1><?php echo $title; ?></h1-->
<?php
if ($this->session->flashdata('message')) {
    echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="glyphicon glyphicon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
}
?>
<p><?php echo anchor("admin/pages/addPage", '<i class="fa fa-plus"></i> Add Page', 'class="btn btn-primary"'); ?></p>
<?php
$attributes = array('id' => 'search_page', 'class' => 'form-inline');
echo form_open_multipart('admin/Pages/index', $attributes);

echo "<fieldset>";
echo"<legend>" . 'Search Page' . "</legend>";

/* echo "<div class='form-group'><label for='pages_level'>Page Level :</label>";
  $page_level = array(
  '0' => '--Select--',
  '1' => 'Level Two',
  '2' => 'Level Three'
  );

  echo form_dropdown('page_level', $page_level) . "</div>"; */

echo "<div class='form-group'><label for='category_id'>Main Menu :</label>";
$data = array(
    'name' => 'mainmenu_id',
    'id' => 'mainmenu_id',
    'class' => 'formDrpDown'
);
echo form_dropdown('mainmenu_id', $categorized_page) . "</div>";

echo "<div class='form-group' id='subMenuShowHide'><label for='submenu_id'>Sub Menu :</label>";
$data = array(
    'name' => 'submenu_id',
    'id' => 'submenu_id',
    'class' => 'formDrpDown'
);

echo form_dropdown('submenu_id') . "</div>";
echo "</fieldset>";

echo form_close();
?>
<?php
echo '<div id="page_info">';
echo '</div>';
?>