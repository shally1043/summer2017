<?php require "database.php"   ?>
<?php include "loginCheck.php" ?>
<?php
        $db = getDB();
        $result = $db->query("select id, species, breed, name, age, gender, avail from pets where id=".$_GET['id']);
        $result->data_seek(0);
        $aRow = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pet Details for <?=$aRow['name']?></title>
        <link rel="stylesheet" href="css/styles.css" />
    </head>
    <body>
    <?php include "header.php"; ?>

    <table id="petTable" border="1" width="100%">
        <tr>
            <td>Species</td>
            <td><?=$aRow['species']?></td>
        </tr>
        <tr>
            <td>Breed</td>
            <td><?=$aRow['breed']?></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><?=$aRow['name']?></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><?=$aRow['age']?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?=$aRow['gender']?></td>
        </tr>
        <tr>
            <td>Available</td>
            <td><?=$aRow['avail']?></td>
        </tr>
    </table>
    <a href="index.php">Home</a>

    </body>
</html>
