<?php
echo"0k";
// Erstellen eines neuen Datensatzes durch den Befehl POST

//ueberprueft, ob der Button fuer Submit gedrueckt wurde
//if(isset($_POST['abschicken'])) {
// Variablen vom Formular uebertragen
//$artikelnummer = htmlspecialchars($_POST["artikelnummer"], ENT_QUOTES, "UTF-8");
$artikelname = htmlspecialchars($_POST["artikelname"], ENT_QUOTES, "UTF-8");
$marke = htmlspecialchars($_POST["marke"], ENT_QUOTES, "UTF-8");
$ean = htmlspecialchars($_POST["ean"], ENT_QUOTES, "UTF-8");
$preis = htmlspecialchars($_POST["preis"], ENT_QUOTES, "UTF-8");
$groesse = htmlspecialchars($_POST["groesse"], ENT_QUOTES, "UTF-8");
$menge = htmlspecialchars($_POST["menge"], ENT_QUOTES, "UTF-8");
$artikelbeschreibung = htmlspecialchars($_POST["artikelbeschreibung"], ENT_QUOTES, "UTF-8");
$details = htmlspecialchars($_POST["details"], ENT_QUOTES, "UTF-8");
//$bild = htmlspecialchars($_POST["bild"], ENT_QUOTES, "UTF-8");
echo " 2";
if (!empty($artikelname) && !empty($marke) && !empty($ean) && !empty($preis) && !empty($groesse) && !empty($menge) && !empty($details) && !empty($artikelbeschreibung)) {
echo "include ";
    include_once("./../account/userdata.php");
    //&& !empty($bild), da Bildupload noch nicht umgesetzt ist, ist das noch keine Bedingung
    // sollten diese Felder ausgefuellt sein, dann
// Datenbankzugriff
    echo "nach include ";
   echo  $_FILES['bild']['size'];
    echo  $_FILES['bild']['name'];
if ($_FILES['bild']['size'] != 0 ) {
    echo "BIld nicht 0 ";
    $upload_folder = './../../images/'; //Das Upload-Verzeichnis
    $filename = pathinfo($_FILES['bild']['name'], PATHINFO_FILENAME);
    $extension = strtolower(pathinfo($_FILES['bild']['name'], PATHINFO_EXTENSION));
    echo "bild1  ";
//Überprüfung der Dateiendung
   $allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
    if (!in_array($extension, $allowed_extensions)) {
        echo "Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt";
        die("Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
    }

//Überprüfung dass das Bild keine Fehler enthält
    if (function_exists('exif_imagetype')) { //Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
        $allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $detected_type = exif_imagetype($_FILES['bild']['tmp_name']);
        if (!in_array($detected_type, $allowed_types)) {
            echo"Nur der Upload von Bilddateien ist gestattet";
            die("Nur der Upload von Bilddateien ist gestattet");
        }
    }
    echo "bild ";
//Pfad zum Upload
    $new_path = $upload_folder . $filename . '.' . $extension;
    $dbfile = $filename . '.' . $extension;
echo "3";
//Neuer Dateiname falls die Datei bereits existiert
    if (file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
        $id = 1;
        do {
            $new_path = $upload_folder . $filename . '_' . $id . '.' . $extension;
            $dbfile = $filename . '_' . $id . '.' . $extension;
            $id++;
        } while (file_exists($new_path));
    }

//Alles okay,  verschiebe Datei an neuen Pfad
    move_uploaded_file($_FILES['bild']['tmp_name'], $new_path);
    echo 'Bild erfolgreich hochgeladen: <a href="' . $new_path . '">' . $new_path . '</a>';}
echo "Bild Ende";
    try {

        $db = new PDO($dsn, $dbuser, $dbpass, $option);
        $query = $db->prepare(//Eintrag der Daten in DB vorbereiten
            "INSERT INTO produktkatalog(artikelname, marke, artikelbeschreibung, ean, preis, groesse, menge, details, bild) VALUES (:artikelname, :marke, :artikelbeschreibung, :ean, :preis, :groesse, :menge, :details, :bild)"
        );
        $query->execute(array("artikelname" => $artikelname, "marke" => $marke, "ean" => $ean, "preis" => $preis, "groesse" => $groesse, "menge" => $menge, "artikelbeschreibung" => $artikelbeschreibung, "details" => $details, "bild" => $dbfile));
       /* $query->bindParam(':artikelname', $artikelname);
        $query->bindParam(':marke', $marke);
        $query->bindParam(':ean', $ean);
        $query->bindParam(':preis', $preis);
        $query->bindParam(':groesse', $groesse);
        $query->bindParam(':menge', $menge);
        $query->bindParam(':artikelbeschreibung', $artikelbeschreibung);
        $query->bindParam(':details', $details);
        $query->bindParam(':bild', $dbfile);*/

        $db = null;// Daten werden eingetragen


    } catch (PDOException $x) {
        echo "$x";
        die();
    };


    header("Location: ../../index.php");
} else {
    $errorMessage = "Eingabe unvollständig.";
    echo $errorMessage;
}

echo "ende";


//}

/**
 * Created by PhpStorm.
 * User: anna-mariaosterloh
 * Date: 26.11.17
 * Time: 20:22
 */