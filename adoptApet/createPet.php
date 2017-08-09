<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Create a new pet</title>
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
<?php include "header.php"; ?>
<?php
    if(isset($_SESSION['createPetMessage'])){
        echo "<div class='createPetMessage'>".$_SESSION['createPetMessage']."</div>";
    }

?>
    <form enctype="multipart/form-data" action="doCreatePet.php" method="post">
        <label for="species">Species:</label>
        <input type="text" id="species" name="species" /><br/>

        <label for="breed">Breed:</label>
        <input type="text" id="breed" name="breed" /><br/>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" /><br/>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" min="1" /><br/>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="M">Male</option>
            <option value="F">Female</option>
            <option value="U">Unknown</option>
        </select>
        <br/>

        <label for="avail">Availability:</label>
        <select id="avail" name="avail">
            <option value="AVAILABLE">Available</option>
            <option value="UNAVAILABLE">Unavailable</option>
        </select>
        <br/>

        <label for="photo">Photo:</label>
        <input name="photo" id="photo" type="file" />
        <br/>

        <input type="submit" value="Create" />
    </form>
</body>
</html>














