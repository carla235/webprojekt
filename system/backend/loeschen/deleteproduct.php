<?php
include "../../../system/account/userdata.php";

if (isset($_GET['artikelnummer'])) {

    try {

        //include(dirname(_FILE) . "/../../account/userdata.php");
        $artikelnummer = $_GET['artikelnummer'];
        $db = new PDO($dsn, $dbuser, $dbpass, $option);
        $query = $db->prepare(
            "DELETE FROM produktkatalog WHERE artikelnummer= '$artikelnummer' ");         //Produkt wird geloescht
        $query->execute(array("marke" => $marke, "artikelname" => $artikelname, "artikelnummer" => $artikelnummer, "artikelbeschreibung" => $artikelbeschreibung, "ean" => $ean, "preis" => $preis, "groesse" => $groesse, "menge" => $menge, "details" => $details, "bild" => $dbfile));
        $db = null;

    } catch (PDOException $e) {
        echo "Error: Bitte wenden Sie sich an den Administrator!";
        die();
    }
} else {
    echo "Error!Bitte wenden Sie sich an den Administrator.";
    die();
}

include"productdeleted.php";



?>


