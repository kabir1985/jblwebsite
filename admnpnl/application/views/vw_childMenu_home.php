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
        <p><?php echo anchor("admin/childMenu/addChildMenu", '<fa class="fa fa-plus"></fa> Add Child Menu', 'class="btn btn-primary"'); ?></p>

        <?php
        if (count($cm)) {
            echo "<table id='dataTable' class='table table-striped table-bordered table-responsive'>";
            echo "<thead><tr>";
            echo "<th>child ID</th>
                  <th>Child Parent</th>
		  <th>Child Priority</th>
		  <th>Child Name</th>	   
                  <th>Child URL</th>
                  <th>Top Bar</th>
                  <th>Child Status</th> 
		  <th>Action</th>";
            echo "</tr></thead>";
            foreach ($cm as $key => $list) {
                echo "<tr>";
                echo "<td>" . $list['childmenu_id'] . "</td>";
                echo "<td>" . $list['childmenu_parent'] . "</td>";
                echo "<td>" . $list['childmenu_priority'] . "</td>";
                echo "<td>" . $list['childmenu_name'] . "</td>";
                echo "<td>" . $list['childmenu_url'] . "</td>";
                echo "<td>" . $list['top_bar'] . "</td>";
                echo "<td>" . $list['childmenu_status'] . "</td>";
                echo '<td  class="center">' . anchor('admin/childMenu/edit/' . $list['childmenu_id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/childMenu/delete/' . $list['childmenu_id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
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