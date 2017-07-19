<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Adopt A Pet Registration</title>
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
<?php include "header.php"; ?>
<?php
    if(isset($_SESSION['registrationMessage'])){
        echo "<div class='registrationMessage'>".$_SESSION['registrationMessage']."</div>";
    }

?>
    <form action="doRegister.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" /><br/>

        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" /><br/>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" /><br/>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" /><br/>
        <input type="submit" value="Register" />
    </form>
</body>
</html>