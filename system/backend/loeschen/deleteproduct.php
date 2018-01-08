<?php
include "./system/account/userdata.php";

$dsn    = "mysql:dbhost=localhost;dbname=u-cs235";
$dbuser = "cs235";
$dbpass = "ohBahphae2";
$option = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

//include(dirname(__FILE__) . "../../account/userdata.php"); // Inkludiere userdata



if (!empty ($artikelnummer)) {

    try {
        //include_once("userdata.php");
        include(dirname(_FILE) . "/../../account/userdata.php");
        $artikelnummer= $_GET ['artikelnummer'];
        $db = new PDO($dsn, $dbuser, $dbpass, $option);
        $query = $db->prepare(
            "DELETE FROM produktkatalog WHERE artikelnummer= $artikelnummer");         //Produkt wird geloescht
        $query->execute(array("artikelname" => $artikelname, "marke" => $marke, "ean" => $ean, "preis" => $preis, "groesse" => $groesse, "menge" => $menge, "artikelbeschreibung" => $artikelbeschreibung, "details" => $details, "bild" => $dbfile));
        //$db = null;
       // header('Location: ../../../index.php');          //auf index zurückgeleitet
    } catch (PDOException $e) {
        echo "Error: Bitten wenden Sie sich an den Administrator!";
        die();
    }
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}




include 'productdeleted.php';

