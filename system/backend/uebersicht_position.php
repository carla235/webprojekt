<?php

echo"
<html>
<head>

</head>

<body>

";

$bestellnummer=$_GET['bestellnummer'];
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

try {
    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM bestellposition WHERE bestellnummer=$bestellnummer";
    $query = $db->prepare($sql);
    $query->execute();

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