<!DOCTYPE html>
<html lang="en">
    <head>       
    </head>

    <body>

        <?php foreach ($page_details as $row) { ?>                         
            <?php echo $row->content; ?>
        <?php }
        ?>
        <!--Start Script for Bank at a glance page-->
        <script>
            $(document).ready(function () {
                $(".tab-content").hide();
                $("ul.tabs li:first").addClass("current").show();
                $(".tab-content:first").show();
                //On Click
                $("ul.tabs li").click(function () {
                    $("ul.tabs li").removeClass("current");
                    $(this).addClass("current");
                    $(".tab-content").hide();
                    var activeTab = $(this).find("a").attr("href");
                    $(activeTab).fadeIn();
                    return false;
                });
            });
        </script>
        <!--End Script for Bank at a glance page-->

    </body>
</html>