<?php
/**
 * Created by PhpStorm.
 * User: carlastumpp
 * Date: 11.12.17
 * Time: 18:32
 */

echo " 
<html> 

<head> 
<style> 
body {
height: 100%; 
width: 100%; 
}

*{
    font-family: 'Open Sans Condensed', sans-serif;
   }
    

.Kosten{
float:right;
width:300px;
margin-top:-10px;
margin-right: 100px;
}

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

input.textfield { 
  
}

</style>
</head>

<body>";

echo "<h1>ZUSAMMENFASSUNG DEINER BESTELLUNG!</h1>";


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
<div class='Kosten'>
";

if (isset($_SESSION['warenkorb'])) { // Prüfen, ob Session-Variable für den Warenkorb existiert
    foreach($_SESSION['warenkorb']as $neu){ // Gibt artikelname und Preis aus Session array aus


        echo $neu['artikelname']." | ";
        echo $neu['preis']."€<br><br><br>";

    }
}

echo $zahlung;

echo"Versand: 4,90€ <br><br><br>";
echo"Summe:<br><br><br>";
echo"<a href='index.php?page=bestätigung' ><input type='submit' value='Bestellung abschließen!' class='button' /></a>";



echo"</div>";




echo "</body>


</html>
";




try {
    include(dirname(_FILE) . "/system/account/userdata.php");
    $kundennummer = (int)$_GET["kundennummer"];
    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM benutzer WHERE $_SESSION ['kundennummer']";
    $query = $db->prepare($sql);
    $query->execute();
    while ($zeile=$query->fetchObject()){

        echo"

<h1> Lieferadresse </h1> 


<!-- Variablen im Formualar bzw. das Formular zum ausfuellen --> 



<div class='lieferadresse'><br>

Name: $zeile->name <br><br><br>
Vorname: $zeile->vorname<br><br><br>
Straße: $zeile->strasse<br><br><br>
PLZ: $zeile->plz<br><br><br>
Telefonnummer: $zeile->telefonnummer<br><br><br>
E-mail: $zeile->email<br><br><br>

</div> ";
        echo "</form>";
        echo "</div>";

    }
    //else {
    //  echo "Datensatz nicht gefunden!";
    //  }

    $db = null;
} catch (PDOException $e) {
    echo "Error!: Bitten wenden Sie sich an den Administrator...";
    die();
}


?>