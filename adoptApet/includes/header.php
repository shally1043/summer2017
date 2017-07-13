    <div class="title">
        Adopt A Pet
        <div class="controls">
        <?php
            if($loggedIn){
                echo "Hello $userFirstName $userLastName -- <a href='doLogout.php'>Log out</a>";
            }else{
                echo "<a href='login.php'>Please log in.</a>";
            }
        ?>
        </div>

    </div>
