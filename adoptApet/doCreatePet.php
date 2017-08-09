<?php
    session_start();
    require "constants.php";
    require "database.php";


    $hasError = false;
    $errorMessage = "";

    if(empty($_POST['species'])){
        $errorMessage = $errorMessage."Please provide a species.<br/>";
        $hasError = true;
    }

    if(empty($_POST['breed'])){
        $errorMessage = $errorMessage."Please enter a breed.<br/>";
        $hasError = true;
    }

    if(empty($_POST['name'])){
        $errorMessage = $errorMessage."Please enter a name.<br/>";
        $hasError = true;
    }

    if(empty($_POST['age'])){
        $errorMessage = $errorMessage."Please enter an age.<br/>";
        $hasError = true;
    }

    if(empty($_POST['gender'])){
        $errorMessage = $errorMessage."Please provide a gender.<br/>";
        $hasError = true;
    }

    if(empty($_POST['avail'])){
        $errorMessage = $errorMessage."Please provide availability.<br/>";
        $hasError = true;
    }

    if($hasError){
        $_SESSION['createPetMessage'] = $errorMessage;
        header("Location: createPet.php");
        exit();
    }



    if($_FILES['photo']['error'] == 0){
        error_log("Using createPetWithPhoto");

        move_uploaded_file(
            $_FILES['photo']['tmp_name'],
            $imageFileLocation.$_FILES['photo']['name']
        );

        createPetWithPhoto($_POST['species'], $_POST['breed'], $_POST['name'], $_POST['age'], $_POST['gender'], $_POST['avail'], $_FILES['photo']['name']);

    }else{
        error_log("Using createPet");

        createPet($_POST['species'], $_POST['breed'], $_POST['name'], $_POST['age'], $_POST['gender'], $_POST['avail']);

    }
    header("Location: index.php");
    exit();

?>