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
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
    <?php include "header.php"; ?>

    <form action="doUpdatePet.php" method="POST">
        <input type="hidden" name="id" value="<?=aRow['id']?>" />
        <table id="petTable" border="1" width="100%">
            <tr>
                <td>Species</td>
                <td><input type="text" name="species" id="species" value=<?=$aRow['species']?>></td>
            </tr>
            <tr>
                <td>Breed</td>
                <td><input type="text" name="breed" id="breed" value=<?=$aRow['breed']?>></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" id="name" value=<?=$aRow['name']?>></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="age" id="age" value=<?=$aRow['age']?>></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="text" name="gender" id="gender" value=<?=$aRow['gender']?>></td>
            </tr>
            <tr>
                <td>Available</td>
                <td><input type="text" name="avail" id="avail" value=<?=$aRow['avail']?>></td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Update">
    </form>
    <a href="index.php">Home</a>

    </body>
</html>
