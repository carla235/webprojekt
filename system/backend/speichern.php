<?php
// Daten aus Eingabe werden an Parameter übergeben
$artikelname = htmlspecialchars($_POST["artikelname"], ENT_QUOTES, "UTF-8");
$marke = htmlspecialchars($_POST["marke"], ENT_QUOTES, "UTF-8");
$ean = htmlspecialchars($_POST["ean"], ENT_QUOTES, "UTF-8");
$preis = htmlspecialchars($_POST["preis"], ENT_QUOTES, "UTF-8");
$groesse = htmlspecialchars($_POST["groesse"], ENT_QUOTES, "UTF-8");
$menge = htmlspecialchars($_POST["menge"], ENT_QUOTES, "UTF-8");
$artikelbeschreibung = htmlspecialchars($_POST["artikelbeschreibung"], ENT_QUOTES, "UTF-8");
$details = htmlspecialchars($_POST["details"], ENT_QUOTES, "UTF-8");

// Wenn Felder nicht leer sind, wird Upload-Durchführung gestartet
if (!empty($artikelname) && !empty($marke) && !empty($ean) && !empty($preis) && !empty($groesse) && !empty($menge) && !empty($details) && !empty($artikelbeschreibung)) {

    include_once("./../account/userdata.php");

    // wenn Bild größer als null, werden benötigte Parameter definiert --> Daten werden aus File Array geholt
    if ($_FILES['bild']['size'] != 0) {

        $upload_folder = './../../images/'; //Das Upload-Verzeichnis
        $filename = pathinfo($_FILES['bild']['name'], PATHINFO_FILENAME);
        $extension = strtolower(pathinfo($_FILES['bild']['name'], PATHINFO_EXTENSION));

//Überprüfung der Dateiendung, falls diese ungültig --> Fehlermeldung
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
                echo "Nur der Upload von Bilddateien ist gestattet";
                die("Nur der Upload von Bilddateien ist gestattet");
            }
        }
        echo "bild ";
//Pfad zum Upload, mit Parametern aus erstem Schritt
        $new_path = $upload_folder . $filename . '.' . $extension;
        $dbfile = $filename . '.' . $extension;

//verschiebe Datei an neuen Pfad
        move_uploaded_file($_FILES['bild']['tmp_name'], $new_path);

    }
// Stelle DB Verbindung her - für den Upload der restlichen Produktdaten
    try {

        $db = new PDO($dsn, $dbuser, $dbpass, $option);
        $query = $db->prepare(//Eintrag der Daten in DB vorbereiten
            "INSERT INTO produktkatalog(artikelname, marke, artikelbeschreibung, ean, preis, groesse, menge, details, bild) VALUES (:artikelname, :marke, :artikelbeschreibung, :ean, :preis, :groesse, :menge, :details, :bild)"
        );
        $query->execute(array("artikelname" => $artikelname, "marke" => $marke, "ean" => $ean, "preis" => $preis, "groesse" => $groesse, "menge" => $menge, "artikelbeschreibung" => $artikelbeschreibung, "details" => $details, "bild" => $dbfile));


        $db = null;// Daten werden eingetragen


    } catch (PDOException $x) {
        echo "$x";
        die();
    };


    header("Location: ../../index.php"); // Bei erfolgreichem Upload --> Startseite
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