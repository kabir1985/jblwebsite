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
        <p><?php echo anchor("admin/passport_noc/addNOC", '<i class="fa fa-plus"></i> Add NOC', 'class="btn btn-primary"'); ?></p>

        <?php
        if (count($noc_all)) {

            echo "<table  id='dataTable' class='table-striped table-bordered table-responsive-sm'>"; // class="table table-striped table-bordered bootstrap-datatable datatable"
            echo "<thead><tr>";
            echo "<th>SL</th>
		  <th>Employee Name <br> Designation</th>
		  <th>File No.</th>
		  <th>Issue Date</th>
		  <th>Validity Status</th>
		  <th>Upload Date</th>
		  <th>Status</th>
		  <th>Uploaded By</th>
		  <th>Actions</th>";
            echo "</tr></thead>";

            foreach ($noc_all as $key => $list) {

                echo "<tr>";
                echo "<td>" . $list['employee_id'] . "</td>";

                if ($list['validate_status'] == "Issue Date of NOC Expired!" && $list['status'] == "Inactive") {
                    echo "<td style='font-size:12px;color:#FF0000;font-weight:bold;'>" . $list['employee_name'] . ", " . $list['employee_desig'] . "</td>";
                } else {
                    echo "<td>" . $list['employee_name'] . "</br><p style='color:#0099cc;'>" . $list['employee_desig'] . "</p></td>";
                }
                echo "<td>" . $list['employee_file'] . "</td>";
                echo "<td>" . $list['noc_date'] . "</td>";

                if ($list['validate_status'] == "Issue Date of NOC Expired!" && $list['status'] == "Inactive") {

                    echo "<td style='font-size:12px;color:#FF0000;font-weight:bold;'>" . $list['validate_status'] . "</td>";
                } else {
                    echo "<td style='font-size:12px;color:#009933;font-weight:bold;'>Validity Active</td>";
                }
                echo "<td>" . $list['upload_date'] . "</td>";
                echo "<td>" . $list['status'] . "</td>";
                echo "<td>" . $list['upload_by'] . "</td>";

                echo '<td  class="center">' . anchor('admin/passport_noc/edit/' . $list['employee_id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/passport_noc/delete/' . $list['employee_id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';

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