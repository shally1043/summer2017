<?php
    session_start();

    $loggedIn = false;

    if(isset($_SESSION['email'])){
        $loggedIn = true;
        $userFirstName = $_SESSION['firstName'];
        $userLastName  = $_SESSION['lastName'];
        $userEmail     = $_SESSION['email'];
    }

?>