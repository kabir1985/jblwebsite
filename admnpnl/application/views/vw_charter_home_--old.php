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
        <p><?php echo anchor("admin/Citizen_charter/addCitizenServices", '<i class="fa fa-plus"></i> Add Services', 'class="btn btn-primary"'); ?></p>
        <?php
        if (count($charter)) {

            echo "<table id='dataTable' class='table table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>SL</th>
		  <th>Name of Services</th>
		  <th>Nature of Charges</th>
                  <th>Description</th>
                  <th>Rate</th>
                  <th>Department</th>			 
                  <th>Display</th>
				   <th>Marquee</th>
		  <th>Status</th>
		  <th>Actions</th>";
            echo "</tr></thead>";
            //foreach ($categories as $key => $list)
            foreach ($charter as $key => $list) {

                echo "<tr>";
                echo "<td>" . $list['sl'] . "</td>";
                echo "<td>" . $list['services'] . "</td>";
                echo "<td>" . $list['natureOfCharge'] . "</td>";
                echo "<td>" . $list['description'] . "</td>";
                echo "<td>" . $list['rate'] . "</td>";
                echo "<td>" . $list['relatedDepartment'] . "</td>";
                echo "<td>" . $list['displayInBoard'] . "</td>";
				echo "<td>" . $list['marquee'] . "</td>";
                echo "<td>" . $list['status'] . "</td>";
                echo '<td  class="center">' . anchor('admin/Citizen_charter/edit/' . $list['sl'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/Citizen_charter/delete/' . $list['sl'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
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