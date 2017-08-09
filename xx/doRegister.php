<?php
    session_start();

    require "database.php";

    $hasError = false;
    $errorMessage = "";

    if(empty($_POST['email'])){
        $errorMessage = $errorMessage."Please provide an email.<br/>";
        $hasError = true;
    }else{
        // Email was passed in so we can check the DB for it
        if(userExists($_POST['email'])){
            $errorMessage = $errorMessage."That email is already registered.<br/>";
            $hasError = true;
        }
    }

    if(empty($_POST['firstName'])){
        $errorMessage = $errorMessage."What's your first name?<br/>";
        $hasError = true;
    }

    if(empty($_POST['lastName'])){
        $errorMessage = $errorMessage."What's your last name?<br/>";
        $hasError = true;
    }

    if(empty($_POST['password'])){
        $errorMessage = $errorMessage."Please provide a password.<br/>";
        $hasError = true;
    }

    if($hasError){
        $_SESSION['registrationMessage'] = $errorMessage;
        header("Location: register.php");
        exit();
    }

    createUser($_POST['email'], $_POST['firstName'], $_POST['lastName'], $_POST['password']);
    header("Location: login.php");
    exit();

?>