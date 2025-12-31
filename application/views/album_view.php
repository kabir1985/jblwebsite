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

            .photo a img{
                /*height: 87% !important;*/
                filter: brightness(80%);
                -webkit-filter: brightness(80%);
                -moz-filter:  brightness(80%);
                -ms-filter:  brightness(80%);
                -o-filter:  brightness(80%);
                /*height: 170px !important;*/
                height: 30vh;
                width: 100% !important;
            }

            .photo a img:hover{
                filter: brightness(40%);
                -webkit-filter: brightness(40%);
                -moz-filter:  brightness(40%);
                -ms-filter:  brightness(40%);
                -o-filter:  brightness(40%);
            }

            .textBlock{
                /*text-align: center;
                 position: absolute;
                 top: 50%;
                 left: 50%;
                 z-index: 2;
                -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%)*/
                /*bottom: 20px;
                right: 20px;*/
                position: absolute;
                color: white;
                top: 50%;
                left: 50%;
                z-index: 1;
                -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%)
            }

            .textBlock .btn-outline-white {
                border-color: #fff;
                color: #fff;
                border-width: 2px;
                text-transform: uppercase;
                font-size: 11px;
                letter-spacing: .1em;
            }

            .textBlock .btn-outline-white:hover{
                background: #fff;
                color: #000;
            }

            .textBlock h2{
                font-size: 15px;
                font-weight: bold;
            }

        </style>
    </head>

    <body>

        <div class="pagination" id="albmPaginate"><?php echo $pagination; ?></div>
        <?php foreach ($results as $row) { ?> 
            <?php
            echo '<div class="gallery col-lg-3 col-md-6 col-sm-12 mt-1">';
            echo '<div class="photo"> <a href="' . base_url() . 'gallery/images/' . trim($row->albumID) . '"><img class="img-fluid" id="imgSize" src="' . base_url() . 'assets/album/' . $row->default_image . '" ></a></div> ';
            echo '<div class="textBlock"> <h2 class="title mb-3">' . $row->albumName . '</h2> <a href="' . base_url() . 'gallery/images/' . trim($row->albumID) . '" class="btn btn-outline-white">More Photos</a> </div> ';
            echo '</div>';
        }
        ?>  

    </body>
</html>

