<?php
/**
 * Created by PhpStorm.
 * User: carlastumpp
 * Date: 06.11.17
 * Time: 15:44
 */


session_start(); // Session wird gestartet

echo "

<!DOCTYPE html>
<html lang=\"en\">  
<head>
    <meta charset=\"UTF-8\">
    <title>ANNE KERN Concept Store</title>   <!-- Metadaten des Tabs -->
    <style>
    
 .menue   li{
    display: inline-block;
   
}
.menue a{
padding: 150px;
text-decoration: none;
color: black;
font-family: Arial;
}
    
    .icons{
    position: relative;
    bottom: 150px;
    float:right;
     }
     
     .icons a{
     margin:20px;
     }
    
</style>
</head>
<body>

         <div align='center'><a href='#'><img src='Logo.png' width='200px' height='auto'></a></div>  <!-- Bildlogo wird aufgerufen = Titel der Website--> 

<div class='icons' >    
       <a href='index.php?page=login'><img src='usericon.png' width='30px' height='auto'></a>  <!-- AnmeldeIcon wird integriert -->
       <a href='#'><img src='shoppingicon.png' width='30px' height='auto'></a></div> <!--WarenkorbIcon wird integriert -->
         
        <!-- Menueleiste = Auflistung der Bestandteile als Links  -->
    </table>
    
    <br> 
 
 <ul class='menue'>
  <li><a href='index.php?page=start'>HOME</a></li>  
   <li><a href=\"#\">SHOP</a></li>
   <li><a href='index.php?page=contact'>CONTACT</a></li>
   </ul>";
   



if (isset($_GET["page"])) {
    switch ($_GET["page"]) {
        case "start":
            include "system/start.php";
            break;

        case "contact":
            include "system/contact.php";
            break;

        case"login":
            include "system/login.php";
            break;

        default:
            include "system/start.php";
            break;

    }
}
else
{
    include "system/start.php";
}

echo "</body> </html>";

