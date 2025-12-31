<!DOCTYPE html>
<html lang="en">
    <head> 

    </head>

    <body>
        <div class="pagination"><?php  echo $pagination; ?></div>
        <?php foreach ($page_details as $row) { ?>                         
            <?php echo $row->content; ?>
        <?php }
        ?>
<!--        <div class="text-center">-->
            <?php foreach ($pub as $row) { ?>
                <?php
                echo '<div class="jbpublication col-sm-12 col-md-9 col-lg-2"><a target="blanks" href="'.base_url().'assets/file/documents/'.trim($row['path']).'"><img class="img-fluid" width="110px" height="140px" src="'.base_url().'assets/images/others/'.$row['image'].'" ></a><p class="title">'.$row['title'].'</p></div>';
                   }
            ?>
<!--        </div>-->

    </body>
</html>