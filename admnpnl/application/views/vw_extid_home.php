<html>
    <head>
        <link href="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/css/jquery.dataTables.css" rel="stylesheet">
    </head>
    <body>
<!--<p><a href="<?php //echo base_url(); ?>index.php/admin/userlog/print_log">Download / Print All Log</a></p>-->

        <?php
        if (count($log)) {

            echo "<table id=dataTable class='table table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th align='center'>Serial No.</th>
                  <th align='center'>Bank ID</th>
		  <th align='center'>User Name</th>
		  <th align='center'>External ID</th>
		  <th align='center'>Time</th>";
            echo "</tr></thead>";
            foreach ($log as $key => $list) {
                echo "<tr>";
                echo "<td align='center'>" . $list['gpid'] . "</td>";
                echo "<td align='center'>" . base64_decode($list['bank_id'], true) . "</td>";
                echo "<td align='center'>" . base64_decode($list['user_name'],true ). "</td>";
                echo "<td align='center'>" . base64_decode($list['external_id'], true) . "</td>";
				echo "<td align='center'>" . $list['dt_tm'] . "</td>";
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