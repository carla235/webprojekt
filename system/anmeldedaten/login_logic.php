<?php

include  "../account/userdata.php"; // Inkludiere userdata
session_start();

$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
if(!empty($email)) { // Wenn email nicht leer wird Passwort geholt aus Formular
    $errorMessage = "";
    $passwort = htmlspecialchars($_POST["passwort"], ENT_QUOTES, "UTF-8");

    //Wenn email und Passwort eingetragen sind wird DB-Verbindung aufgebaut
    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM benutzer WHERE email= :email  ";
    $query = $db->prepare($sql);
    $query->execute(array(':email' => $email, ));

    $zeile = $query->fetch();

    //Überprüfung des Passworts wenn e-mail stimmt
   if($zeile !== false && password_verify($passwort, $zeile["passwort"])) {
        // Ist Anmeldung erfolgreich wird Session aufgenommen
        $_SESSION['kundennummer'] = $zeile['kundennummer'];
         header("Location:../../index.php");

   } else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }
}




/**
 * Created by PhpStorm.
 * User: anna-mariaosterloh
 * Date: 22.11.17
 * Time: 17:50
 */