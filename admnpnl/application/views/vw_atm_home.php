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
        <p><?php echo anchor("admin/atm/addATM", '<i class="fa fa-plus"></i> Add ATM', 'class="btn btn-primary"'); ?></p>
        <?php
        if (isset($atm)) {

            echo "<table id='dataTable' class='table table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>Sl</th>
                  <th>ATM/Supervised Branch</th>
		  <th>Address/Location</th>
		  <th>District</th>
                  <th>Area-Upazila/Thana</th>
                  <th>Status</th>                 
		  <th>Actions</th>";
            echo "</tr></thead>";
            foreach ($atm as $key => $list) {
                echo "<tr>";
                echo "<td>" . $list['id'] . "</td>";
                echo "<td>" . $list['branch_name'] . "</td>";
                echo "<td>" . $list['address'] . "</td>";
                echo "<td>" . $list['district_name'] . "</td>";
                echo "<td>" . $list['upazila'] . "</td>";
                echo "<td>" . $list['status'] . "</td>";

                echo '<td  class="center">' . anchor('admin/atm/edit/' . $list['id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/atm/delete/' . $list['id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
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