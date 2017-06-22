<?php include 'header.php'?>
<!-- <?=var_dump($_POST)?> -->

    <?php
    if(isset($_SESSION['usersName'])){
        $usersName = $_SESSION['usersName'];
    }

    if(!isset($usersName)){
        if(!empty($_POST['name'])){
            $usersName = $_POST['name'];
            $_SESSION['usersName'] = $usersName;
        }  
    }
?>

<?php if(isset($usersName)){ ?>
    <h1>
    Hello <?=$usersName?><br/><br/>
    </h1>

    <?=$usersName?> is a nice name.  Your name has <?=strlen($usersName)?> letters in it.
    <p>Where do you want to go next?</p>
    <form action="goSomewhere.php" method="post">
        <label for="theAddress">Enter a URL:</label>
        <input type="text" id="theAddress" name="address"></input>
        <input type="submit"></input>
    </form>

<?php } else{ ?>
    <strong>Hey!</strong> I really need your name.
    <a href="hello.html">Tell me</a>
<?php } ?>