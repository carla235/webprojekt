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
    
</head>
<body>

         <div align='center'><a href='#'><img src='Logo.png' width='200px' height='auto'></a></div>  <!-- Bildlogo wird aufgerufen = Titel der Website--> 

<div align='right'>    <table> 
       <td><a href='#'><img src='usericon.png' width='30px' height='auto'></a></td>  <!-- AnmeldeIcon wird integriert -->
       <td><a href='#'><img src='shoppingicon.png' width='30px' height='auto'></a></td> </table></div> <!--WarenkorbIcon wird integriert -->
         
        <!-- Menueleiste = Auflistung der Bestandteile als Links  -->
    </table>
    <br> 
  <UL>
   <li><a href=\"index.php?page=start.php\">HOME</a></li>  
   <li><a href=\"#\">SHOP</a></li>
   <li><a href=\"index.php?page=contact.php\">CONTACT</a></li>
   </UL>";
   



if (isset($_GET["page"]) ) {
    switch ($_GET["page"]) {
        case "start":
            include "system/start.php";
            break;

        case "contact":
            include "system/contact.php";
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
echo"<br></body>
    </html>";