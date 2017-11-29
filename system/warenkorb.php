<?php
session_start(); //Session wird wieder aufgenommen
echo "
<html>
<head>
<title>Warenkorb</title>
</head>
<body>
<h1>Mein Warenkorb</h1>
<br><br>";

try{
    $artikelnummer = $_GET["artikelnummer"];//Variable Artikelnummer wird definiert
    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM produktkatalog WHERE artikelnummer=$artikelnummer";
    $query = $db->prepare($sql);
    $query->execute();

    while ($zeile = $query->fetchObject()){
        if(!isset($_SESSION['wk'][$zeile->artikelnummer])) {
        echo"    <div class='bild'><img src= './images/$zeile->bild' width='300px' height='auto' >
                 <h1> $zeile->artikelname | $zeile->marke </h1>
                 PREIS: $zeile->preis € <br><br><br>";
    }}


echo "</body>


</html>
";

/**
 * Created by PhpStorm.
 * User: anna-mariaosterloh
 * Date: 29.11.17
 * Time: 10:15
 */