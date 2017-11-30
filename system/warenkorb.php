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

try{
    $artikelnummer = $_GET["artikelnummer"];//Variable Artikelnummer wird definiert
    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM produktkatalog WHERE artikelnummer=$artikelnummer";
    $query = $db->prepare($sql);
    $query->execute();

    while ($zeile = $query->fetchObject()) {

            echo "    <div class='bild'><img src= './images/$zeile->bild' width='150px' height='auto'</div> 
                        <div class='produktinfos'                     
                      <h1> $zeile->artikelname | $zeile->marke </h1><br><br>
                       PREIS: $zeile->preis € <br><br><br></div>";

    }} catch(PDOException $e) {
    echo "Error!: Bitte wenden Sie sich an den Administrator!?..." . $e;
    die();}


echo "</body>


</html>
";

/**
 * Created by PhpStorm.
 * User: anna-mariaosterloh
 * Date: 29.11.17
 * Time: 10:15
 */