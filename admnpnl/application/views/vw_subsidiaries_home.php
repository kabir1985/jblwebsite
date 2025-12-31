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
        <p><?php echo anchor("admin/subsidiaries/addSubsidiary", '<i class="fa fa-plus"></i> Add Subsidiary', 'class="btn btn-primary"'); ?></p>
        <?php
        if (count($sub)) {

            echo "<table id='dataTable' class='table-striped table-bordered table-responsive-sm'>"; // class="table table-striped table-bordered bootstrap-datatable datatable"
            echo "<thead><tr>";
            echo "<th>ID</th>
                  <th>Image</th>
		  <th>Name</th>
		  <th>Address</th>	   
                  <th>Contacts</th>                 
                  <th>Status</th>                 
		  <th>Action</th>";
            echo "</tr></thead>";

            foreach ($sub as $key => $list) {
                 $url = substr(base_url(), 0, -8);
                echo "<tr>";
                echo "<td>" . $list['id'] . "</td>";
                echo "<td><img src= '" . $url . "assets/images/jec/" . $list['image'] . " '  height=80 width=95></td>";
                echo "<td>" . $list['name'] . "</td>";
                echo "<td>" . $list['address'] . "</td>";
                echo "<td>" . $list['contacts'] . "</td>";
                echo "<td>" . $list['status'] . "</td>";
                echo '<td  class="center">' . anchor('admin/subsidiaries/edit/' . $list['id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/subsidiaries/delete/' . $list['id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
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