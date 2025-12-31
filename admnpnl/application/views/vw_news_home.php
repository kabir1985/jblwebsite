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
        <p><?php echo anchor("admin/news/addNews", '<i class="fa fa-plus"></i> Add News', 'class="btn btn-primary"'); ?></p>
        <?php
        if (count($news_all)) {

            echo "<table id='dataTable' class='table table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>News ID</th>
		  <th>News Title</th>
		  <th>Date</th>		
		  <th>Status</th>
		  <th>Actions</th>";
            echo "</tr></thead>";
            //foreach ($categories as $key => $list)
            foreach ($news_all as $key => $list) {

                echo "<tr>";
                echo "<td>" . $list['news_id'] . "</td>";
                echo "<td>" . $list['news_title'] . "</td>";
                echo "<td>" . $list['news_date'] . "</td>";
                if ($list['news_status'] == 'Not Approved') {
                    echo "<td style='color:red;'>Not Approved</td>";
                } else {
                    echo "<td style='color:green;'>Approved</td>";
                }
                echo '<td  class="center">' . anchor('admin/news/edit/' . $list['news_id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/news/delete/' . $list['news_id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';

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
</body>
</html>