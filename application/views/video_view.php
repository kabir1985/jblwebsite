<!DOCTYPE html>
<html lang="en">
    <head> 
        <style>

            #albmPaginate{
                margin-left: 16px;
            }

            .gallery{
                position: relative;
                float: left;
            }

            .responsive-iframe{
                /*position: absolute;*/
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                width: 100%;
                height: 100%;
            }

        </style>
    </head>

    <body>

        <div class="pagination" id="albmPaginate"><?php echo $pagination; ?></div>
        <?php foreach ($results as $row) { ?> 
            <?php
            echo '<div class="gallery col-lg-3 col-md-6 col-sm-12 mt-1">';
            echo '<iframe class="responsive-iframe"  sandbox="allow-same-origin allow-scripts" src="https://www.youtube.com/embed/' . $row->path . '" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
            echo '</div>';
        }
        ?>  

    </body>
</html>

