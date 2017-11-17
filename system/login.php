<?php

echo"
<html>
<head>
<style>
.register {

float: right; 
margin-right: 300px;
margin-top: 50px;
}
.register input{
margin: 10px;

}
</style>
</head>
<body>";

// Beginn Registrierung
include_once("./system/account/userdata.php");
$name       = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
$vorname      = htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
$straße     = htmlspecialchars($_POST["straße"], ENT_QUOTES, "UTF-8");
$plz      = htmlspecialchars($_POST["plz"], ENT_QUOTES, "UTF-8");
$telefonnummer      = htmlspecialchars($_POST["telefonnummer"], ENT_QUOTES, "UTF-8");
$email      = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
$clean_passwort   = htmlspecialchars($_POST["passwort"], ENT_QUOTES, "UTF-8");

// Erzeuge Passwort-Hash
$passwort = password_hash($clean_passwort, PASSWORD_DEFAULT);

if (!empty($name) && !empty($vorname) && !empty($straße) && !empty($plz) && !empty($telefonnummer) && !empty($email) && !empty($passwort)) { // wenn diese Felder nicht leer
    // Registriere
    try {
        $db = new PDO($dsn, $dbuser, $dbpass, $option);
        $query = $db->prepare(//Eintrag der Daten in DB vorbereiten
            "INSERT INTO benutzer(name, vorname, straße, plz, telefonnummer, email, passwort) VALUES(:name, :vorname, :straße, :plz, :telefonnummer, :email, :passwort)"
        );
        $query->execute(array("name" => $name, "vorname" => $vorname,"straße" => $straße,"plz" => $plz,"telefonnummer" => $telefonnummer,"vorname" => $vorname, "email" => $email, "passwort" => $passwort));
        $db = null;// Daten werden eingetragen
    } catch (PDOException $x) {
    };
} else {
    $errorMessage = "Bitte füllen Sie alle Felder aus.";
}

echo"
<div class='register'>
<h1>Registrieren!</h1>
<form action='' method='post'>
Name:<input type='text' name='name'><br>
Vorname:<input type='text' name='vorname'><br>
Straße: <input type='text' name='straße'><br>
PLZ/Ort <input type='text' name='plz'><br>
Telefonnummer <input type='text' name='telefonnummer'><br>
e-mail<input type='text' name='e-mail'><br>
Passwort:<input type='password' name='passwort'><br>
<input type='submit' value='Registrieren!'>
</form>
</div>

</body>
</html>



";
/**
 * Created by PhpStorm.
 * User: anna-mariaosterloh
 * Date: 16.11.17
 * Time: 20:55
 */