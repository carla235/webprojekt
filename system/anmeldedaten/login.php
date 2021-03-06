<?php
include_once("./system/account/userdata.php");

echo "
<html>
<head>
<style>

.register {
    float: right; 
}

.register input{
    margin: 10px;
}

.login{
    float: left; 
}

.login input{
    margin: 10px;
}

label {
    width: 10em;
    display: block;
    float: left;
}
</style>
</head>

<body>";


if (isset($_SESSION['kundennummer'])) { //Falls Nutzer angemeldet inkludiere Möglichkeit des Logout
    include './system/anmeldedaten/logout.php';
} else {


    echo "
<div class=\"container\"> <div class=\"row\">

<!-- Login Formular -->
 <div class=\"col-sm\">
 <div class='login'> 
 <h1>Login! </h1>
    <form action='./system/anmeldedaten/login_logic.php' method='post'>
       <label for=\"email\">E-Mail:</label>
    <input type='text' name='email'><br>
       <label for=\"passwort\">Passwort:</label>
<input type='password' name='passwort'><br>
<input type='submit' value='Einloggen!'>
    </form>
</div></div>
";

//Beginn Registrierungsvorgang

    //Daten aus Formular werden an Parameter übergeben
    $name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
    $vorname = htmlspecialchars($_POST["vorname"], ENT_QUOTES, "UTF-8");
    $strasse = htmlspecialchars($_POST["strasse"], ENT_QUOTES, "UTF-8");
    $plz = htmlspecialchars($_POST["plz"], ENT_QUOTES, "UTF-8");
    $telefonnummer = htmlspecialchars($_POST["telefonnummer"], ENT_QUOTES, "UTF-8");
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
    $clean_passwort = htmlspecialchars($_POST["passwort"], ENT_QUOTES, "UTF-8");

// Erzeuge Passwort-Hash
    $passwort = password_hash($clean_passwort, PASSWORD_DEFAULT);

    // Falls Folgende Felder nicht leer sind beginnt die Registrierung --> Daten werden in die DB geschrieben
    if (!empty($name) && !empty($vorname) && !empty($strasse) && !empty($plz) && !empty($telefonnummer) && !empty($email) && !empty($passwort)) { // wenn diese Felder nicht leer

        // Registriere --> Neue Datenbankverbindung wird aufgebaut
        try {
            $db = new PDO($dsn, $dbuser, $dbpass, $option);
            $query = $db->prepare(//Eintrag der Daten in DB vorbereiten
                "INSERT INTO benutzer(name, vorname, strasse, plz, telefonnummer, email, passwort) VALUES(:name, :vorname, :strasse, :plz, :telefonnummer, :email, :passwort);"
            );
            // Daten werden an Parameter gebunden
            $query->execute(array("name" => $name, "vorname" => $vorname, "strasse" => $strasse, "plz" => $plz, "telefonnummer" => $telefonnummer, "email" => $email, "passwort" => $passwort));
            $db = null;// Daten werden eingetragen

        } catch (PDOException $x) {
        };

        //Bei erfolgreicher Registrierung wird man zurück auf die Startseite geleitet
        header("Location:index.php");

    } else {
        $errorMessage = "Bitte füllen Sie alle Felder aus.";
    }

//Restrierungsformular
    echo "
 <div class=\"col-sm\">
 <div class='register'>
<h1>Registrieren!</h1><br>

<form action='' method='post'>
   <label for=\"name\">Name:</label>
<input type='text' name='name'><br>
   <label for=\"vorname\">Vorname:</label>
<input type='text' name='vorname'><br>
   <label for=\"strasse\">Straße:</label>
<input type='text' name='strasse'><br>
   <label for=\"plz\">PLZ/Ort:</label>
<input type='text' name='plz'><br>
   <label for=\"telefonnummer\">Telefonnummer:</label>
<input type='text' name='telefonnummer'><br>
   <label for=\"email\">E-Mail:</label>
<input type='text' name='email'><br>
   <label for=\"password\">Passwort:</label>
<input type='password' name='passwort'><br>
<input type='submit' value='Registrieren!'>
</form>
</div>
</div>
</div>

</body>
</html>



";

}

/**
 * Created by PhpStorm.
 * User: anna-mariaosterloh
 * Date: 16.11.17
 * Time: 20:55
 */