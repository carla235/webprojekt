<?php
session_start();

//DB-Verbindung wird aufgenommen
    try {
        include "./../account/userdata.php";
        // Daten aus SESSIONs werden ausgelesen und gleich an Parameter gebunden
        $kundennummer = $_SESSION['kundennummer'];
        $zahlung = $_SESSION['zahlung'];
        $eingangsdatum = date("Y-m-d");
        $db = new PDO($dsn, $dbuser, $dbpass, $option);
        $query = $db->prepare(//Eintrag der Daten in DB vorbereiten

            //Die entsprechenden Daten werden in die tabelle Bestellübersicht gebunden
            "INSERT INTO bestelluebersicht (kundennummer, eingangsdatum, zahlungsdaten) VALUES(:kundennummer, :eingangsdatum, :zahlungsdaten);"
        );

        //Daten werden an Parameter gebunden
        $query->execute(array("kundennummer"=>$kundennummer, "eingangsdatum"=>$eingangsdatum, "zahlungsdaten"=>$zahlung));
        $db = null;// Daten werden eingetragen

        // Generierte Bestellnummer herausfinden
        $db = new PDO($dsn, $dbuser, $dbpass, $option);
        $query = $db->prepare(//Eintrag der Daten in DB vorbereiten
            "SELECT bestellnummer FROM bestelluebersicht WHERE kundennummer=$kundennummer ORDER BY bestellnummer DESC;"
        );
        $query->execute();
        $zeile = $query->fetchObject();
        $bestellnummer = $zeile->bestellnummer;
        $db = null;// Daten werden eingetragen,


        // Mit Bestellnummer einzelne Artikel in DB eintragen
        $db = new PDO($dsn, $dbuser, $dbpass, $option);
        foreach($_SESSION["warenkorb"] as $artikel){
            $query = $db->prepare(
                "INSERT INTO bestellposition (bestellnummer, artikelnummer) VALUES(:bestellnummer, :artikelnummer);"
            );
            $query->execute(array("bestellnummer"=>$bestellnummer, "artikelnummer"=>$artikel["artikelnummer"]));
        }
        $db = null;

        $db = new PDO($dsn, $dbuser, $dbpass, $option);
        $query = $db->prepare(//Eintrag der Daten in DB vorbereiten
            "SELECT email FROM benutzer WHERE kundennummer=$kundennummer;"
        );
        $query->execute();
        $zeile = $query->fetchObject();

        $empfaenger = "<$zeile->email>";
        $betreff = "Bestätigung ihrer Bestellung!";
        $from = "From: ANNE KERN Concept Store <ao027@hdm-stuttgart.de>";
        $text = "Hallo! 
                   Vielen Dank für ihre Bestellung!
                   Ihre Bestellung wird in Kürze versandt!
                   
                   Viel Spaß mit ihren neuen Produkten
                   Ihr ANNE KERN Concept Store
                  ";

        mail($empfaenger, $betreff, $text, $from);

        header("Location:../../index.php?page=bestätigung");

    } catch (PDOException $x) {
        echo $x->getMessage();
    };






/**
 * Created by PhpStorm.
 * User: anna-mariaosterloh
 * Date: 15.01.18
 * Time: 15:07
 */