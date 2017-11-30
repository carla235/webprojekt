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

if (isset($_GET["artikelnummer"])){
    $artikelnummer = $_GET["artikelnummer"];//Variable Artikelnummer wird definiert

    try{

    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM produktkatalog WHERE artikelnummer=$artikelnummer";
    $query = $db->prepare($sql);
    $query->execute();


 while ($zeile = $query->fetchObject()) {
    $bild = $zeile->bild;
     $artikelname =$zeile->artikelname;
     $marke=$zeile->marke;
     $preis=$zeile->preis;

     $neu = array('bild'=>$bild, 'artikelname'=> $artikelname, 'marke'=>$marke, 'preis'=>$preis);
        $_SESSION["wk"][$artikelnummer]=$neu;

    }} catch(PDOException $e) {
    echo "Error!: Bitte wenden Sie sich an den Administrator!?..." . $e;
    die();}}


echo "</body>


</html>
";

/**
 * Created by PhpStorm.
 * User: anna-mariaosterloh
 * Date: 29.11.17
 * Time: 10:15
 */