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
    
.menue li{
    display: inline;
    list-style: none;
    margin-left: 10px;
    margin-right: 10px;
   
   }
   
.menue a{
padding-left: 150px;
padding-right: 150px;
text-decoration: none;
color: black;
font-family: Arial;

}
    
.icons{
    position: relative;
   float:right;
     }
     
.icons a{
     margin-left:10px;
     margin-right:10px;
     }
    
</style>
</head>
<body>

         <div class='logo' align='center'><a href='index.php?page=start'><img src='Logo.png' width='200px' height='auto'></a></div>  <!-- Bildlogo wird aufgerufen = Titel der Website--> 

<div class='icons' >  <table>";
if (!isset ($_SESSION['kundennummer'])){
echo"
     <td><a href='index.php?page=login'><img src='usericon.png' width='30px' height='30px'></a></td><!-- AnmeldeIcon wird integriert -->";}
   else{
         echo"
    <td> <a href='index.php?page=logout'><img src='logout.png' width='30px' height='30px'></a></td> <!-- LogoutIcon -->";}
    echo"
      <td> <a href='index.php?page=warenkorb'><img src='shoppingicon.png' width='30px' height='30px'></a></td> <!--WarenkorbIcon wird integriert -->";


if(isset($_SESSION['kundennummer']) && ($_SESSION['kundennummer'])== '14') {
echo "<td> <a href='index.php?page=backend'><img src='add.png' width='30px' height ='30px'</a></td> 
      <td> <a href='index.php?page=bestelluebersicht'><img src='list.png' width='30px' height ='30px'</a></td>
<!-- Produkte hinzufuegen -->";

}
else{}
echo"</table>";

echo "  </div>     <!-- Menueleiste = Auflistung der Bestandteile als Links  -->
   
    
    <br> <br> 
 
 <ul class='menue'>
  <li><a href='index.php?page=start'>HOME</a></li>  
   <li><a href='index.php?page=shop'>SHOP</a></li>
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

        case "login":
            include "system/login.php";
            break;

        case"logout":
            include"system/logout.php";
            break;

        case"shop":
            include "system/shop.php";
            break;

        case"produkt":
            include "system/produkte/Produktansicht.php";
            break;

        case"backend":
            include"system/backend/productform.php";
            break;

        case"bearbeiten":
            include "system/backend/bearbeiten/form.php";
            break;
        case"warenkorb":
            include"system/warenkorb.php";
            break;
        case"kaufen":
            include"system/lieferadresse_form.php";
            break;

        case"übersicht":
            include"system/uebersicht_form.php";
            break;

        case"bestätigung":
            include "system/bestätigung.php";
            break;

        case"zahlung":
            include"system/zahlung.php";
            break;

        case"loeschen":
            include"system/backend/loeschen/deleteproduct.php";
            break;

        case"loeschenbestaetigung":
            include"system/backend/loeschen/productdeleted.php";
            break;

        case"kontaktaufnahme";
            include"system/kontaktaufnahme.php";
            break;

        case"bestelluebersicht";
            include"system/backend/backend_uebersicht.php";
            break;

        case"bestellposition";
            include "system/backend/uebersicht_position.php";
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

