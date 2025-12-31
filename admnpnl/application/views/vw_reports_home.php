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

        <p><?php echo anchor("admin/annual_reports/addAnnualReports", '<i class="fa fa-plus"></i> Add New Report', 'class="btn btn-primary"'); ?></p>
        <?php
        if (count($report)) {

            echo "<table id='dataTable' class='table table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>ID</th>
                  <th>Title</th>
		  <th>Report Date</th>
		  <th>Published Date</th>	   
                  <th>File</th>
                  <th>Status</th>
                  <th>Action</th>";
            echo "</tr></thead>";
            foreach ($report as $key => $list) {
                echo "<tr>";
                echo "<td>" . $list['annual_report_id'] . "</td>";
                echo "<td>" . $list['annual_report_title'] . "</td>";
                echo "<td>" . $list['annual_report_year'] . "</td>";
                echo "<td>" . $list['annual_report_published_date'] . "</td>";
                echo "<td>" . $list['annual_report_pdf_link'] . "</td>";
                echo "<td>" . $list['annual_report_status'] . "</td>";
                echo '<td  class="center">' . anchor('admin/annual_reports/edit/' . $list['annual_report_id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/annual_reports/delete/' . $list['annual_report_id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
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