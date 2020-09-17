<?php
if (isset($_POST['signup-submit'])) {
    
    require 'dbh.inc.php';

    $userName = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    #error checks
    if (empty($userName) || empty($email) || empty($password) || empty($passwordRepeat)) {                  #EMPTY FIELDS
        header("Location: ../signup.php?error=emptyfields&uid=".$userName."&mail=".$email);
        exit();
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {   #BOTH EMAIL AND USERNAME ARE INVALID
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL )){                                                  #EMAIL IS INVALID BUT USERNAME IS NOT
        header("Location: ../signup.php?error=invalidmail&uid=".$userName);
        exit();
    }else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {                                                  #USERNAME IS INVALID BUT EMAIL IS NOT
        header("Location: ../signup.php?error=invaliduid&mail=".$email);            
        exit();
    }else if ($password !== $passwordRepeat){                                                               #PASSWORDS DO NOT MATCH
        header("Location: ../signup.php?error=passwordcheck&uid=".$userName."&mail=".$email);
        exit();
    }else if(!preg_match("/^[a-zA-Z0-9]*$/", $firstName)) {                                                  #INVALD FIRST NAME
        header("Location: ../signup.php?error=firstNameContent&uid=".$userName."&mail=".$email);            
        exit();
    }else if(!preg_match("/^[a-zA-Z0-9]*$/", $lastName)) {                                                  #INVALID LAST NAME
        header("Location: ../signup.php?error=lastNameContent&uid=".$userName."&mail=".$email);            
        exit();
    }else { #basicChecksPassed
        
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {                                                                #INVALID SQL SELECT STATMENT
          header("Location: ../signup.php?error=sqlerror");
        exit();  
        }
        else {
           mysqli_stmt_bind_param($stmt, "s", $userName);
           mysqli_stmt_execute($stmt);
           mysqli_stmt_store_result($stmt);
           $resultCheck = mysqli_stmt_num_rows($stmt);
           if ($resultCheck > 0) { #if the user already exists
                header("Location: ../signup.php?error=userTaken&mail=".$email);                                 #PRE-EXISTING USERNAME
                exit();
           }else{ #user does not exist -> insert

                $sql = "INSERT INTO users (firstName, lastName, uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {                                                         #INVALID SQL INSERT STATEMENT
                    header("Location: ../signup.php?error=sqlerror");
                    exit(); 
                }else{
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssss",$firstName, $lastName, $userName, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);

                    header("Location: ../signup.php?signup=success");                                            #SUCCESSFUL SIGNUP
                    exit();  
                }
            }
        }
    }
     mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{
    header("Location: ../signup.php");
    exit();
}