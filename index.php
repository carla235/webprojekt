<?php
/**
 * Created by PhpStorm.
 * User: carlastumpp
 * Date: 06.11.17
 * Time: 15:44
 */


include_once "userdata.php"; // Integration des Datenbankzugriffs
session_start(); // Session wird gestartet

echo "

<!DOCTYPE html>
<html lang=\"en\">  // Sprache: Deutsch 
<head>
    <meta charset=\"UTF-8\">
    <title>ANNE KERN Concept Store</title>   // Metadaten des Tabs 
    
</head>
<body>


    <table> 
         <td><a href='#'><img src='Logo.png' width='50px' height='auto'></a></td>   // Bildlogo wird aufgerufen = Titel der Website 
         <td><a href='#'><img src='usericon.png' width='50px' height='auto'></a></td>  // AnmeldeIcon wird integriert 
         <td><a href='#'><img src='shoppingicon.png' width='50px' height='auto'></a></td> //WarenkorbIcon wird integriert 
         
        // Menueleiste = Auflistung der Bestandteile als Links  
    </table>
    <br> 
  <UL>
   <li><a href=\"#\">HOME</a></li>  
   <li><a href=\"#\">SHOP</a></li>
   <li><a href=\"#\">CONTACT</a></li>
   </UL>";
   
   





  
           if (isset($_SESSION['userid'])) {
               echo"   <li><a href=\"index.php?page=logout\">Ausloggen</a></li>"; }
           else{
               echo"  <li><a href=\"index.php?page=login\">Einloggen</a></li>";}
echo"
            <li><a href=\"#\">About Me</a></li>
            <li><a href=\"#\">Andere Aktion</a></li>
            
          </ul>
        </li>
      </ul>
      
     
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>";


if (isset($_GET["page"]) ) {
    switch ($_GET["page"]) {
        case "blogposts":
            include "system/blogposts/posts.php";
            break;

        case "login":
            include "system/login/login.php";
            break;

        case "logout":
            include "system/login/logout.php";
            break;

        case "register":
            include "system/login/register.php";
            break;

        case "edit":
            //?id=".$_GET["id"]
            include "system/blogposts/bearbeiten.php";
            break;

        case "löschen":
            include "system/blogposts/löschen.php";
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