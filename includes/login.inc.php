<?php

if (isset($_POST['login-submit'])) {

    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    $_SESSION['username'] = $mailuid;

    if (empty($password) || empty($mailuid)) {              #CHECK FOR EMPTY FIELDS
        header("Location: ../index.php?error=emptyfields");
        exit();
    }else{                                                  #CHECK FOR EXISTING USER
        $sql ="SELECT * FROM users WHERE uidUsers =? OR emailUsers =?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {            #CHECK FOR ERROR IN SQL STATEMENT
            header("Location: ../index.php?error=sqlerror");
            exit();
        }else{                                              #GET RESULT FROM DATABASE

            mysqli_stmt_bind_param($stmt,"ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {        #WILL BE TRUE IF THE RESULT EXISTS
                
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                

                if($pwdCheck == false){                     #INCORRECT PASSWORD

                    header("Location: ../index.php?error=incorrectLoginInfo");
                    exit();

                }elseif ($pwdCheck == true) {               #CORRECT PASSWORD

                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];
                    $_SESSION['firstName'] = $row['firstName'];
                    $_SESSION['lastName'] = $row['lastName'];

                    header("Location: ../index.php?login=success");
                    exit();

                }else{                                      #CLEANUP LOGIN

                    header("Location: ../index.php?error=incorrectLoginInfo");
                    exit();

                }

            }else{                                          #INCORRECT USERNAME
                header("Location: ../index.php?error=nonexistentuser");
                exit();
            }
        }
    }
}
else{                                                       #USER ARRIVED HERE BY ERROR
    header("Location: ../index.php");
    exit();
}