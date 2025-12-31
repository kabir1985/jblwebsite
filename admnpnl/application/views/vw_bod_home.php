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

        <p><?php echo anchor("admin/bod/addDirector", '<i class="fa fa-plus"></i> Add Director / MD', 'class="btn btn-primary"'); ?></p>
        <?php
        if (count($bod)) {
            echo "<table id='dataTable'  class='table table-striped table-bordered table-responsive-sm'>"; 
            echo "<thead><tr>";
            echo "<th>ID</th>
                  <th>Priority</th>
		  <th>Name</th>
		  <th>Office Phone</th>	   
                  <th>Designation</th>
                  <th>Extra Quality</th>
                  <th>Image</th>
                  <th>Status</th>                 
		  <th>Action</th>";
            echo "</tr></thead>";
            //foreach ($categories as $key => $list)
            foreach ($bod as $key => $list) {
                echo "<tr>";
                echo "<td>" . $list['bod_id'] . "</td>";
                echo "<td>" . $list['bod_priority'] . "</td>";
                echo "<td>" . $list['bod_name'] . "</td>";
                echo "<td>" . $list['bod_office_phone_no'] . "</td>";
                echo "<td>" . $list['bod_designation'] . "</td>";
                echo "<td>" . $list['bod_extra_quali'] . "</td>";
                echo "<td>" . $list['bod_image'] . "</td>";
                echo "<td>" . $list['bod_status'] . "</td>";
                echo '<td  class="center">' . anchor('admin/bod/edit/' . $list['bod_id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/bod/delete/' . $list['bod_id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
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