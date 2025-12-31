<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/owlcarousel/owl.theme.default.min.css">

    <style>
        body {
            font-family: "Helvetica", "SolaimanLipi", "Sonar Bangla", sans-serif;
            background-color: #f9fcff;
        }

        h4.mt-4 {
            text-align: center;
            color: #0077b6;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        hr.ruler {
            width: 60%;
            margin: 10px auto 25px auto;
            border-top: 2px solid #0099cc;
            border-radius: 5px;
        }

        .owl-carousel .item {
            background: #ffffff;
            border-radius: 12px;
            padding: 15px;
            text-align: center;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border: 1px solid #e2f1f8;
        }

        .owl-carousel .item:hover {
            transform: translateY(-8px);
            box-shadow: 0 6px 18px rgba(0, 153, 204, 0.25);
        }

        .owl-carousel .item img {
            width: 100%;
            max-height: 180px;
            object-fit: contain;
            margin-bottom: 10px;
            transition: transform 0.3s ease;
        }

        .owl-carousel .item:hover img {
            transform: scale(1.05);
        }

        .itemHeading {
            background: linear-gradient(135deg, #0099cc, #7da6e1);
            color: #ffffff;
            font-weight: 500;
            margin: 10px 20px 0;
            padding: 8px 0;
            border-radius: 8px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-size: 14px;
        }

        .owl-nav button.owl-prev,
        .owl-nav button.owl-next {
            position: absolute;
            top: 40%;
            transform: translateY(-50%);
            background: #0099cc !important;
            color: #fff !important;
            border: none !important;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 18px !important;
            transition: all 0.3s ease-in-out;
        }

        .owl-nav button.owl-prev:hover,
        .owl-nav button.owl-next:hover {
            background: #0077b6 !important;
            transform: scale(1.1);
        }

        .owl-nav button.owl-prev {
            left: -25px;
        }

        .owl-nav button.owl-next {
            right: -25px;
        }

        .owl-dots {
            margin-top: 15px;
            text-align: center;
        }

        .owl-dot span {
            width: 12px;
            height: 12px;
            background: #d1e9f2;
            display: inline-block;
            border-radius: 50%;
            margin: 3px;
            transition: background 0.3s ease;
        }

        .owl-dot.active span {
            background: #0099cc;
        }

        .product_slider_left_margin {
            margin-left: 0 !important;
        }
    </style>
</head>

<body>
    <h4 class="mt-4">Janata Bank Products</h4>
    <hr class="ruler" />
<div class="container-fluid">
    <div class="owl-carousel owl-theme product_slider_left_margin">
        <div class="item">
            <a target="_blank" href="<?php echo base_url(); ?>products/scheme_deposit">
                <img src="<?php echo base_url(); ?>assets/images/productslider/deposit.png" alt="deposit" />
                <h4 class="itemHeading">Deposit Scheme</h4>
            </a>
        </div>

        <div class="item">
            <a target="_blank" href="<?php echo base_url(); ?>products/personal_loan">
                <img src="<?php echo base_url(); ?>assets/images/productslider/loan.png" alt="loan" />
                <h4 class="itemHeading">Personal Loan</h4>
            </a>
        </div>

        <div class="item">
            <a target="_blank" href="<?php echo base_url(); ?>home/pdfView">
                <img src="<?php echo base_url(); ?>assets/images/productslider/sme.png" alt="SME" />
                <h4 class="itemHeading">SME</h4>
            </a>
        </div>

        <div class="item">
            <a target="_blank" href="<?php echo base_url(); ?>products/credit_card">
                <img src="<?php echo base_url(); ?>assets/images/productslider/card.png" alt="card" />
                <h4 class="itemHeading">Credit Card</h4>
            </a>
        </div>
    </div>
    </div>

    <script src="<?php echo base_url(); ?>style/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/owlcarousel/owl.carousel.min.js"></script>

    <script>
        $('.owl-carousel').owlCarousel({
            autoplay: true,
            autoplayTimeout: 3500,
            smartSpeed: 800,
            items: 3,
            loop: true,
            margin: 20,
            nav: true,
            dots: true,
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            responsive: {
                0: { items: 1 },
                600: { items: 2 },
                1000: { items: 3 }
            }
        });
    </script>
</body>
