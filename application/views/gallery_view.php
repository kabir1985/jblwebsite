<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lightbox/simple-lightbox.css"> 

        <style>
            .demo-container {
                position: relative;
            }

            .small-demo {
                width: 100%;
                float: left;
                padding: 0;
                margin: 0;
                /*background: #fff;*/
                background: #D9ECF3;
                box-shadow:0px 8px 12px 1px rgba(0,0,0, 0.49);
                -moz-box-shadow:0px 8px 12px 1px rgba(0,0,0, 0.49);
                -webkit-box-shadow:0px 8px 12px 1px rgba(0,0,0, 0.49);
                /*width: 60%;*/
                /*float: right;*/
            }

            .small-demo .caption {
                padding: 10px;
                color: #212121;
                font-size: 0.875rem;
            }

            .small-demo a {
                /*max-width: 33.3333333333333333333%;*/
                float: left;
                overflow: hidden;
            }
            .small-demo img {
                max-width: 100%;
                width: 100%;
                /*height: auto;*/
                height: 125px;
                display: block;
                -webkit-transition: -webkit-transform .35s ease;
                -moz-transition: -moz-transform .35s ease;
                -o-transition: -o-transform .35s ease;
                -ms-transition: -ms-transform .35s ease;
                transition: transform .35s ease;
            }

            .small-demo a:hover img {
                -webkit-transform: scale(1.05);
                -moz-transform: scale(1.05);
                -o-transform: scale(1.05);
                -ms-transform: scale(1.05);
                transform: scale(1.05);
            }

            .albumTitle{
                /*background: #b2babb;*/
                color: #f33b51;
                font-size: 16px;
                font-weight: 500;
                background: #D9ECF3;
                box-shadow:0px 8px 12px 1px rgba(0,0,0, 0.49);
                -moz-box-shadow:0px 8px 12px 1px rgba(0,0,0, 0.49);
                -webkit-box-shadow:0px 8px 12px 1px rgba(0,0,0, 0.49);
            }

            @media (max-width: 768px){
                .small-demo {
                    /*width: 100%;
                    float: none;*/
                    padding-left: 5px;
                    padding-right: 5px;
                }
            }
        </style>

    </head>

    <body>
        <a href="<?php echo base_url(); ?>"><i style="float: right; font-size: 20px;" class="fa fa-home"></i></a>
        <a href="<?php echo base_url(); ?>gallery/photo-gallery"><i class="fa fa-arrow-left"></i>Back</a>

        <?php
        $count = 0;
        foreach ($image as $row) {
            $count++;
            if ($count == 1) {
                echo '<div class="text-center albumTitle">' . $row->albumName . '</div>';
            }
        }
        ?>
        <?php foreach ($image as $row) { ?> 
            <?php
            echo '<div class="small-demo  col-lg-3 col-md-6 col-sm-12">';
            //echo '<div class="gallery"><a href="' . base_url() . 'assets/album/' . $row->imageName . '"><img class="80vh" src="' . base_url() . 'assets/album/' . $row->imageName . '" title=' . $row->caption . '/></a></div>';
            echo '<div class="gallery"><a href="' . base_url() . 'assets/album/' . $row->imageName . '"><img class="80vh" src="' . base_url() . 'assets/album/' . $row->imageName . '" /></a></div>';    
            echo '</div>';
        }
        //echo '<div class="text-center albumTitle">' . $row->albumName . '</div>';
        ?>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/lightbox/simple-lightbox.js"></script>
        <script>
            (function () {
                var $gallery = new SimpleLightbox('.gallery a', {});
            })();
        </script>
    </body>