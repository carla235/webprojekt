<?php

// Daten aus Formular werden an Parameter übergeben

    $artikelnummer = htmlspecialchars($_POST["artikelnummer"], ENT_QUOTES, "UTF-8");
    $artikelname = htmlspecialchars($_POST["artikelname"], ENT_QUOTES, "UTF-8");
    $marke = htmlspecialchars($_POST["marke"], ENT_QUOTES, "UTF-8");
    $ean = htmlspecialchars($_POST["ean"], ENT_QUOTES, "UTF-8");
    $preis = htmlspecialchars($_POST["preis"], ENT_QUOTES, "UTF-8");
    $groesse = htmlspecialchars($_POST["groesse"], ENT_QUOTES, "UTF-8");
    $menge = htmlspecialchars($_POST["menge"], ENT_QUOTES, "UTF-8");
    $artikelbeschreibung = htmlspecialchars($_POST["artikelbeschreibung"], ENT_QUOTES, "UTF-8");
    $details = htmlspecialchars($_POST["details"], ENT_QUOTES, "UTF-8");
    $dbfile = htmlspecialchars($_POST["bild"], ENT_QUOTES, "UTF-8");

//Wenn Felder nicht leer sind wird DB-Verbindung aufgenommen
    if (!empty($artikelnummer) &&!empty($artikelname) && !empty($marke) && !empty($ean) && !empty($preis) && !empty($groesse) && !empty($menge) && !empty($details) && !empty($artikelbeschreibung)) {


        try {

            include(dirname(_FILE) . "/../../account/userdata.php");

            $db = new PDO($dsn, $dbuser, $dbpass, $option);
            $query = $db->prepare(
                "UPDATE produktkatalog SET marke= :marke, artikelname= :artikelname, artikelbeschreibung= :artikelbeschreibung, 
                ean= :ean, preis= :preis, groesse= :groesse, menge= :menge, details= :details, bild= :bild WHERE artikelnummer = :artikelnummer" ); //neuer Inhalt wird reingeschrieben
            //Daten werden an Parameter gebunden
            $query->execute(array("marke" => $marke, "artikelname" => $artikelname, "artikelnummer" => $artikelnummer, "artikelbeschreibung" => $artikelbeschreibung,
                "ean" => $ean, "preis" => $preis, "groesse" => $groesse, "menge" => $menge, "details" => $details, "bild" => $dbfile));
            $db = null; //Update wird durchgeführt

            header('Location: ../../../index.php?page=shop'); //auf index (Startseite) zurückgeleitet
        } catch (PDOException $e) {
            echo "Error: Bitten wenden Sie sich an den Administrator!";
            die();
        }
    } else {
        echo "Error: Bitte alle Felder ausfüllen!";
    }




