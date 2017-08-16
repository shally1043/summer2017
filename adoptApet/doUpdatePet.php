<?php
    session_start();
    require "constants.php";
    require "database.php";

    // updatePet($_POST['species'],$_POST['breed'],$_POST['name'],$_POST['age'],$_POST['gender'],$_POST['avail'],$_POST['id']);
    if($_FILES['photo']['error'] == 0){
        error_log("Using updatePetWithPhoto");

        move_uploaded_file(
            $_FILES['photo']['tmp_name'],
            $imageFileLocation.$_FILES['photo']['name']
        );

        updatePetWithPhoto($_POST['species'], $_POST['breed'], $_POST['name'], $_POST['age'], $_POST['gender'], $_POST['avail'], $_FILES['photo']['name'],$_POST['id']);

    }else{
        error_log("Photo upload error code is: ".$_FILES['photo']['error']);
        error_log("Using updatePet");


        updatePet($_POST['species'], $_POST['breed'], $_POST['name'], $_POST['age'], $_POST['gender'], $_POST['avail'],$_POST['id']);

    }
    header("Location: index.php");
    exit();

?>