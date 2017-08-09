<?php
    include 'header.php';
    if(empty($_POST['address'])){
        $newLocation = $_SERVER['HTTP_REFERER'];
    }else{
        $newLocation = $_POST['address'];
    }
    header('Location: '.$newLocation);
?>