<?php
    session_start();

    require "database.php";

    deletePet($_GET['id']);
    header("Location: index.php");
    exit();

?>