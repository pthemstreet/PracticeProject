<?php

require "header.php";
?>

    <main>
        <div class="wrapper-main">
            <section class="section-default">
                <?php
                    if (isset($_SESSION['userId']) && $_SESSION['userId'] == true) {
                        $userFName =  $_SESSION['firstName'];
                        $userLName =  $_SESSION['lastName'];
                        echo '<p class="login-status">You are logged in  as '. $userFName ." ". $userLName . '!</p> ';
                        echo '<p>This content is not visible unless logged in </p>';
                    }else{
                        echo '<p class="login-status">You are logged out!</p>';
                    }
                ?>
            </section>
        </div>        
    </main>

<?php
    require "footer.php";
?>