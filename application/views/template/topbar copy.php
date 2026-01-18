<!DOCTYPE html>
<html>
    <head>
        <!--        <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
           <!--<link type="text/css" rel="stylesheet" href="<?php //echo base_url();      ?>bootstrap_46/css/bootstrap.min.css">-->
        <style>

            .topnav {
                overflow: hidden;
                /*background-color: #0099cc;*/
                width: 100%;
                text-align: center;
                /*height: 35px;*/
                height: 100%;
            }
            .topnav a {
                float: left;
                /*display: inline-block;*/
                color: #fff;
                text-align: center;
                padding: 5px 4px;
                text-decoration: none;
                font-size: 14px;
                font-family: Helvetica, Nikosh, SolaimanLipi,Sonar Bangla;
                font-weight: lighter;
            }

            .topnav a:not(:nth-last-of-type(1)):after{
                content: '|';
                color: #fff;
                padding: 0 0 0 8px;
            }

            .topnav .icon {
                display: none;
            }

            .topnav .search-container {
                float: right;
            }

            .topnav input[type=text] {
                /*padding: 6px;*/
                /*margin-top: 8px;*/
                font-size: 17px;
                border: none;
            }

            .topnav .search-container button {
                float: right;
                /*padding: 6px 10px;*/
                /*margin-top: 8px;*/
                margin-right: 16px;
                background: #ddd;
                font-size: 17px;
                border: none;
                cursor: pointer;
            }
            .topnav .search-container button:hover {
                background: #ccc;
            }

            /*new search bar*/

            .container-search {
                /*max-width: 50px;*/
                /*margin: 50px auto*/
            }

            .searchbar {
                position: relative;
                min-width: 50px;
                width: 0%;
                height: 31px;
                float: right;
                overflow: hidden;
                -webkit-transition: width 0.3s;
                -moz-transition: width 0.3s;
                -ms-transition: width 0.3s;
                -o-transition: width 0.3s;
                transition: width 0.3s
            }

            .searchbar-input {
                top: 0;
                right: 0;
                border: 0;
                outline: 0;
                background: #f33b51;
                width: 100%;
                height: 31px;
                margin: 0;
                padding: 0px 55px 0px 20px;
                font-size: 20px;
                color: #fff
            }

            .searchbar-input::-webkit-input-placeholder {
                color: #fff
            }

            .searchbar-input:-moz-placeholder {
                color: #fff
            }

            .searchbar-input::-moz-placeholder {
                color: #fff
            }

            .searchbar-input:-ms-input-placeholder {
                color: #fff
            }

            .searchbar-icon,
            .searchbar-submit {
                width: 50px;
                height: 31px;
                display: block;
                position: absolute;
                top: 0;
                font-family: verdana;
                font-size: 22px;
                right: 0;
                padding: 0;
                margin: 0;
                border: 0;
                outline: 0;
                /*line-height: 50px;*/
                text-align: center;
                cursor: pointer;
                color: #fff;
                background: #f33b51;
                border-left: 1px solid white
            }

            .searchbar-open {
                width: 20%
            }
            /*end new search bar*/

            @media screen and (max-width: 768px) {
                .topnav{
                    /*background: #5788eb;*/
                }
                .topnav a {
                    display: none;
                    color: #fff;
                    /*padding: 10px 20px;*/
                    /*box-shadow: 0 1px 0 #515354;*/
                    /*margin: 0 10px 0 10px;*/
                    border-bottom: 1px dotted #515354;
                }
                .topnav a:nth-last-of-type(1){
                    border-bottom: none;
                }
                .topnav a:before{
                    font-family: "FontAwesome";
                    content: "\f105";
                }

                .topnav a:after{
                    display: none;
                }

                /* bar*/
                .bar1, .bar2, .bar3 {
                    width: 28px;
                    height: 5px;
                    background-color: #FF69B4;
                    margin: 6px 5px;
                    transition: 0.4s;
                }
                .change .bar1 {
                    -webkit-transform: rotate(-45deg) translate(-9px, 6px);
                    transform: rotate(-45deg) translate(-9px, 6px);
                }

                .change .bar2 {
                    opacity: 0;
                }

                .change .bar3 {
                    -webkit-transform: rotate(45deg) translate(-8px, -8px);
                    transform: rotate(45deg) translate(-8px, -8px);
                }

                /* bar*/

                .topnav .icon {
                    float: right;
                    display: block;
                    cursor: pointer;
                }

                .topnav .search-container {
                    /*float: none;*/
                    display: none;
                }

                .topnav .searchbar {
                    /*float: none;*/
                    display: none;
                }

                .topnav input[type=text], .topnav .search-container button {
                    float: none;
                    display: block;
                    text-align: left;
                    width: 100%;
                    margin: 0;
                    padding: 14px;
                }
                .topnav input[type=text] {
                    border: 1px solid #ccc;
                }

            }

            @media screen and (max-width: 768px) {
                .topnav.responsive {
                    position: relative;
                }
                .topnav.responsive .icon {
                    position: absolute;
                    right: 0;
                    top: 0;
                }
                .topnav.responsive a {
                    float: none;
                    display: block;
                    text-align: left;
                }
            }
        </style>
    </head>
    <body>

        <div class="topnav" id="myTopnav">
            <a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a>
            <a href="<?php echo base_url(); ?>home/aml"> AML & CFT</a>
            <a href="<?php echo base_url(); ?>services/atm"> ATMs</a>
            <a href="<?php echo base_url(); ?>home/forms"> Forms</a>
            <a target="_blank" href="https://career.janatabank-bd.com/"> Career</a>
            <a target="_blank" href="https://elearning.jb.com.bd/"> e-Learning</a>
            <a target="_blank" href="https://jbaims.janatabank-bd.com/"> JBAIMS</a>
            <a target="_blank" href="https://jbone.janatabank-bd.com/UI/Core/User/Login"> JBOne</a>
            <a target="_blank" href="https://jbnikash.jb.com.bd"> JBNikash</a>
            <a target="_blank" href="https://omis.jb.com.bd/rpd/"> OMIS</a>
            <a target="_blank" href="https://pmis.janatabank-bd.com/"> PMIS</a>
            <a target="_blank" href="https://mail.janatabank-bd.com/"> Webmail</a>
            <!--a href="<?php echo base_url(); ?>home/tender"> Tender</a-->
            <a href="<?php echo base_url(); ?>Circular"> Circulars</a>
			<a href="<?php echo base_url(); ?>contact_us/complaint-cell"> Customer's Complaint</a>

            <!--            <button href="javascript:void(0);" class="icon" onclick="myFunction()">
                            <i class="fa fa-bars"></i>
                        </button>-->

            <span href="javascript:void(0);" class="icon" onclick="myFunction()">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </span>

            <!--            <div class="search-container">
                            <form action="/action_page.php">
                                <input type="text" placeholder="Search.." name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>-->

            <form class="searchbar" action="<?php echo base_url(); ?>home/search" method="POST"> 
                <input type="search" placeholder="Type Here......" name="search" class="searchbar-input" onkeyup="buttonUp();" required> 
                <input type="submit" class="searchbar-submit" value="GO"> 
                <span class="searchbar-icon"><i class="fa fa-search" aria-hidden="true"></i>
                </span> 
            </form>



        </div>

        <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                    x.classList.toggle("change");
                } else {
                    x.className = "topnav";
                }
            }
        </script>

        <!--script for search bar-->
        <script>
            $(document).ready(function () {
                var submitIcon = $('.searchbar-icon');
                var inputBox = $('.searchbar-input');
                var searchbar = $('.searchbar');
                var isOpen = false;
                submitIcon.click(function () {
                    if (isOpen === false) {
                        searchbar.addClass('searchbar-open');
                        inputBox.focus();
                        isOpen = true;
                    } else {
                        searchbar.removeClass('searchbar-open');
                        inputBox.focusout();
                        isOpen = false;
                    }
                });
                submitIcon.mouseup(function () {
                    return false;
                });
                searchbar.mouseup(function () {
                    return false;
                });
                $(document).mouseup(function () {
                    if (isOpen === true) {
                        $('.searchbar-icon').css('display', 'block');
                        submitIcon.click();
                    }
                });
            });
            function buttonUp() {
                var inputVal = $('.searchbar-input').val();
                inputVal = $.trim(inputVal).length;
                if (inputVal !== 0) {
                    $('.searchbar-icon').css('display', 'none');
                } else {
                    $('.searchbar-input').val('');
                    $('.searchbar-icon').css('display', 'block');
                }
            }
        </script>
        <!--script for search bar-->

    </body>
</html>
