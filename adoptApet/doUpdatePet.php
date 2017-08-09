<?php
    session_start();

    require "database.php";

    updatePet($_POST['species'],$_POST['breed'],$_POST['name'],$_POST['age'],$_POST['gender'],$_POST['avail'],$_POST['id']);

    header("Location: index.php");
    exit();

?>