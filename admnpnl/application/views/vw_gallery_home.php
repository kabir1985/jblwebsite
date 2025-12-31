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

        <p><?php echo anchor("admin/photo_gallery/addPhotoGallery", '<i class="fa fa-plus"></i> Add Album', 'class="btn btn-primary"'); ?></p>

        <?php
        if (count($albums)) {

            echo "<table id='dataTable' class='table table-striped table-bordered table-responsive-sm'>"; 
            echo "<thead><tr>";
            echo "<th>Album ID</th>
		  <th>Album Name</th>		  
		  <th>Cover Photo</th>		  		  
		  <th>Description</th>
		  <th>Status</th>
		  <th>action</th>";
            echo "</tr></thead>";
            foreach ($albums as $key => $list) {
               $url = substr(base_url(), 0, -8);
                echo "<tr>";
                echo "<td>" . $list['albumID'] . "</td>";
                echo "<td>" . $list['albumName'] . "</td>";
                //echo "<td><img src= '".base_url()."assets/album/". $list['default_image'] ." '  height=50 width=75></td>\n";
                echo "<td><img src= '".$url."assets/album/" . $list['default_image'] . " '  height=50 width=75></td>\n";
                echo "<td>" . $list['albumDescription'] . "</td>";
                echo "<td>" . $list['albumStatus'] . "</td>";

                echo '<td  class="center">' . anchor('admin/photo_gallery/edit/' . $list['albumID'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/photo_gallery/delete/' . $list['albumID'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
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