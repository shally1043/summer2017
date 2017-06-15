<!DOCTYPE html>
<html>
    <head>
        <title>Basics</title>
    </head>
    <body>
        <h2>Hello</h2>
        <hr />
        <strong>This is getdate()</strong><br />
        <?php
            $today = getdate();
            print_r($today);
        ?>
        <hr />
        <strong>This is date()</strong><br />
        <?php
            print 'Today is'.date('l, F j Y');
        ?>
        <hr />
        <strong>This is date() with the time</strong><br />
        <?php
            print 'Today is'.date('l, F j Y - H:i:s');
        ?>
    </body>
</html>
