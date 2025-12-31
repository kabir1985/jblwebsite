<a href="" class="scrollup">
    <i class="fa fa-angle-up"></i>
    </a>


    <script>
        $(window).scroll(function() {
            if ($(this).scrollTop() > 600) {
                $(".scrollup").fadeIn();
            } else {
                $(".scrollup").fadeOut();
            }
        });

        $(".scrollup").click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        })
    </script>
	