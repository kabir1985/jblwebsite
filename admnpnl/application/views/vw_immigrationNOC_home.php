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
        <p><?php echo anchor("admin/immigration_noc/addNOC", '<i class="fa fa-plus"></i> Add NOC', 'class="btn btn-primary"'); ?></p>

        <?php
        if (count($noc_all)) {

            echo "<table  id='dataTable' class='table-striped table-bordered table-responsive-sm'>"; // class="table table-striped table-bordered bootstrap-datatable datatable"
            echo "<thead><tr>";
            echo "<th>SL</th>
		  <th>Employee Name <br> Designation <br> File No</th>
                  <th>Days</th>
                  <th>Country</th>
                  <th>Purpose</th>
		  <th>Issue Date</th>
		  <th>Validity Status</th>
		  <th>Status</th>
		  <th>Actions</th>";
            echo "</tr></thead>";

            foreach ($noc_all as $key => $list) {

                echo "<tr>";
                echo "<td>" . $list['id'] . "</td>";

                if ($list['validate_status'] == "Issue Date of NOC Expired!" && $list['status'] == "Inactive") {
                    echo "<td style='font-size:12px;color:#FF0000;font-weight:bold;'>" . $list['name'] . ", " . $list['designation'] . "</td>";
                } else {
                    echo "<td>" . $list['name'] . "</br><span style='color:#0099cc;'>" . $list['designation'] . "</span> </br><span style='color:#f33b51;'>" . $list['fileNo'] . "</span></td>";
                }

                echo "<td>" . $list['approved_days'] . "</td>";
                echo "<td>" . $list['country'] . "</td>";
                echo "<td>" . $list['purposeOfTheVisit'] . "</td>";
                echo "<td>" . $list['noc_date'] . "</td>";

                if ($list['validate_status'] == "Issue Date of NOC Expired!" && $list['status'] == "Inactive") {

                    echo "<td style='font-size:12px;color:#FF0000;font-weight:bold;'>" . $list['validate_status'] . "</td>";
                } else {
                    echo "<td style='font-size:12px;color:#009933;font-weight:bold;'>Validity Active</td>";
                }

                echo "<td>" . $list['status'] . "</td>";


                echo '<td  class="center">' . anchor('admin/Immigration_noc/edit/' . $list['id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/Immigration_noc/delete/' . $list['id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';

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