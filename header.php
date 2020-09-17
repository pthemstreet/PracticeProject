<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <meta name= "description" content= "This is a test project to try and create a login for a website.">
        <meta name= "viewport" content = "width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./styles/styles.css">
        <title>Philamon Hemstreet</title>
    </head>
    <body>

        <header>
            <nav class="nav-header-main">
                <!--<a class="header-logo" href="#" >
                    <img src="img/logo.jpg" alt="logo">
                </a>-->
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="portfolio.php">Portfolio</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
                <div class="header-login">
                    <?php
                         if (isset($_SESSION['userId'])) {
                        echo '<form action="includes/logout.inc.php" method="post">
                        <button type="submit" name = "logout-submit">Logout</button>
                    </form>';
                    
                    }else{
                        echo '<form action="includes/login.inc.php" method="post">
                        <input type="text" name="mailuid" placeholder="Username/Email">
                        <input type="password" name="pwd" placeholder="Password">
                        <button type="submit" name = "login-submit">Login</button>
                    </form>
                    <a href="signup.php">Signup</a>';
                    }
                    ?>

                    
                    
                </div>
            </nav>
        </header>