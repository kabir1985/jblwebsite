<!DOCTYPE html>
<html lang="en">
    <head>       
    </head>

    <body>

        <?php foreach ($page_details as $row) { ?>                         
            <?php echo $row->content; ?>
        <?php }
        ?>
        <p style="text-align: right"> Figure in million (unless stated otherwise)</p>  

        <?php
        $sliced_array = array_slice($financial[0], 1, 7, true);
        if (count($financial)) {
            ?>
            <table class="table table-bordered table-striped">
                <thead valign='top'>
                    <?php
                    foreach ($sliced_array as $key => $list) {
                        $custom = substr($key, 0, 4);
                        echo "<th>$custom</th>";
                    }
                    ?>
                </thead>
                <tbody>
                    <?php
                    foreach ($financial as $key => $list) {
                        echo "<tr>";
                        $sliced_array2 = array_slice($list, 1, 7, true);
                        foreach ($sliced_array2 as $key1 => $value1) {
                            echo "<td>" . $value1 . "</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php } ?>


    </body>
</html>