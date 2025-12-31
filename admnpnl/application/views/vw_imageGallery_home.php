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

        <p><?php echo anchor("admin/photo_gallery/addImageToAlbum", '<i class="fa fa-plus"></i> Add Photos', 'class="btn btn-primary"'); ?></p>

        <?php
        if (count($photos)) {

            echo "<table id=dataTable class='table table-striped table-bordered table-responsive-sm'>";
            echo "<thead><tr>";
            echo "<th>Gallery ID</th>
				  <th>Image Name</th>		  
		          <th>Caption</th>		  		  
		          <th>Album ID</th>
		          <th>Status</th>
		          <th>action</th>";
            echo "</tr></thead>";
            foreach ($photos as $key => $list) {
                $url = substr(base_url(), 0, -8);
                echo "<tr>";
                echo "<td>" . $list['galleryID'] . "</td>";
                echo "<td><img src= '" . $url . "assets/album/" . $list['imageName'] . " '  height=50 width=75></td>\n";
                echo "<td>" . $list['caption'] . "</td>";
                echo "<td>" . $list['albumID'] . "</td>";
                echo "<td>" . $list['imageStatus'] . "</td>";

                echo '<td  class="center">' . anchor('admin/photo_gallery/imageToAlbumEdit/' . $list['galleryID'], '<i class="icon-edit icon-white"></i> Edit', 'class="btn btn-info"') . ' ' .
                anchor('admin/photo_gallery/imageToAlbumDelete/' . $list['galleryID'], '<i class="icon-trash icon-white"></i> Delete', 'class="btn btn-danger"') . '</td>';
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