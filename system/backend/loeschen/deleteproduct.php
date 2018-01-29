<?php
include "../../account/userdata.php";


if (isset($_GET['artikelnummer'])) {

    try {

        include(dirname(_FILE) . "../../account/userdata.php");
        $artikelnummer= $_GET['artikelnummer'];
        $db = new PDO($dsn, $dbuser, $dbpass, $option);
        $query = $db->prepare(
            "DELETE FROM produktkatalog WHERE artikelnummer ='$artikelnummer'");         //Produkt wird geloescht
        $query->execute(array("artikelname" => $artikelname, "marke" => $marke, "ean" => $ean, "preis" => $preis, "groesse" => $groesse, "menge" => $menge, "artikelbeschreibung" => $artikelbeschreibung, "details" => $details, "bild" => $dbfile));
        //$db = null;
       // header('Location: ../../../index.php');          //auf index zurückgeleitet
    } catch (PDOException $e) {
        echo "Error: Bitten wenden Sie sich an den Administrator!";
        die();
    }
} else {
    echo "Error!Bitte wenden Sie sich an den Administrator.";
    die();
}
;

include"productdeleted.php";

//header("Location: ../../index.php");


