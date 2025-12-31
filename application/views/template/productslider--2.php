<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/owlcarousel/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/owlcarousel/owl.theme.default.min.css">
        <script src="<?php echo base_url(); ?>assets/owlcarousel/owl.carousel.min.js"></script>

    </head>
    <body>
        <div class="owl-carousel">
            <div> <img src="<?php echo base_url(); ?>assets/images/productslider/owl1.jpg" alt=""/> </div>
            <div> <img src="<?php echo base_url(); ?>assets/images/productslider/owl2.jpg" alt=""/></div>
            <div> <img src="<?php echo base_url(); ?>assets/images/productslider/owl3.jpg" alt=""/> </div>
            <div> <img src="<?php echo base_url(); ?>assets/images/productslider/owl4.jpg" alt=""/> </div>
            <div> <img src="<?php echo base_url(); ?>assets/images/productslider/owl5.jpg" alt=""/> </div>
            <div> <img src="<?php echo base_url(); ?>assets/images/productslider/owl6.jpg" alt=""/> </div>
            <div> <img src="<?php echo base_url(); ?>assets/images/productslider/owl7.jpg" alt=""/> </div>
            <div> <img src="<?php echo base_url(); ?>assets/images/productslider/owl8.jpg" alt=""/> </div>
           
            <script src="<?php echo base_url(); ?>assets/owlcarousel/owl.carousel.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $(".owl-carousel").owlCarousel({
                        items: 3,
                        //stagePadding: 50,
                        margin:10,
                        autoplay: true,
                        autoplayTimeout: 2000,
                        //rtl: true,
                        //nav: true,
                        //slideBy: 1,
                        //lazyload:false,
                        //mergeFit: true,
                        //merge: true,
                        //loop: false,
                       // autoWidth:false,
                        rewind: true
                    });

                });
            </script>
        </div>
    </body>
</html>