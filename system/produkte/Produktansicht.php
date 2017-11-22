<?php

include(dirname(__FILE__) . "/../account/userdata.php");
echo"<html><body>";
try {
    $artikelnummer = (int)$_GET["artikelnummer"];
    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM produktkatalog WHERE artikelnummer=$artikelnummer";
    $query = $db->prepare($sql);
    $query->execute();

    while ($zeile = $query->fetchObject()) {
        echo    "<img scr= './system/produkte/images/$zeile->bild' width='200em' height='auto' >
                 <h1> $zeile->artikelname | $zeile->marke </h1><br>
                 EAN:$zeile->ean <br>
                 Preis: $zeile->preis <br>
                 Artikelbeschreibung:<br>
                 $zeile->artikelbeschreibung<br>
                 Details:<br>
                 $zeile->details<br>
                 
      
      ";}
      $db=null;}

catch (PDOException $e) {
    echo "Error!: Bitte wenden Sie sich an den Administrator!?..." . $e;
    die();}

        echo "</body></html>";


