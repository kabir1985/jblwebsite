<html>
    <head>
        <link href="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/css/jquery.dataTables.css" rel="stylesheet">
    </head>
    <body>
        <?php
        if (count($drpDnPages)) {
            echo "<table id='dataTable' class='table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>ID</th>
                  <th>Name</th>
	          <th>Title</th>
		  <th>Content</th>	   
		  <th>Status</th>			  
		  <th>Action</th>";
            echo "</tr></thead>";

            foreach ($drpDnPages as $key => $list) {
                echo "<tr>";
                echo "<td>" . $list['id'] . "</td>";
                echo "<td>" . $list['name'] . "</td>";
                echo "<td>" . $list['title'] . "</td>";
                echo "<td>" . $list['content'] . "</td>";
                echo "<td>" . $list['status'] . "</td>";
                echo '<td  class="center">' . anchor('admin/Pages/edit/' . $list['id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/Pages/delete/' . $list['id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/table/DataTables-1.11.2/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTable').DataTable({
                    pageLength: 5,
                    //lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
                    lengthMenu: [
                        [5, 10, 25, 50, -1],
                        [5, 10, 25, 50, 'All']
                    ]
                });
            });
        </script> 
    </body>
</html>
