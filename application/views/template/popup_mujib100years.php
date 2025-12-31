<!DOCTYPE html>
<html>

    <head>

        <style>
            /*Original version for Mujib 100 years*/
            .modal-body {
                background-color: #000000;
                /* background-color: #0099cc;   */
                /* For browsers that do not support gradients */
                /* background-image: linear-gradient(#007bc2, white); */
                /* background-image: linear-gradient(#F4370F, black); */
                overflow: hidden;
            }



            /*for 21th FEB, 2022*/
            .modal-body{
                background-color: rgb(0,0,0);  /*For browsers that do not support gradients*/
                /* background-image: linear-gradient(#007bc2, #000);  */
                overflow: hidden;
            }


            /*for 16th december, 2021
            .modal-body{
                background-color: #0099cc; /* For browsers that do not support gradients 
                background-image: linear-gradient(#007bc2, white);
                overflow: hidden;
              }
            */
            .modal-dialog {
                width: 700px;
            }

            .modal-header {
                /*    padding: 9px 15px;
              border-bottom: 1px solid #eee;*/
                width: 530px;
            }

            .modal-body {
                width: 530px;
                /* width: 700px; */
                max-height:532px;
            }
            .modal-rti{
                width: 400px;
            }

            .modal-body img{
                margin-left: 0;
            }

            .modal-backdrop,
            .modal-backdrop.fade.in {
                opacity: 0.4;
                filter: alpha(opacity=80);
            }

            .tab {
                overflow: hidden;
                border: 1px solid #ccc;
                background-color: #f1f1f1;
                display: flex;
                font-family: Helvetica, Nikosh;
            }

            /* Style the buttons inside the tab */
            .tab button {
                background-color: inherit;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 55px;
                transition: 0.3s;
                font-size: 17px;
                font-family: Helvetica, Nikosh;
            }

            /* Change background color of buttons on hover */
            .tab button:hover {
                /*background-color: #0099cc;*/
            }

            /* Create an active/current tablink class */
            .tab button.active {
                background-color: #0099cc;
                color: white;
            }

            /* Style the tab content */
            .tabcontent {
                /*display: none;*/
                /*padding: 6px 12px;*/
                /*border: 1px solid #ccc;*/
                border-top: none;
            }

            /*.tabcontent #chairman_text{
            margin-top: 2px;
        }*/
            .modal-header .close {
                position: absolute;
                /* top: 2%; */
                top: 6%;
                /*for 16th December, 2021*/
                /*top: 15%;*/
                /*right: 3%;*/
                right: -37%;
                /* right: 25px; */

                /*for 16th December, 2021*/
                font-size: 21px;
                border: 1px solid #fff;
                border-radius: 50%;
                /*padding: 10px 14px;*/
                z-index: 9999;
                /*21st feb*/
                margin-top: -6px;
                color: white;
                background: #09c;
                padding: 5px 8px;
                /*21st feb*/
            }

            .text-block {
                position: absolute;
                bottom: 350px;
                right: 110px;
                /*background-color: black;*/
                color: white;
                padding-left: 20px;
                padding-right: 20px;
                font-family: NikoshBan,SolaimanLipi,Shonar Bangla, Nikosh;
                font-size: 30px;
            }

        </style>

    </head>

    <body>

<!--          <div id="myModal" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                   <img src="<?php //echo base_url();     ?>includes/images/logoMujib100.png"> 
                   <img src="<?php //echo base_url();     ?>includes/images/21-FEB-2023.jpg"> 
                  <img src="<?php echo base_url(); ?>assets/images/others/2023-AUG-15.jpg">
                </div>
        
              </div>
            </div>
          </div>-->

        <div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal Title Here</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

<img src="<?php echo base_url(); ?>assets/images/others/2023-AUG-15.jpg">

                    </div>
                </div>
            </div>
        </div>


        <script>
            $(document).ready(function () {
                $("#myModal").modal('show');
            });
        </script>

    </body>

</html>