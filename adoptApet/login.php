<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Adopt A Pet Login</title>
</head>
<body>
<?php
    if(isset($_SESSION['loginMessage'])){
        echo "<div class='loginMessage'>".$_SESSION['loginMessage']."</div>";
    }
?>
    <form action="doLogin.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" /><br/>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" /><br/>
        <input type="submit" value="Login" />
    </form>
</body>
</html>