<?php require "database.php"   ?>
<?php include "loginCheck.php" ?>


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
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
        <?php
            for($i = 0; $i < $result->num_rows; $i++){
                $result->data_seek($i);
                $aRow = $result->fetch_assoc();
        ?>
            <tr class="<?=$aRow['avail']?>">
                <td><?=$aRow['species']?></td>
                <td><?=$aRow['breed']?></td>
                <td><a href="petDetails.php?id=<?=$aRow['id']?>"><?=$aRow['name']?></a></td>
                <td><?=$aRow['age']?></td>
                <td><?=$aRow['gender']?></td>
                <td><?=$aRow['avail']?></td>
                <td>
                    <?php if(isAdminUser()){?>
                    <a href="doDeletePet.php?id=<?=$aRow['id']?>">X</a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php if(isAdminUser()){?>
    <a href="createPet.php">Add a pet</a>&nbsp;&nbsp;<br />
    <?php } ?>
    Adopt a pet!
    </body>
</html>















