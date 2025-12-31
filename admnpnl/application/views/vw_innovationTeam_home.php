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

        <p><?php echo anchor("admin/innovation/addMember", '<i class="fa fa-plus"></i> Add Member', 'class="btn btn-primary"'); ?></p>
        <?php
        if (count($team)) {
            echo "<table id='dataTable'  class='table table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>ID</th>
                  <th>Priority</th>
		  <th>Name</th>
		  <th>Designation</th>	   
                  <th>Place of Posting</th>
                  <th>Innovation Designation</th>
                  <th>Phone</th>
                  <th>email</th>
                  <th>Status</th>
		  <th>Action</th>";
            echo "</tr></thead>";
            //foreach ($categories as $key => $list)
            foreach ($team as $key => $list) {
                echo "<tr>";
                echo "<td>" . $list['id'] . "</td>";
                echo "<td>" . $list['priority'] . "</td>";
                echo "<td>" . $list['name'] . "</td>";
                echo "<td>" . $list['official_designation'] . "</td>";
                echo "<td>" . $list['posting'] . "</td>";
                echo "<td>" . $list['innovation_desig'] . "</td>";
                echo "<td>" . $list['phone'] . "</td>";
                echo "<td>" . $list['email'] . "</td>";
                echo "<td>" . $list['status'] . "</td>";
                echo '<td  class="center">' . anchor('admin/innovation/edit/' . $list['id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/innovation/delete/' . $list['id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
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