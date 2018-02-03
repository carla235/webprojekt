<?php

echo"
<html>
<head>

</head>

<body>";
 echo
 "<table class=\"table table-striped\">
  <thead>
    <tr>
      <th scope=\"col\">Bestellnummer</th>
      <th scope=\"col\">Kundennummer</th>
      <th scope=\"col\">Eingangsdatum</th>
      <th scope=\"col\">Zahlungsart</th>
    </tr>
  </thead>
   <tbody>
";

include "./system/account/userdata.php";
//DB-Verbindung wird aufgebaut
try {
    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    // Daten werden aus DB geholt und in absteigender Reihenfolge geordnet
    $sql = "SELECT * FROM bestelluebersicht ORDER BY bestellnummer DESC ";
    $query = $db->prepare($sql);
    $query->execute();

    // Solange Datensätze vorhanden sind werden diese aus DB geholt
    while($zeile =$query->fetchObject()){
    echo"
        <tr>
        <td>$zeile->bestellnummer</td>
        <td>$zeile->kundennummer</td>
        <td>$zeile->eingangsdatum</td>
        <td>$zeile->zahlungsdaten</td>
        <td><a href='index.php?page=bestellposition&bestellnummer=$zeile->bestellnummer'>Zu den Artikeln der Bestellung!</a></td>
        </tr>    
            ";

}

    $db=null;}

catch (PDOException $e) {
    echo "Error!: Bitte wenden Sie sich an den Administrator!?..." . $e;
    die();
}
echo "</tbody></table>";

        echo "
</body>

</html>


";
/**
 * Created by PhpStorm.
 * User: anna-mariaosterloh
 * Date: 15.01.18
 * Time: 21:10
 */