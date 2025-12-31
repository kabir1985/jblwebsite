<html>
    <head>
        <style>
            #thover{
                position:fixed;
                /*background:#000;*/
                width:100%;
                height:100%;
                /*opacity: .6*/
            }

            #tpopup{
                position:absolute;
                width:100%;
                height:180px;
                /*background:#fff;*/
                /*left:50%;*/
                top:20%;
                border-radius:5px;
                /*padding:60px 0;*/
                /*margin-left:-320px;  width/2 + padding-left */
                /*margin-top:-150px;  height/2 + padding-top */
                text-align:center;
                /*box-shadow:0 0 10px 0 #000;*/
                z-index: 1000;
                display: block;
                /*margin-left: 50%;*/
                /*margin-right: 50%;*/
            }
            #tpopup img{
                width: 55%;
            }

            #tclose{
                position:absolute;
                background:black;
                color:white;
                right:50%;
                left: 75%;
                /*top: 5px;*/
                top: inherit;
                border-radius:50%;
                width:30px;
                height:30px;
                line-height:30px;
                text-align:center;
                font-size:8px;
                font-weight:bold;
                font-family:'Arial Black', Arial, sans-serif;
                cursor:pointer;
                box-shadow:0 0 10px 0 #000;
            }
        </style>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/ajax/jquery-3.6.0.min.js"></script>   		  

        <script>
            $(document).ready(function () {

                $("#thover").click(function () {
                    $(this).fadeOut();
                    $("#tpopup").fadeOut();
                });


                $("#tclose").click(function () {
                    $("#thover").fadeOut();
                    $("#tpopup").fadeOut();
                });

            });
        </script>

    </head>
    <body>   
        <div id="tpopup">
            <?php
            foreach ($mdl as $row) {
                ?>
                <h4 style="font-family:kalpurush !important;color:#f33b51;font-size: 25px; position: relative; top: inherit;"><?php echo $row->title; ?> </h4>	
                <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/modal/<?php echo $row->image; ?>">
                <div id="tclose">X</div>    
            <?php } ?>
        </div>
    </body>

</html>