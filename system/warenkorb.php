<?php
include "./system/account/userdata.php";

session_start(); //Session wird wieder aufgenommen



echo "
<html>
<head>
<title>Warenkorb</title>
<style>


.Kosten{
float:right;
width:300px;
margin-top:-70px;
margin-right: 100px;
}

.produkt{
float: left; 
width: 400px;
margin-left: 30px;
}


.produktinfos{
margin-left: 150px;
position:relative; 
top: -150px;

}
</style>
</head>
<body>
<h1>Mein Warenkorb</h1><div class='produkt'>
<br><br>";


        if (isset($_SESSION['warenkorb'])) { // Prüfen, ob Session-Variable für den Warenkorb existiert
            foreach($_SESSION['warenkorb']as $neu){ // Gibt Artikelinformationen aus Session array aus
               $a = $neu['bild'];
                echo "<a href='#'><img src= './images/$a' width='100px' height='auto'></a>";
                echo "<div class='produktinfos'>";
                echo $neu['artikelname']." |  ";
                echo $neu['marke']."<br>";
                echo $neu['preis']."€<br><br><br></div>";
            }
        }



echo "</div>
<div class='Kosten'>
<h1>ZUSAMMENFASSUNG DEINER BESTELLUNG!</h1>";

if (isset($_SESSION['warenkorb'])) { // Prüfen, ob Session-Variable für den Warenkorb existiert
    foreach($_SESSION['warenkorb']as $neu){ // Gibt artikelname und Preis aus Session array aus


    echo $neu['artikelname']." | ";
    echo $neu['preis']."€<br><br><br>";

    }
    }
    echo"Versand: 4,90€ <br><br><br>";
    echo"Summe:<br>";



    echo"</div>";




echo "</body>


</html>
";

/**
 * Created by PhpStorm.
 * User: anna-mariaosterloh
 * Date: 29.11.17
 * Time: 10:15
 */