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
        <p><?php echo anchor("admin/subMenu/addSubMenu",'<fa class="fa fa-plus"></fa> Add Sub Menu','class="btn btn-primary"'); ?></p>       
        <?php
        if (count($sm)) {
            echo "<table id='dataTable' class='table table-striped table-bordered table-responsive'>";
            echo "<thead><tr>";
            echo "<th>ID</th>
                  <th>Parent ID</th>
		  <th>Priority</th>
		  <th>Sub Menu Name</th>	   
                  <th>URL</th>
                  <th>Status</th> 
		  <th>Action</th>";
            echo "</tr></thead>";
            foreach ($sm as $key => $list) {
                echo "<tr>";
                echo "<td>" . $list['submenu_id'] . "</td>";
                echo "<td>" . $list['submenu_parent'] . "</td>";
                echo "<td>" . $list['submenu_priority'] . "</td>";
                echo "<td>" . $list['submenu_name'] . "</td>";
                echo "<td>" . $list['submenu_url'] . "</td>";
                echo "<td>" . $list['submenu_status'] . "</td>";
                echo '<td  class="center">' . anchor('admin/subMenu/edit/' . $list['submenu_id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/subMenu/delete/' . $list['submenu_id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
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