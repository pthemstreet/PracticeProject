Author: Philamon Hemstreet

Contact Me:

- pthemstreet@crimson.ua.edu

This is my first project using HTML, CSS, and PHP to create a basic login page.
This is actually my first project using HTML and CSS ... I also haven't used this much PHP ever, so be gentle.

Features:
-pretty decent CSS
-database connection
-working signup and login
-simple error handling
-content conditional upon login status

I use WAMP to run phpmyadmin and locally host the "website" as I do not have access to a web hosting yet (personal website + webhosting in progress).

HOW TO USE:
To open the website properly I put these files in /wamp64/www in whatever directory WAMP is installed. Next, start WAMP, allow it to complete startup, then navigate to http://localhost/htdocs/PracticeProject/index.php. **IF WAMP HAS NOT FINISHED STARTUP, YOU MAY ENCOUNTER ERRORS**

Explanation of Files:

header.php/footer.php:
These file contains all of the header and footer elements for the "website". It is seperated from the rest of the document so that code need not be coppied between pages, only the header and footer be attached.

index.php:
This file is the "Home" page for the website and is the main page for the website. It does not necessairly have to be where you land on the website thanks to the nav bar, but this is the intended starting point. This page will notify you if you have been logged in and will eventually have content conditional upon said login status.

portfolio.php:
This file will eventually contain a copy of my resume and be viewable whether or not you are logged in. It will eventually have a download button, however, for now it may just be a pdf and have a link to a printable version.

signup.php:
This file is reached either by navigating directly to it or by clicking the "sign up" button (this should be in the top right of the screen if the CSS works properly). This file displays the html form for signup and will will autofill the username and email if they were valid but there was an error elsewhere in the form (first and last name to be added later). It sends all values to signup.inc.php via POST methods so as not to put the data in the URL

The following files are put into the includes folder as they are php files that should not be directly visited by users

/includes/dbh.inc.php:
This file is purely for handling the connection to the database. If you change the name of the database or where it is hosted (or login info), this is where it is done. NOTE: default username/password for WAMP are "root" and ""(empty string).

/includes/login.inc.php:
This file handles the login process which includes checking parameters (such as empty fields and whether the username/email exists) and then starts a login session if the password matches the username/email. It also ensures that you didnt navigate directly to this script by checking to see whethere or not the 'login-submit' button has been activated.

/includes/logout.inc.php:
This file unsets local values and destroys the session. There is no check here to see if it was navigated to on purpose because it is meant for logging out.

/includes/signup.inc.php:
This file first ensures that you clicked the "signup-signup" button to get here. It then retrieves all of the local variables sent from signup.php. It checks these inputs for errors (pre-existing username/email, empty fields, etc.) and will return the user to signup.php with an error message if there is an error somewhere. It checks the inputs for SQL injections then ensures that the SQL statement created is valid. If all the checks are passed, the password is hashed using the PASSWORD_DEFAULT hashing algorithm and passes the SQL statement to the database and closes the connection.

