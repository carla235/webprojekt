<?php
include(dirname(__FILE__) . "/account/userdata.php"); // Inkludiere userdata

session_start();
$db = new PDO($dsn, $dbuser, $dbpass, $option);

$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");

if (!empty($email)) { // Wenn email nicht leer wird Passwort geprüft
    $errorMessage = "";
    $passwort = htmlspecialchars($_POST["passwort"], ENT_QUOTES, "UTF-8");

    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM benutzer WHERE email= :email";
    $query = $db->prepare($sql);
    $query->execute(array(':email' => $email));

    $zeile = $query->fetch();


    //Überprüfung des Passworts wenn e-mail stimmt


    if($zeile !== false && password_verify($passwort, $zeile["passwort"])) {
        $_SESSION['userid'] = $zeile['id'];
       header:("Location:index.php");
       die();
    }
    else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }
} else $errorMessage = "";


if (!empty($errorMessage)) {

    echo "<html> 
    <head><meta charset=\"UTF-8\">
    
    <body>" . $errorMessage;
    echo "
    </body>
    </html>";
}

/**
 * Created by PhpStorm.
 * User: anna-mariaosterloh
 * Date: 22.11.17
 * Time: 17:50
 */