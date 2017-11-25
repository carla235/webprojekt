<?php

echo " 
<html> 

<head> 
<style> 
body {
height: 100%; 
width: 100%; 
}
form { 
    height: 100%;
    width: 50%;
    background-color: ;
}

input {
    background-color: beige;
    color: black ;
    padding: 14px 20px;
    margin: 8px 0;
    cursor: pointer;
    width: 100%;
    border: 3px solid gray;
  
}
input.textfield { 
  
}
#erstellen {
    width: 25%;
    height: ;
    background-color: aliceblue;
}
</style>
</head>

<body>

<!-- Beginn des Produktformulars --> 
<div id='productform'>
<h1> Produktformular </h1> 


<!-- Variablen im Formualar bzw. das Formular zum ausfuellen --> 

<form action='../backend/productform.php' method='post'>

<div class='productinput'><br>
<label><b>Marke</b></label><br>   
<input type=\"text\" size=\"20\" maxlength='50' name='marke' placeholder='maximal 50 Zeichen' required><br>
<label><b>Artikelname</b></label><br> 
<input type='text' size='20' maxlength='50' name='artikelname' placeholder='maximal 50 Zeichen' required><br>
<label><b>EAN-Code</b></label><br> 
<input type='text' size='20' maxlength='13' name='ean' placeholder='maximal 13 Zahlen' required><br>
<label><b>Artikelnummer</b></label><br> 
<input type='text' size='20' maxlength='5' name='artikelnummer' placeholder='maximal 5 Zahlen' required><br>
<label><b>Preis</b></label><br> 
<input type='text' size='20' maxlength='10' name='preis' placeholder='maximal 10 Zeichen' required><br>
<label><b>Größe</b></label><br> 
<input type='text' size='20' maxlength='2' name='groesse' placeholder='maximal 2 Zeichen' required><br>
<label><b>Menge</b></label><br> 
<input type='number' size='20' maxlength='2' name='menge' placeholder='maximal 2 Zahlen' required><br>
<label><b>Artikelbeschreibung</b></label><br> 
<input class= 'textfield' type='text' size='20' name='artikelbeschreibung' placeholder='Artikelbeschreibung' required><br>
<label><b>Details</b></label><br> 
<input class= 'textfield' type='text' size='20' name='details' placeholder='Artikeldetails' required><br>
<label><b>Bildupload</b></label><br> 
<input type='text' size='20' name='bild' placeholder='Klappt noch nicht'><br> <!-- not yet required --> 
<br>
<input id='erstellen' type=\"submit\" name=\"erstellen\" value=\"Erstellen\">
</div>
</div> ";

// Datenbankzugriff
include_once("../account/userdata.php");

// Erstellen eines neuen Datensatzes durch den Befehl POST

//ueberprueft, ob der Button fuer Submit gedrueckt wurde
if(isset($_POST['abschicken'])) {
// Variablen vom Formular uebertragen
    $artikelnummer = htmlspecialchars($_POST["artikelnummer"], ENT_QUOTES, "UTF-8");
    $artikelname = htmlspecialchars($_POST["artikelname"], ENT_QUOTES, "UTF-8");
    $marke = htmlspecialchars($_POST["marke"], ENT_QUOTES, "UTF-8");
    $ean = htmlspecialchars($_POST["ean"], ENT_QUOTES, "UTF-8");
    $preis = htmlspecialchars($_POST["preis"], ENT_QUOTES, "UTF-8");
    $groesse = htmlspecialchars($_POST["groesse"], ENT_QUOTES, "UTF-8");
    $menge = htmlspecialchars($_POST["menge"], ENT_QUOTES, "UTF-8");
    $artikelbeschreibung = htmlspecialchars($_POST["artikelbeschreibung"], ENT_QUOTES, "UTF-8");
    $details = htmlspecialchars($_POST["details"], ENT_QUOTES, "UTF-8");
    $bild = htmlspecialchars($_POST["bild"], ENT_QUOTES, "UTF-8");

    if (!empty($artikelnummer) && !empty($artikelname) && !empty($marke) && !empty($ean) && !empty($preis) && !empty($groesse) && !empty($menge) && !empty($details) && !empty($artikelbeschreibung)  ) {
        //&& !empty($bild), da Bildupload noch nicht umgesetzt ist, ist das noch keine Bedingung
        // sollten diese Felder ausgefuellt sein, dann
        try {
            $db = new PDO($dsn, $dbuser, $dbpass, $option);
            $query = $db->prepare(//Eintrag der Daten in DB vorbereiten
                "INSERT INTO produktkatalog(marke, artikelname, artikelnummer, artikelbeschreibung, ean, preis, groesse, menge, details, bild) VALUES(:marke, :artikelname, :artikelnummer, :artikelbeschreibung, :ean, :preis, :groesse, :menge, :details, :bild);"
            );
            $query-> execute(array("artikelnummer" => $artikelnummer, "artikelname" => $artikelname, "marke" => $marke, "ean" => $ean, "preis" => $preis, "groesse" => $groesse, "menge" => $menge, "artikelbeschreibung" => $artikelbeschreibung, "details" => $details, "bild" => $bild));
            $db = null;// Daten werden eingetragen


        } catch (PDOException $x) {
        };
        header("Location:index.php");
    } else {
        $errorMessage = "Eingabe unvollständig.";
    }
}

echo"

</body>

</html>

";

?>