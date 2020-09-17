<?php
require "header.php";
?>

    <main>
        <div class="wrapper-main">
            <section class="section-default">
                <h1 class="signup-header">Signup</h1>
                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyfields") {
                            echo '<p class = "signuperror">Fill in all fields!</p>';
                        }
                        else if ($_GET["error"] == "invaliduidmail") {
                            echo '<p class = "signuperror">Invalid username and email! </p>';
                        }
                        else if ($_GET["error"] == "invaliduid") {
                            echo '<p class = "signuperror">Invalid username! </p>';
                        }
                        else if ($_GET["error"] == "invalidmail") {
                            echo '<p class = "signuperror">Invalid email! </p>';
                        }
                        else if ($_GET["error"] == "passwordcheck") {
                            echo '<p class = "signuperror">Your passwords do not match! </p>';
                        }
                        else if ($_GET["error"] == "usertaken") {
                            echo '<p class="signuperror">This username already exists, pick another!</p>';
                        }else if ($_GET["error"] == "firstNameContent") {
                            echo '<p class="signuperror">Invalid characters in first name!</p>';
                        }else if ($_GET["error"] == "lastNameContent") {
                            echo '<p class="signuperror">Invalid characters in last name!</p>';
                        }
                    }else if (isset($_GET["signup"])) {
                       echo '<p class="signupsuccess">Signup Successful!</p>';
                    }else {
                       // echo '<p class="signuphere">Signup Here!</p>';
                    }
                ?>
                    <form class="form-signup" action="includes/signup.inc.php" method="post">
                    
                        <input class="form-input" type="text" name="fName" placeholder="First Name" > <br />
                        <input class="form-input" type="text" name="lName" placeholder="Last Name"> <br />
                    <?php
                    if(isset($_GET["error"])){
                        
                        if ($_GET["error"] == "invalidmail") { #THE USERNAME IS VALID BUT EMAIL IS NOT
                            $userID = $_GET["uid"];
                            $outUNameString = '<input class="form-input" type="text" name="uid" placeholder="Username" value="'. $userID .'" > <br />';
                            echo $outUNameString;
                            echo'<input class="form-input" type="text" name="mail" placeholder="Email"> <br />';
                        }elseif($_GET["error"] == "invaliduid"){  #THE EMAIL IS VALID BUT THE USERNAME IS NOT
                            echo'<input class="form-input" type="text" name="uid" placeholder="Username"> <br />';
                            $userMail = $_GET["mail"];
                            $outMailString = '<input class="form-input" type="text" name="uid" placeholder="Username" value="'. $userMail .'" > <br />';
                            echo $outMailString;
                        } elseif($_GET["error"] == "invaliduidmail"){ #BOTH USERNAME AND EMAIL ARE INVALID
                            echo'<input class="form-input" type="text" name="uid" placeholder="Username"> <br />';
                            echo'<input class="form-input" type="text" name="mail" placeholder="Email"> <br />';
                        }else{  #BOTH USERNAME AND EMAIL ARE VALID
                            $userID = $_GET["uid"];
                            $outUNameString = '<input class="form-input" type="text" name="uid" placeholder="Username" value="'. $userID .'" > <br />';
                            echo $outUNameString;
                            $userMail = $_GET["mail"];
                            $outMailString = '<input class="form-input" type="text" name="uid" placeholder="Username" value="'. $userMail .'" > <br />';
                            echo $outMailString;
                        }
                    }else{
                        echo'<input class="form-input" type="text" name="uid" placeholder="Username"> <br />';
                        echo'<input class="form-input" type="text" name="mail" placeholder="Email"> <br />';
                    }        
                    ?>
                      <!--  <input class="form-input" type="text" name="uid" placeholder="Username"> <br /> 
                        <input class="form-input" type="text" name="mail" placeholder="Email"> <br /> -->

                        <input class="form-input" type="password" name="pwd" placeholder="Password"> <br />
                        <input class="form-input" type="password" name="pwd-repeat" placeholder="Repeat Password"> <br /> <br />
                        <button class="form-input" type="submit"name="signup-submit">Signup</button>
                    </form>
            </section>
        </div>        
    </main>

<?php
    require "footer.php";
?>