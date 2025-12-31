<html>
    <head>
        <link href="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/css/jquery.dataTables.css" rel="stylesheet">
    </head>
    <body>
<p><a href="<?php echo base_url(); ?>index.php/admin/userlog/print_log">Download / Print All Log</a></p>

        <?php
        if (count($log)) {

            echo "<table id=dataTable class='table table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>ID</th>
                  <th>Session_ID</th>
		  <th>User Name</th>
		  <th>Department</th>	   
                  <th>Login</th>
                  <th>Logout</th>";
            echo "</tr></thead>";
            foreach ($log as $key => $list) {
                echo "<tr>";
                echo "<td>" . $list['id'] . "</td>";
                echo "<td>" . $list['session_id'] . "</td>";
                echo "<td>" . $list['username'] . "</td>";
                echo "<td>" . $list['department'] . "</td>";
                echo "<td>" . $list['login'] . "</td>";
                echo "<td>" . $list['logout'] . "</td>";
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