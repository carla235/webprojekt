<?php
$artikelnummer= $_GET['artikelnummer'];

if (!empty($artikelnummer)) {
    $artikelnummer= $_GET['artikelnummer'];
    try {
        include "../../../system/account/userdata.php";

        $db = new PDO($dsn, $dbuser, $dbpass, $option);
        $query = $db->prepare(
            "DELETE FROM produktkatalog WHERE artikelnummer=$artikelnummer");

        $query->execute(array('artikelnummer'=>$artikelnummer, 'artikelname'=>$artikelname, 'marke'=>$marke, 'ean'=>$ean, 'preis'=>$preis, 'groesse'=>$groesse, 'artikelbeschreibung'=>$artikelbeschreibung, 'menge'=>$menge, 'details'=>$details, 'bild'=>$dbfile));

        $db = null;

        header ('Location:../../../index.php?page=shop');
        }

    catch (PDOException $e) {
        echo "Error: Bitte wenden Sie sich an den Administrator!";
        die();
    }


}
else {
    echo "Error!Bitte wenden Sie sich an den Administrator.";
    die();}
?>


