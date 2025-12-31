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
        <p><?php echo anchor("admin/mainMenu/addMainMenu", '<fa class="fa fa-plus"></fa> Add Main Menu', 'class="btn btn-primary"'); ?></p>
        <?php
        if (count($mm)) {
            echo "<table id='dataTable' class='table table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>ID</th>
                  <th>Parent ID</th>
		  <th>Priority</th>
		  <th>Name</th>	   
                  <th>URL</th>
                  <th>Status</th> 
		  <th>Action</th>";
            echo "</tr></thead>";
            foreach ($mm as $key => $list) {
                echo "<tr>";
                echo "<td>" . $list['mainmenu_id'] . "</td>";
                echo "<td>" . $list['parent'] . "</td>";
                echo "<td>" . $list['priority'] . "</td>";
                echo "<td>" . $list['name'] . "</td>";
                echo "<td>" . $list['url'] . "</td>";
                echo "<td>" . $list['status'] . "</td>";
                echo '<td  class="center">' . anchor('admin/mainMenu/edit/' . $list['mainmenu_id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/mainMenu/delete/' . $list['mainmenu_id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
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