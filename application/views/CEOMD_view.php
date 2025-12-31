<!DOCTYPE html>
<html lang="en">
    <head> 
        <style>
            .view_image {
                margin: 5px;
                padding: 5px;
                border: 0px solid #000000;
                height: auto;
                width: auto;
                float: left;
                text-align: center;
                border: 1px solid #0099cc;
                background: #D9ECF3;
            }

            .name{
                font-size: 18px;
                color: #0099cc;
                font-weight: bold;
                font-family: Nikosh,SolaimanLipi;
            }

            .designation{
                font-size: 16px;
                color:  #C70039;
                font-weight: bold;
                font-family: Nikosh,SolaimanLipi;
                margin-top: -30px !important;
            }

            .duration{
                color: red;
                font-size: 15px;
                margin-top: -30px !important;
            }
        </style>

    </head>

    <body>
        
        <?php foreach ($page_details as $row) { ?>                         
            <?php echo $row->content; ?>
        <?php }
        ?>
        <?php foreach ($md as $row) { ?>
            <?php
            echo '<div class="view_image"><img src="' . base_url() . 'assets/images/ceomd/' . $row['image'] . '" ><br><span class="name">' . $row['name'] . '</span><br><span class="designation">' . $row['designation'] . '</span><br><span class="duration"> ' . $row['duration'] . '</span></div>';
        }
        ?>
    </body>
    
</html>