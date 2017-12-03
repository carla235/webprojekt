<?php
include "./system/account/userdata.php";

session_start(); //Session wird wieder aufgenommen



echo "
<html>
<head>
<title>Warenkorb</title>
<style>
.produktinfos{
position: absolute;
width:200px;
left: 200px;
bottom: 120px;

}
.bild{
position: absolute; 
margin-left: 10px;
}

</style>
</head>
<body>
<h1>Mein Warenkorb</h1>
<br><br>";


        if (isset($_SESSION['warenkorb'])) { // Prüfen, ob Session-Variable für den Warenkorb existiert
            foreach($_SESSION['warenkorb']as $artikelnummer=> $artikelname){
               echo $bild['bild'];
               echo $artikelname['artikelname'];
               echo $marke['marke'];
               echo $preis['preis'];
            }
        }




echo "</body>


</html>
";

/**
 * Created by PhpStorm.
 * User: anna-mariaosterloh
 * Date: 29.11.17
 * Time: 10:15
 */