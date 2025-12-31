
<html>
    <head>
        <link href="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/css/jquery.dataTables.css" rel="stylesheet">
    </head>
    <body>

        <?php
        if (count($study_all)) {
            echo "<table id='dataTable' class='table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>SL</th>
		  <th>Title</th>
		  <th>Download</th>";
            echo "</tr></thead>";
            foreach ($study_all as $key => $list) {
                $url = substr(base_url(), 0, -8);
                echo "<tr>";
                echo "<td>" . $list['id'] . "</td>";
                echo "<td>" . $list['title'] . "</td>";
                //echo "<td><a href='" . $url . "assets/file/studyMaterial/" . $list['path'] . "'>Download</a></td>";
                echo "<td class='text-center'><a href='" . base_url() . 'index.php/admin/studyMaterial_jbsc/download_files/' . $list['id'] . "'><i class='fa fa-download'></i></a></td>";              
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