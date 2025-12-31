<html>
    <head>
        <style>
            /* Firefox old*/
            @-moz-keyframes blink {
                0% {
                    opacity:1;
                }
                50% {
                    opacity:0;
                }
                100% {
                    opacity:1;
                }
            }

            @-webkit-keyframes blink {
                0% {
                    opacity:1;
                }
                50% {
                    opacity:0;
                }
                100% {
                    opacity:1;
                }
            }
            /* IE */
            @-ms-keyframes blink {
                0% {
                    opacity:1;
                }
                50% {
                    opacity:0;
                }
                100% {
                    opacity:1;
                }
            }
            /* Opera and prob css3 final iteration */
            @keyframes blink {
                0% {
                    opacity:1;
                }
                50% {
                    opacity:0;
                }
                100% {
                    opacity:1;
                }
            }
            .blink-image {
                -moz-animation: blink normal 2s infinite ease-in-out; /* Firefox */
                -webkit-animation: blink normal 2s infinite ease-in-out; /* Webkit */
                -ms-animation: blink normal 2s infinite ease-in-out; /* IE */
                animation: blink normal 2s infinite ease-in-out; /* Opera and prob css3 final iteration */
            }
        </style>
    </head>
    <body>
        <img class="blink-image" src="<?php echo base_url(); ?>assets/images/others/building.png">
    </body>
</html>
