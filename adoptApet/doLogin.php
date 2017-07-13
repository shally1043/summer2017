<?php
    session_start();

    if(empty($_POST['email'])){
        $_SESSION['loginMessage'] = "Please provide an email.";
        header("Location: login.php");
        exit();
    }

    if(empty($_POST['password'])){
        $_SESSION['loginMessage'] = "Please provide a password.";
        header("Location: login.php");
        exit();
    }

    if($_POST['email'] == "person@place.com" && $_POST['password'] == "password"){
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['firstName'] = "Person";
        $_SESSION['lastName']  = "Jones";
        header("Location: ".$_SESSION['requestedURI']);
        exit();
    }else{
        $_SESSION['loginMessage'] = "Username or password is incorrect.";
        header("Location: login.php");
        exit();
    }

?>