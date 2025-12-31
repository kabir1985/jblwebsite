<!DOCTYPE html>
<html lang="en">
    <head>       
    </head>

    <body>

        <?php foreach ($page_details as $row) { ?>                         
            <?php echo $row->content; ?>
        <?php }
        ?>
        <iframe id="charge" style="border:1px solid #0099cc" title="PDF" src="<?php echo base_url();?>assets/file/Instruction_Circular-10742021.pdf" frameborder="1" scrolling="auto" height="700" width="100%"></iframe>
        
    </body>
</html>