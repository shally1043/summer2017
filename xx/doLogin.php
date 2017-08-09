<?php
    session_start();

    require "database.php";

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

    if( checkPassword($_POST['email'], $_POST['password']) ){
        $_SESSION['user'] = getUser($_POST['email']);
         header("Location: ".$_SESSION['requestedURI']);
        exit();
    }else{
        $_SESSION['loginMessage'] = "Username or password is incorrect.";
        header("Location: login.php");
        exit();
    }

?>