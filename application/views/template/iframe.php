<!DOCTYPE html>
<html lang="en">
    <head>       
    </head>

    <body>
        <!--<input action="action" onclick="window.history.go(-1); return false;" type="submit" value="Back"/>-->
        <a id="backButtonHover" href="" onclick="backButton()">Previous</a>
        <iframe id="charge" style="border:1px solid #0099cc" title="PDF" src="<?php echo $fileLink; ?>" frameborder="1" scrolling="auto" height="700" width="100%"></iframe>       
        <script>
            function backButton() {
                window.history.back();
            }
        </script>
    </body>

</html>