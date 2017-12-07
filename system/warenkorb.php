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
margin-top:50px;
}

.produkt{

}

</style>
</head>
<body>
<h1>Mein Warenkorb</h1><div class='produkt'>
<br><br>";


        if (isset($_SESSION['warenkorb'])) { // Prüfen, ob Session-Variable für den Warenkorb existiert
            foreach($_SESSION['warenkorb']as $neu){
               echo "<img src='./../../images/".$neu['bild']."/'><br>";
               echo $neu['artikelname']."<br>";
               echo $neu['marke']."<br>";
               echo $neu['preis']."€<br><br><br>";
            }
        }
echo "</div>
<div class='Kosten'>
<h1>Kosten</h1>";

if (isset($_SESSION['warenkorb'])) { // Prüfen, ob Session-Variable für den Warenkorb existiert
    foreach($_SESSION['warenkorb']as $neu){
      echo $neu['preis']."€<br><br><br>";

    }
    }
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