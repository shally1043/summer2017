<?php
    session_start();
    $_SESSION['requestedURI'] = $_SERVER['REQUEST_URI'];
    $loggedIn = false;

    if(isset($_SESSION['email'])){
        $loggedIn = true;
        $userFirstName = $_SESSION['firstName'];
        $userLastName  = $_SESSION['lastName'];
        $userEmail     = $_SESSION['email'];
    }

?>