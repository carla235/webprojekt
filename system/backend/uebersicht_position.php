<?php

echo"
<html>
<head>

</head>

<body>

";

$bestellnummer=$_GET['bestellnummer']; // bestellnummer wurde über URL übergeben
echo"
<table class=\"table table-striped\">
  <thead>
    <tr>
      <th scope=\"col\"><h1>Auftrag mit der Bestellnummer $bestellnummer</h1></th>
    </tr>
  </thead>
  <tbody>
";


include "./system/account/userdata.php";
//DB Verbindung wird hergestellt
try {
    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    // Datensatz der Bestellnummer wird aus DB geholt
    $sql = "SELECT * FROM bestellposition WHERE bestellnummer=$bestellnummer";
    $query = $db->prepare($sql);
    $query->execute();

    //Solange Datensätze vorhanden sind, werden diese aus der DB geholt
    while($zeile =$query->fetchObject()){
        echo"<tr>
            <td>$zeile->artikelnummer <br></td></tr>";

    }

    $db=null;}

catch (PDOException $e) {
    echo "Error!: Bitte wenden Sie sich an den Administrator!?..." . $e;
    die();
}
echo " </tbody></table>";

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