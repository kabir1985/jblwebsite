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
        <?php
        if (count($news_all)) {

            echo "<table id='dataTable' class='table table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>News ID</th>
		  <th>News Title</th>
		  <th>Date</th>		
		  <th>Status</th>
           <th>View</th>
		  <th>Action</th>";
            echo "</tr></thead>";
            //foreach ($categories as $key => $list)
            foreach ($news_all as $key => $list) {
                $url = substr(base_url(), 0, -8);
                echo "<tr>";
                echo "<td>" . $list['news_id'] . "</td>";
                echo "<td>" . $list['news_title'] . "</td>";
                echo "<td>" . $list['news_date'] . "</td>";
                if ($list['news_status'] == 'Not Approved') {
                    echo "<td style='color:red;'>Not Approved</td>";
                } else {
                    echo "<td style='color:green;'>Approved</td>";
                }
                echo "<td><a target='_blank' href=' " . $url . "assets/file/news/$list[news_links]'>View for Approval</a></td>";
                echo '<td  class="center"> ' . anchor('admin/news/approve/' . $list['news_id'], '<i class="fa fa-check-square-o"></i> Approve', 'class="btn btn-danger"') . '</td>';
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

