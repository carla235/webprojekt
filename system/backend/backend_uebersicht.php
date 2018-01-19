<?php

echo"
<html>
<head>

</head>

<body>";
 echo   "<table>
<tr>
<th>Bestellnummer</th>
<th>Kundennummer</th>
<th>Eingangsdatum</th>
<th>Zahlungsart</th>
</tr>";

include "./system/account/userdata.php";

try {
    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM bestelluebersicht ORDER BY bestellnummer DESC ";
    $query = $db->prepare($sql);
    $query->execute();
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
echo "</table>";

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