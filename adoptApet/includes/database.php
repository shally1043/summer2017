<?php

    class User{
        public $id;
        public $email;
        public $firstName;
        public $lastName;
        public $isAdmin;
    }

    function isAdminUser(){
        if(!isset($_SESSION['user'])){
            return false;
        }

        return $_SESSION['user']->isAdmin;
    }

    function getDB(){
        $mysql = new mysqli("localhost", "root", "root", "adoptapet", 3306);

        if($mysql->connect_errno){
            echo("Failed to connect to the database.".$mysql->error);
        }

        return $mysql;
    }

    function getUser($email){
        $retVal = new User();
        $db = getDB();
        $result = $db->query("select id, email, firstName, lastName, admin from users where email='$email'");
        if($result->num_rows > 0){
            $result->data_seek(0);
            $aRow = $result->fetch_assoc();
            $retVal->id = $aRow['id'];
            $retVal->firstName = $aRow['firstName'];
            $retVal->lastName  = $aRow['lastName'];
            $retVal->email     = $aRow['email'];
            $retVal->isAdmin   = ($aRow['admin'] == 'Y');
        }
        return $retVal;
    }

    function userExists($email){
        $retVal = false;

        $db = getDB();

        $result = $db->query("select email from users where email = '$email'");

        if($result->num_rows > 0){
            $retVal = true;
        }

        return $retVal;
    }

    function createUser($email, $firstName, $lastName, $password){
        $db = getDB();
        $pstmt = $db->prepare("insert into users (email, firstName, lastName, password) values (?, ?, ?, ?)");
        $pstmt->bind_param('ssss', $email, $firstName, $lastName, $password);
        $pstmt->execute();
    }

    function createPetWithPhoto($species, $breed, $name, $age, $gender, $avail, $photo){
        $db = getDB();
        $pstmt = $db->prepare("insert into pets (species, breed, name, age, gender, avail, photo) values (?, ?, ?, ?, ?, ?, ?)");
        $pstmt->bind_param('sssisss', $species, $breed, $name, $age, $gender, $avail, $photo);
        $pstmt->execute();
    }

    function createPet($species, $breed, $name, $age, $gender, $avail){
        $db = getDB();
        $pstmt = $db->prepare("insert into pets (species, breed, name, age, gender, avail) values (?, ?, ?, ?, ?, ?)");
        $pstmt->bind_param('sssiss', $species, $breed, $name, $age, $gender, $avail);
        $pstmt->execute();
    }

    function checkPassword($email, $password){
        $db = getDB();
        $result = $db->query("select * from users where email = '$email' and password='$password'");
        return ($result->num_rows > 0);
    }

    function deletePet($id){
        $db = getDB();
        $pstmt = $db->prepare("delete from pets where id=?");
        $pstmt->bind_param('i', $id);
        $pstmt->execute();
    }

    function updatePet($species, $breed, $name, $age, $gender, $avail,$id){
        $db = getDB();
        $pstmt = $db->prepare("update pets set species=?,breed=?,name=?,age=?,gender=?,avail=? where id=?");
        $pstmt->bind_param('sssissi', $species, $breed, $name, $age, $gender, $avail, $id);
        $pstmt->execute();
    }

    function updatePetWithPhoto($species, $breed, $name, $age, $gender, $avail, $photo, $id){
        $db = getDB();
        $pstmt = $db->prepare("update pets set species=?,breed=?,name=?,age=?,gender=?,avail=?,photo=? where id=?");
        $pstmt->bind_param('sssisssi', $species, $breed, $name, $age, $gender, $avail, $photo, $id);
        $pstmt->execute();
    }
    //"update pets set species='$species', breed='$breed',name='$name',age='$age',gender='$gender',avail='$avail' where id=?"
?>












