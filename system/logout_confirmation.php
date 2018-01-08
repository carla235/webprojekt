<?php
/**
 * Created by PhpStorm.
 * User: zigza
 * Date: 12/10/2017
 * Time: 10:20 PM
 */

session_destroy();

echo "Sie wurden erfolgreich Abgemeldet";

echo " 
 <html> 
 <head> 
 <style> 
 #logoutconfirmation {
    background-color: white;
    color: black ;
    padding: 2px 5px;
    margin: 8px 0;
    cursor: pointer;
    width: 175px; 
    border: 1px solid black;
} 

 
 </style>
 </head>
 <body> <div id='logoutconfirmation'> <a href='./index.php?page=start'>Zurück zur Startseite </a></li> </div>
 </body>
 </html> 
 ";
