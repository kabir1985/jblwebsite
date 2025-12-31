<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quick Links</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('includes/font-awesome/css/font-awesome.css'); ?>" />

    <!-- Scrollbar Plugin -->
    <link rel="stylesheet" href="<?= base_url('assets/scrollbar/jquery.mCustomScrollbar.css'); ?>">
    <script src="<?= base_url('assets/scrollbar/jquery.mCustomScrollbar.min.js'); ?>"></script>

    <style>
        /* ===== Base ===== */
        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", kalpurush, sans-serif;
           /* background: linear-gradient(135deg, #d4f0ff, #ffffff);*/
        }

        /* ===== Container ===== */
        .quicklink-container {
            background: rgba(255, 255, 255, 0.85);
            border-radius: 14px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            padding: 10px;
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            overflow: hidden;
            position: relative;
        }

        /* ===== Decorative Gradient Line ===== */
        .quicklink-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 6px;
            border-radius: 14px 0 0 14px;
            background: linear-gradient(180deg, #0099cc, #22c55e);
        }

        /* ===== Banner ===== */
        .quicklink-banner img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 10px;
            box-shadow: 0 3px 10px rgba(0, 153, 204, 0.2);
            transition: transform 0.3s ease;
        }

        .quicklink-banner img:hover {
            transform: scale(1.02);
        }

        /* ===== Scroll Area ===== */
        .my-scroll {
            background: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            overflow-y: auto;
            padding: 10px 8px;
            transition: all 0.3s ease;
            scrollbar-width: thin;
            position: relative;
        }

        @media (min-width: 992px) {
            .my-scroll {
                height: 440px !important;
            }
        }

        /* ===== Link Items ===== */
        .my-scroll a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            margin: 8px 0;
            color: #333;
            font-size: 15px;
            background: linear-gradient(90deg, #f4faff, #ffffff);
            border-radius: 8px;
            text-decoration: none;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .my-scroll a:hover {
            background: linear-gradient(90deg, #0099cc, #00bcd4);
            color: #fff;
            transform: translateX(5px) scale(1.02);
            box-shadow: 0 6px 18px rgba(0, 153, 204, 0.35);
        }

        .my-scroll a i {
            font-size: 18px;
            color: #0099cc;
            background: rgba(0, 153, 204, 0.1);
            padding: 10px;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .my-scroll a:hover i {
            color: #fff;
            background: rgba(255, 255, 255, 0.3);
        }

        /* ===== Scrollbar Customization ===== */
        .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {
            background-color: #00a5d4 !important;
            border-radius: 10px;
        }

        .mCSB_scrollTools .mCSB_draggerRail {
            background-color: #b3e0f2 !important;
        }

        /* ===== Responsive Tweaks ===== */
        @media (max-width: 768px) {
            .my-scroll {
                height: auto;
                max-height: 360px;
            }
            .my-scroll a {
                font-size: 13px;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
<div class="container py-1">
    <div class="quicklink-container">
        <!-- Banner -->
        <div class="quicklink-banner">
            <img src="<?= base_url('assets/images/quicklink/quick_link.png'); ?>" alt="Quick Links">
        </div>

        <!-- Scrollable Links -->
        <div class="ScrollBar">
            <div class="my-scroll">
                <a target="_blank" href="<?= base_url('products/govt_loan'); ?>">
                    <i class="fa fa-file-text-o"></i>
                    সরকারি কর্মচারীদের গৃহ নির্মাণ/ফ্ল্যাট ঋণের আবেদন
                </a>

                <a target="_blank" href="<?= base_url('assets/file/home/bank_note_security_feature_poster.pdf'); ?>">
                    <i class="fa fa-money"></i>
                    টাকার নোটের নিরাপত্তা বৈশিষ্ট্য সম্বলিত পোস্টার
                </a>

                <a target="_blank" href="<?= base_url('home/financial_literacy'); ?>">
                    <i class="fa fa-university"></i> Financial Literacy
                </a>

                <a target="_blank" href="<?= base_url('home/training_plan'); ?>">
                    <i class="fa fa-user-circle"></i> Annual Training Plan of JBSC
                </a>

                <a target="_blank" href="<?= base_url('services/aof'); ?>">
                    <i class="fa fa-sticky-note"></i> Account Opening Form
                </a>

                <a target="_blank" href="<?= base_url('home/promotion'); ?>">
                    <i class="fa fa-briefcase"></i> Employee Promotion
                </a>

                <a target="_blank" href="http://114.130.43.51/">
                    <i class="fa fa-gavel"></i> e-Tender (BB Link)
                </a>

                <a target="_blank" href="<?= base_url('home/nrb_overview'); ?>">
                    <i class="fa fa-users"></i> NRB (Non Resident Bangladeshi) Branch
                </a>

                <a target="_blank" href="<?= base_url('home/aml'); ?>">
                    <i class="fa fa-shield"></i> Money Laundering & Terrorist Financing Prevention
                </a>
            </div>
        </div>
    </div>
    </div>

    <!-- Custom Scrollbar Script -->
    <script>
        (function ($) {
            $(window).on("load", function () {
                $(".my-scroll").mCustomScrollbar({
                    theme: "minimal-dark",
                    autoHideScrollbar: false,
                    scrollInertia: 100
                });
            });
        })(jQuery);
    </script>
</body>
</html>
