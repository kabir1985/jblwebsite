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
        <p><?php echo anchor("admin/TopModal/addModal", '<i class="fa fa-plus"></i> Add Modal', 'class="btn btn-primary"'); ?></p>
        <?php
        if (count($topmdl)) {

            echo "<table id='dataTable' class='table table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>ID</th>
		  <th>Title</th>
                  <th>Chairman Message</th>
                  <th>CEO & MD Message</th>
		  <th>Description</th>
                  <th>Display From</th>
                  <th>Expiry Date</th>
                  <th>Modal Type</th>
                  <th>Image Name</th>
		  <th>Actions</th>";
            echo "</tr></thead>";

            foreach ($topmdl as $key => $list) {
                $url = substr(base_url(), 0, -8);
                echo "<tr>";
                echo "<td>" . $list['id'] . "</td>";
                echo "<td>" . $list['title'] . "</td>";
                echo "<td>" . $list['chairman_msg'] . "</td>";
                echo "<td>" . $list['md_msg'] . "</td>";
                echo "<td>" . $list['description'] . "</td>";
                //echo "<td>" . $list['image'] . "</td>";
               // echo "<td><img src= '" . $url . "assets/images/others/" . $list['image'] . " '  height=50 width=55></td>\n";
                echo "<td>" . $list['valid_from'] . "</td>";
                echo "<td>" . $list['valid_until'] . "</td>";
                echo "<td>" . $list['type'] . "</td>";
                echo "<td>" . $list['image'] . "</td>";
                echo '<td  class="center">' . anchor('admin/TopModal/edit/' . $list['id'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/TopModal/delete/' . $list['id'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
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