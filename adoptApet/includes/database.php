<?php

    class User{
        public $id;
        public $email;
        public $firstName;
        public $lastName;
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
        $result = $db->query("select id, email, firstName, lastName from users where email='$email'");
        if($result->num_rows > 0){
            $result->data_seek(0);
            $aRow = $result->fetch_assoc();
            $retVal->id = $aRow['id'];
            $retVal->firstName = $aRow['firstName'];
            $retVal->lastName  = $aRow['lastName'];
            $retVal->email     = $aRow['email'];
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

?>












