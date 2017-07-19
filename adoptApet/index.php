<?php include "loginCheck.php" ?>
<?php require "database.php"   ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Adopt A Pet</title>
        <link rel="stylesheet" href="css/styles.css" />
    </head>
    <body>
    <?php include "header.php"; ?>
    <?php
        $db = getDB();
        $result = $db->query("select id, species, breed, name, age, gender, avail from pets");
    ?>
    <table id="petTable" border="1" width="100%">
        <thead>
            <tr>
                <td>Species</td>
                <td>Breed</td>
                <td>Name</td>
                <td>Age</td>
                <td>Gender</td>
                <td>Available</td>
            </tr>
        </thead>
        <tbody>
        <?php
            for($i = 0; $i < $result->num_rows; $i++){
                $result->data_seek($i);
                $aRow = $result->fetch_assoc();
        ?>
            <tr>
                <td><?=$aRow['species']?></td>
                <td><?=$aRow['breed']?></td>
                <td><?=$aRow['name']?></td>
                <td><?=$aRow['age']?></td>
                <td><?=$aRow['gender']?></td>
                <td><?=$aRow['avail']?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    Adopt a pet!
    </body>
</html>
