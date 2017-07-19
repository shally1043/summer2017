    <div class="title">
        Adopt A Pet
        <div class="controls">
        <?php
            if(isset($loggedIn) && $loggedIn){
                echo "Hello $loggedInUser->firstName $loggedInUser->lastName -- <a href='doLogout.php'>Log out</a>";
            }else{
                echo "<a href='login.php'>Please log in</a><a href='register.php'> or register.</a>";
            }
        ?>
        </div>

    </div>
