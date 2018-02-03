<?php
/**
 * Created by PhpStorm.
 * User: carlastumpp
 * Date: 11.12.17
 * Time: 18:32
 */
session_start();
echo " 
<html> 

<head> 
<style> 

.produkt{
float: left; 
width: 400px;
margin-left: 30px;
}


.produktinfos{
margin-left: 150px;
position:relative; 
top: -150px;

}

</style>
</head>

<body>";

echo "

<h1>ZUSAMMENFASSUNG DEINER BESTELLUNG!</h1><br><br>
<div class='container'> <div class='row'>
    <div class=\"col-sm\">
   ";

if (isset($_SESSION['warenkorb'])) { // Prüfen, ob Session-Variable für den Warenkorb existiert
    foreach($_SESSION['warenkorb']as $neu){ // Gibt Artikelinformationen aus Session array aus
        $a = $neu['bild'];
        echo "<a href='#'><img src= './images/$a' width='100px' height='auto'></a>";
        echo "<div class='produktinfos'>";
        echo $neu['artikelname']." |  ";
        echo $neu['marke']."<br>";
        echo $neu['preis']."€<br><br><br></div>";
    }
}



echo "</div>
    
<div class='col-sm-4'>




<h2> Betrag </h2>
<p>Zahlung mit

";

//ausgewählte Zahlungsmethode wird ausgelesen
$zahlung = $_POST['Zahlmethode'];
echo $zahlung;
echo"</p><br>";

$_SESSION["zahlung"] = $zahlung;


if (isset($_SESSION['warenkorb'])) { // Prüfen, ob Session-Variable für den Warenkorb existiert
    foreach($_SESSION['warenkorb']as $neu){ // Gibt artikelname und Preis aus Session array aus


        echo $neu['artikelname']." | ";
        echo $neu['preis']."€<br><br><br>";

    }
}



echo"Versand: 4,90€ <br><br><br>";
echo"Summe:<br><br><br>";

echo"
<form method='post' action='./system/bestellvorgang/bestellung_do.php'>
<input type='submit' value='KAUFEN!' class='button'/>
<br>    
</form>";
// Kundennummer wird aus Session ausgelesen (angemeldeter Nutzer) und an Parameter übergeben
$kundennummer = $_SESSION['kundennummer'];

//DB verbindung wird aufgebaut
try {
    include(dirname(_FILE) . "../../system/account/userdata.php");

    $db = new PDO($dsn, $dbuser, $dbpass, $option);

    //Datensätze aus der Zeile der Kundennummer wird ausgewählt
    $sql = "SELECT * FROM benutzer WHERE kundennummer=$kundennummer";
    $query = $db->prepare($sql);
    $query->execute();
    while ($zeile=$query->fetchObject()){

echo"
<br>    
<h2> Lieferadresse </h2>


Name: $zeile->name <br>
Vorname: $zeile->vorname<br>
Straße: $zeile->strasse<br>
PLZ: $zeile->plz<br>
Telefonnummer: $zeile->telefonnummer<br>
E-mail: $zeile->email<br>

";
    }

    $db = null;
} catch (PDOException $e) {
    echo "Error!: Bitten wenden Sie sich an den Administrator...";
    die();
}



echo "</div></div></div></div> </div>";
echo "</body>


</html>
";
?>

