<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<link href="https/www.agranibank.org/style/css/custom.css" rel="stylesheet" type="text/css">-->
    <link href="<?php echo base_url(); ?>assets/custom_css/modal_bottom.css" type="text/css" rel="stylesheet">
</head>

<body>

    <div class="modal-strip bg-white reveal-modal">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow-hidden">
                    <!--<p class="mb0 pull-left">-->
                    <p class="mb0 pull-left">
                        <marquee class=""
                            style="font-size:18px; line-height:22px; color:#476EAE; font-weight:900; padding:5px;"
                            behavior="scroll" scrollamount="4" onmouseover="this.stop();" onmouseout="this.start();">
                            <?php foreach ($marquee as $row) { ?>
                            <img class="img-fluid" style="height: 40px; width: 46px;" class="icon"
                                src="<?php echo base_url(); ?>assets/images/others/<?php echo $row->image; ?>">
                            <?php
                                if ($row->link == '' || $row->link == null) {
                                    echo "$row->title";
                                } else {
                                    echo '<a  target="_blank" href=" ' . base_url() . 'assets/file/marquee/' . $row->link . ' ">' . $row->title . '</a>';
                                }
                                ?>
                            <?php } ?>
                        </marquee>
                    </p>
                </div>
            </div>
        </div>
        <!--<i class="fa fa-times close-modal" aria-hidden="true"></i>-->
        <div class="alert-close"> <i class="fa fa-times" aria-hidden="true" style="color: red;"></i></div>
    </div>
    <script type="text/javascript">
    $(window).on('load', function() {
        $('#bottom_modal').modal('show');
    });
    </script>

    <script>
    $(document).ready(function() {
        $('.alert-close').on('click', function() {
            $('.modal-strip').fadeOut('fast', function() {
                $('.modal-strip').remove();
            });
        });
    });
    </script>