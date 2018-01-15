<?php
/**
 * Created by PhpStorm.
 * User: carlastumpp
 * Date: 11.12.17
 * Time: 16:48
 */
session_start();

$name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
$vorname = htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
$strasse = htmlspecialchars($_POST["strasse"], ENT_QUOTES, "UTF-8");
$plz = htmlspecialchars($_POST["plz"], ENT_QUOTES, "UTF-8");
$telefonnummer = htmlspecialchars($_POST["telefonnummer"], ENT_QUOTES, "UTF-8");
$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");


if (!empty($name) &&!empty($vorname) && !empty($strasse) && !empty($plz) && !empty($telefonnummer) && !empty($email)) {

    $kundennummer = $_SESSION['kundennummer'];

    try {
        //include_once("userdata.php");
        include(dirname(_FILE) . "/account/userdata.php");

        $db = new PDO($dsn, $dbuser, $dbpass, $option);
        $query = $db->prepare(
            "UPDATE benutzer SET name= :name, vorname= :vorname, strasse= :strasse, plz= :plz, telefonnummer= :telefonnummer, email= :email WHERE  kundennummer ='$kundennummer'" );       //neuer Inhalt wird reingeschrieben
        $query->execute(array("name" => $name, "vorname" => $vorname, "strasse" => $strasse, "plz" => $plz, "telefonnummer" => $telefonnummer, "email" => $email));
        $db = null;
        header("Location: ../index.php?page=zahlung");

    } catch (PDOException $e) {
        echo "Error: Bitten wenden Sie sich an den Administrator!";
        die();
    }
} else {
    echo "Error: Bitte alle Felder ausfüllen!";
}
