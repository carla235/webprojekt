<?php
/**
 * Created by PhpStorm.
 * User: zigza
 * Date: 11/20/2017
 * Time: 12:30 PM
 */
session_destroy();

echo "Sie wurden erfolgreich Abgemeldet.";

echo " 
 <html> 
 <head> 
 <style> 
 div {
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
 <body> <div> <a href='index.php?page=start'>Zurück zur Startseite </a></li> </div>
 </body>
 </html> 
 ";



?>