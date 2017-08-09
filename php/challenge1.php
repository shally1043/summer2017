<?php
    function showme($someAssociativeArray){
        $keys = array_keys($someAssociativeArray);
        echo "<dl>";
        foreach($keys as $key) {
            echo( "<dt>".$key."</dt><dd>".$someAssociativeArray[$key]."</dd>");
        }
        echo "</dl>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Challenge 1</title>
    </head>
    <body>
        <h2>$_SERVER</h2>
        <?php showme($_SERVER); ?>
        <hr />
        <h2>$_REQUEST</h2>
        <?php showme($_REQUEST); ?>

    </body>
</html>