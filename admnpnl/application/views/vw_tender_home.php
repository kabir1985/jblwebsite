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
        <p><?php echo anchor("admin/tender/addTender", '<i class="fa fa-plus"></i> Add Tender', 'class="btn btn-primary"'); ?></p>
        <?php
        if (count($tender_all)) {

            echo "<table id='dataTable' class='table table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th> Tender ID </th>
		  <th> Title </th>		  
		  <th> Offered By </th>
		  <th> Starting Date </th>
		  <th> Closing Date </th>
		  <th>Status </th>		   	
		  <th> Action </th>";
            echo "</tr></thead>";
            foreach ($tender_all as $key => $list) {
                echo "<tr>";
                echo "<td>" . $list['tender_id'] . "</td>";
                echo "<td>" . $list['tender_title'] . "</td>";
                echo "<td>" . $list['tender_offered_by'] . "</td>";
                echo "<td>" . $list['tender_starting_date'] . "</td>";
                echo "<td>" . $list['tender_closing_date'] . "</td>";
                echo "<td>" . $list['tender_status'] . "</td>";
                echo '<td  class="center">' . anchor('admin/tender/edit/' . $list['tender_id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/tender/delete/' . $list['tender_id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
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