<!DOCTYPE html>
<html lang="en">
    <head>       
    </head>

    <body>

        <?php foreach ($page_details as $row) { ?>                         
            <?php echo $row->content; ?>
        <?php }
        ?>
        
        <?php
        echo '<table class="table table-bordered table-striped table-responsive-sm"><tr><th>Image</th><th>Name</th><th>Address</th><th>Contacts</th></tr>';
        foreach ($subsidiary as $row) {
            echo '<tr class=""><td><img class="img-fluid" src="'.base_url().'assets/images/jec/'.$row['image'].'"> </td><td>' . $row['name'] . '</td><td>' . $row['address'] . '</td><td>' . $row['contacts'] . '</td></tr>';
        }
        echo '</table>';
        ?>      
    </body>
</html>