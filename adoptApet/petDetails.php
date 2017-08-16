<?php require "database.php"   ?>
<?php include "loginCheck.php" ?>
<?php
        $db = getDB();
        $result = $db->query("select id, species, breed, name, age, gender, avail, photo from pets where id=".$_GET['id']);
        $result->data_seek(0);
        $aRow = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pet Details for <?=$aRow['name']?></title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" type="text/css" href="jsclippy/css/clippy.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="jsclippy/js/clippy.min.js"></script>
    </head>
    <body>

    <?php include "header.php"; ?>
    <script>
        function loadAgent(agentName){
            if(window.agent){
                window.agent.stop();
                window.agent.hide();
            }

            clippy.load(agentName, function(clippysAgent){
                window.agent = clippysAgent;
                window.agent.show();
                window.agent.moveTo( 200, 200 );
            });
        }
    </script>
    <form enctype="multipart/form-data" action="doUpdatePet.php" method="POST">
        <input type="hidden" name="id" value="<?=$aRow['id']?>" />
        <table id="petTable" border="1" width="100%">
            <tr>
                <td>Species</td>
                <td>
                    <?php if(isAdminUser()){?>
                        <input type="text" name="species" id="species" value=<?=$aRow['species']?>>
                    <?php } else { ?>
                        <?=$aRow['species']?>
                    <?php } ?>
                </td>

                <td rowspan="6">
                    <img style="width:600px;" src="<?=$imageURLPrefix?>/<?=$aRow['photo']?>" />
                    <?php if(isAdminUser()){?>
                        <input name="photo" type="file" />
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td>Breed</td>
                <td>
                    <?php if(isAdminUser()){?>
                        <input type="text" name="breed" id="breed" value=<?=$aRow['breed']?>>
                    <?php } else { ?>
                        <?=$aRow['breed']?>
                    <?php } ?>

                </td>
            </tr>
            <tr>
                <td>Name</td>
                <td>
                    <?php if(isAdminUser()){?>
                        <input type="text" name="name" id="name" value=<?=$aRow['name']?>>
                    <?php } else { ?>
                        <?=$aRow['name']?>
                    <?php } ?>


                </td>
            </tr>
            <tr>
                <td>Age</td>
                <td>
                    <?php if(isAdminUser()){?>
                        <input type="text" name="age" id="age" value=<?=$aRow['age']?>></td>
                    <?php } else { ?>
                        <?=$aRow['age']?>
                    <?php } ?>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <?php if(isAdminUser()){?>
                        <select id="gender" name="gender">
                            <option value="M" <?=("M" == $aRow['gender']) ? " SELECTED " : "" ?>>Male</option>
                            <option value="F" <?=("F" == $aRow['gender']) ? " SELECTED " : "" ?>>Female</option>
                            <option value="U" <?=("U" == $aRow['gender']) ? " SELECTED " : "" ?>>Unknown</option>
                        </select>
                    <?php } else { ?>
                        <?=$aRow['gender']?>
                    <?php } ?>

                </td>
            </tr>
            <tr>
                <td>Available</td>
                <td>
                    <?php if(isAdminUser()){?>
                        <select id="avail" name="avail">
                            <option value="AVAILABLE" <?=("AVAILABLE" == $aRow['avail']) ? " SELECTED " : "" ?> >Available</option>
                            <option value="UNAVAILABLE" <?=("UNAVAILABLE" == $aRow['avail']) ? " SELECTED " : "" ?> >Unavailable</option>
                        </select>
                    <?php } else { ?>
                        <?=$aRow['avail']?>
                    <?php } ?>
                </td>
            </tr>

        </table>
        <?php if(isAdminUser()){?>
            <input type="submit" name="submit" value="Update">
        <?php } ?>
    </form>
    <a href="index.php">Home</a>

    <script>
        loadAgent("Peedy");
        //window.agent.speak("This is <?=$aRow['name']?>");
        alert('<?=$aRow['name']?>');

        window.currentPet = {};
        window.currentPet.name = '<?=$aRow['name']?>';
        window.currentPet.age = <?=$aRow['age']?>
    </script>
    </body>
</html>




















