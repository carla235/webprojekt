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

<body>";

if ($_FILES['datei']['size'] != 0 ) {
//$upload_folder = '/../../system/blogposts/uploads/'; //Das Upload-Verzeichnis
    $upload_folder = './system/produkte/images/'; //Das Upload-Verzeichnis
    $filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
    $extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));

//Überprüfung der Dateiendung
    $allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
    if (!in_array($extension, $allowed_extensions)) {
        die("Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
    }

//Überprüfung der Dateigröße
    /* $max_size = 500 * 1024; //500 KB
     if ($_FILES['datei']['size'] > $max_size) {
         die("Bitte keine Dateien größer 500kb hochladen");
     }*/

//Überprüfung dass das Bild keine Fehler enthält
    if (function_exists('exif_imagetype')) { //Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
        $allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $detected_type = exif_imagetype($_FILES['datei']['tmp_name']);
        if (!in_array($detected_type, $allowed_types)) {
            die("Nur der Upload von Bilddateien ist gestattet");
        }
    }

//Pfad zum Upload
    $new_path = $upload_folder . $filename . '.' . $extension;
    $dbfile = $filename . '.' . $extension;

//Neuer Dateiname falls die Datei bereits existiert
    if (file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
        $id = 1;
        do {
            $new_path = $upload_folder . $filename . '_' . $id . '.' . $extension;
            $dbfile = $filename . '_' . $id . '.' . $extension;
            $id++;
        } while (file_exists($new_path));
    }

//Alles okay, verschiebe Datei an neuen Pfad
    move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);
    echo 'Bild erfolgreich hochgeladen: <a href="' . $new_path . '">' . $new_path . '</a>';
}



echo"


<!-- Beginn des Produktformulars --> 
<div id='productform'>
<h1> Produktformular </h1> 


<!-- Variablen im Formualar bzw. das Formular zum ausfuellen --> 

<form action='#' method='post'>

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
<input type='file' size='20' name='datei' placeholder='Klappt noch nicht'><br> <!-- not yet required --> 
<br>
<input id='erstellen' type=\"submit\" name=\"erstellen\" value=\"Erstellen\">
</div>
</div> ";

// Datenbankzugriff
include_once("./system/account/userdata.php");

// Erstellen eines neuen Datensatzes durch den Befehl POST

//ueberprueft, ob der Button fuer Submit gedrueckt wurde
//if(isset($_POST['abschicken'])) {
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
        header("Location:index.php?page=start");
    } else {
        $errorMessage = "Eingabe unvollständig.";
    }
//}

echo"

</body>

</html>

";

?>