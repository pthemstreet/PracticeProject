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
To open the website properly I put these files in /wamp64/www in whatever directory WAMP is installed. Next, start WAMP, allow it to complete startup, then navigate to http://localhost/htdocs/PracticeProject/index.php. **_IF WAMP HAS NOT FINISHED STARTUP, YOU MAY ENCOUNTER ERRORS_**

Explanation of Files:

header.php/footer.php:
These file contains all of the header and footer elements for the "website". It is seperated from the rest of the document so that code need not be coppied between pages, only the header and footer be attached.

index.php:
This file is the "Home" page for the website and is the main page for the website. It does not necessairly have to be where you land on the website thanks to the nav bar, but this is the intended starting point. This page will notify you if you have been logged in and will eventually have content conditional upon said login status.

portfolio.php:
This file will eventually contain a copy of my resume and be viewable whether or not you are logged in. It will eventually have a download button, however, for now it may just be a pdf and have a link to a printable version.

signup.php:
This file is reached either by navigating directly to it or by clicking the "sign up" button (this should be in the top right of the screen if the CSS works properly).