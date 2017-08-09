<?php
    session_start();

    $loggedIn = false;

    if(isset($_SESSION['email'])){
        $loggedIn = true;
        $userFirstName = $_SESSION['firstName'];
        $userLastName  = $_SESSION['lastName'];
        $userEmail     = $_SESSION['email'];
    }else{
        $_SESSION['loginMessage'] = "You must log in to view this page.";
        $_SESSION['requestedURI'] = $_SERVER['REQUEST_URI'];
        header("Location: login.php");
        exit();
    }

?>