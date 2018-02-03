<?php
/**
 * Created by PhpStorm.
 * User: carlastumpp
 * Date: 11.12.17
 * Time: 16:48
 */
session_start();

// Eingetragene aus Formular Daten werden an Parameter übergeben
$name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
$vorname = htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
$strasse = htmlspecialchars($_POST["strasse"], ENT_QUOTES, "UTF-8");
$plz = htmlspecialchars($_POST["plz"], ENT_QUOTES, "UTF-8");
$telefonnummer = htmlspecialchars($_POST["telefonnummer"], ENT_QUOTES, "UTF-8");
$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");

// Falls Felder nicht leer sind wird Kundennumeer aus Session gelesen und DB Verbindung gestartet
if (!empty($name) &&!empty($vorname) && !empty($strasse) && !empty($plz) && !empty($telefonnummer) && !empty($email)) {

    $kundennummer = $_SESSION['kundennummer'];

    try {
        //include_once("userdata.php");
        include(dirname(_FILE) . "./account/userdata.php");

        $db = new PDO($dsn, $dbuser, $dbpass, $option);
        $query = $db->prepare(
            // Daten werden geupdated
            "UPDATE benutzer SET name= :name, vorname= :vorname, strasse= :strasse, plz= :plz, telefonnummer= :telefonnummer, email= :email WHERE  kundennummer ='$kundennummer'" );       //neuer Inhalt wird reingeschrieben

       // Daten werden an Parameter gebunden
        $query->execute(array("name" => $name, "vorname" => $vorname, "strasse" => $strasse, "plz" => $plz, "telefonnummer" => $telefonnummer, "email" => $email));
        $db = null;
        header("Location: ../../index.php?page=zahlung");// Ist Update erfolgreich --> Weiterleitung an Zahlungsauswahl

    } catch (PDOException $e) {
        echo "Error: Bitten wenden Sie sich an den Administrator!";
        die();
    }
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
