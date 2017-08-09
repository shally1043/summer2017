<?php
    session_start();
    $_SESSION['requestedURI'] = $_SERVER['REQUEST_URI'];
    $loggedIn = false;

    if(isset($_SESSION['user'])){
        $loggedIn = true;
        $loggedInUser = $_SESSION['user'];
    }

?>