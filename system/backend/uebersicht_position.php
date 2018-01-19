<?php

echo"
<html>
<head>

</head>

<body>

";

$bestellnummer=$_GET['bestellnummer'];
echo"
<h1>Auftrag mit der Bestellnummer $bestellnummer</h1>
";


include "./system/account/userdata.php";

try {
    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM bestellposition WHERE bestellnummer=$bestellnummer";
    $query = $db->prepare($sql);
    $query->execute();

    while($zeile =$query->fetchObject()){
        echo"
        $zeile->artikelnummer <br>";

     /*   $artikelnummer= $zeile->artikelnummer;


        $db = new PDO($dsn, $dbuser, $dbpass, $option);
        $sql = "SELECT * FROM produktkatalog WHERE artikelnummer=$artikelnummer";
        $query = $db->prepare($sql);
        $query->execute();
        while($zeile =$query->fetchObject()){
            $zeile->artikelname;
            $zeile->marke;


        }
*/
    }

    $db=null;}

catch (PDOException $e) {
    echo "Error!: Bitte wenden Sie sich an den Administrator!?..." . $e;
    die();
}
echo "</table>";

echo "
</body>

</html>


";
/**
 * Created by PhpStorm.
 * User: anna-mariaosterloh
 * Date: 19.01.18
 * Time: 14:54
 */