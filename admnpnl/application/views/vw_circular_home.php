<html>
    <head>
        <link href="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/css/jquery.dataTables.css" rel="stylesheet">
    </head>
    <body>
        <?php
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button"><i class="glyphicon glyphicon-remove"></i></button>' . $this->session->flashdata('message') . '</div>';
        }
        ?><p><?php echo anchor('admin/circular/addCircular', '<i class="fa fa-plus"></i> Add Circular', 'class="btn btn-primary"'); ?></p>

        <?php
        if (count($circular_all)) {
            echo "<table id='dataTable' class='table table-striped table-bordered table-responsive-sm'>"; 
            echo "<thead><tr>";
            echo "<th style='width: 80px;'>Circular ID</th>
		  <th>Circular Type</th>
		  <th>Circular No.</th>
		  <th>Circular Title</th>
		  <th >Circular Date</th>
                  <th>Publish</th>
		  <th>Circular Department</th>
		  <!--<th>Circular PDF Link</th>		  		  
		  <th>Status</th>
		  <th>Download</th>-->
		  <th>Action</th>";
            echo "</tr></thead>";
            foreach ($circular_all as $key => $list) { {
                    echo "<tr>";
                    echo "<td>" . $list['circular_id'] . "</td>";
                    echo "<td>" . $list['circular_type'] . "</td>";
                    echo "<td>" . $list['circular_no'] . "</td>";
                    echo "<td>" . $list['circular_title'] . "</td>";
                    echo "<td>" . $list['circular_date'] . "</td>";
                    echo "<td>" . $list['publish_status'] . "</td>";
                    echo "<td>" . $list['circular_department'] . "</td>";
                    echo '<td  class="center">' . anchor('admin/circular/edit/' . $list['circular_id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                    anchor('admin/circular/delete/' . $list['circular_id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
                    echo "</tr>";
                }
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