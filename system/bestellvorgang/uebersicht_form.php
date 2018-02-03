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

.button {
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    height: 40px;
    width: 130px;
    background-color: white;
    color: black;
    border: 1px solid black;
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
<div class='col-sm'>
<div class=\"float-right\">


<h2> Betrag </h2>
<p>Zahlung mit

";
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
<input type='submit' value='Bestellung abschließen!' class='button' />
</form>";






$kundennummer = $_SESSION['kundennummer'];

try {
    include(dirname(_FILE) . "../../system/account/userdata.php");

    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM benutzer WHERE kundennummer=$kundennummer";
    $query = $db->prepare($sql);
    $query->execute();
    while ($zeile=$query->fetchObject()){

        echo"

<h1> Lieferadresse </h1> 


Name: $zeile->name <br>
Vorname: $zeile->vorname<br>
Straße: $zeile->strasse<br>
PLZ: $zeile->plz<br>
Telefonnummer: $zeile->telefonnummer<br>
E-mail: $zeile->email<br>

";
        echo "</div></div></div></div> </div>";

    }

    $db = null;
} catch (PDOException $e) {
    echo "Error!: Bitten wenden Sie sich an den Administrator...";
    die();
}


echo "</body>


</html>
";
?>

