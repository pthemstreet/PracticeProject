<?php

session_start();
session_unset();        #unsets local values
session_destroy();      #destroys the session

header("Location: ../index.php"); #return to index