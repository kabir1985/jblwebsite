<html>
    <head>
        <link href="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/css/jquery.dataTables.css" rel="stylesheet">
    </head>
    <body>
        <?php
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="glyphicon glyphicon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
        }
        ?>

        <p><?php echo anchor("admin/images/addImage", '<i class="fa fa-plus"></i> Add Banner / Slide Show', 'class="btn btn-primary"'); ?></p>

        <?php
        if (count($images)) {
            echo "<table id='dataTable' class='table table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>Image ID</th>
		  <th>Image TITLE</th>		  
		  <th>Image</th>		  
		  <th>Image Status</th>
		  <th>Extra Information</th>
		  <th>Input user</th>
		  <th>action</th>";
            echo "</tr></thead>";

            foreach ($images as $key => $list) {
                $url = substr(base_url(), 0, -8);
                echo "<tr>";
                echo "<td>" . $list['image_id'] . "</td>";
                echo "<td>" . $list['image_title'] . "</td>";
                //echo "<td>" . $list['image_parent_id'] . "</td>";
                if ($list['extra_information'] === 'slide_show') {
                    echo "<td><img src= '" . $url . "assets/images/slide/" . $list['image_path'] . " '  height=50 width=75></td>\n";
                } else {
                    echo "<td><img src= '" . $url . "assets/images/banner/" . $list['image_path'] . " '  height=25 width=75></td>\n";
                }
                echo "<td>" . $list['image_status'] . "</td>";
                echo "<td>" . $list['extra_information'] . "</td>";
                echo "<td>" . $list['insert_user_name'] . "</td>";
                echo '<td  class="center">' . anchor('admin/images/edit/' . $list['image_id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/images/delete/' . $list['image_id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';

                echo "</tr>";
            }
            echo "</table>";
        }
        ?>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTable').DataTable({

                });
            });
        </script> 

    </body>
</html>