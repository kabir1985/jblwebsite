<!DOCTYPE html>
<html lang="en">
    <head>       
    </head>
    <body>

        <?php foreach ($page_details as $row) { ?>                         
            <?php echo $row->content; ?>
        <?php }
        ?>
        <!--Image-->
        <?php
        foreach ($document_details as $doc_info) {

            echo '<img src="' . base_url() . 'assets/images/others/' . $doc_info->image . '" class="img-fluid">';
        }
        ?>
        <!--Image-->

    </body>
</html>