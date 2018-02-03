<?php
/**
 * Created by PhpStorm.
 * User: carlastumpp
 * Date: 21.11.17
 * Time: 09:14
 */

echo
    "<html>
<head>
    <title>SHOP</title>
   <style>
   
   html{
       height: 100%; 
       width: 100%; 
    }
    
    body {
        font-family: 'Open Sans Condensed', sans-serif;
        margin-left: 10%;
        margin-right: 10%;
        height: 100%; 
    }
   
   
.artikel {

margin-bottom: 0.5%;

 }
 
 .preis {
 margin-top: 1em;
 
 }
 
</style>
</head><body>
<div class=\"container\">
 <div class=\"row\">";


include_once(dirname(__FILE__) . "./../account/userdata.php");

// DB Verbindung wird aufgebaut
try {
    $db = new PDO($dsn, $dbuser, $dbpass, $option);

    //Alle Produkte werden aus DB ausgewählt
    $sql = "SELECT * FROM produktkatalog";
    $query = $db->prepare($sql);
    $query->execute();

    // Solange Produkte in DB stehen, werden diese ausgegeben
    while ($zeile = $query->fetchObject()) {


            echo "
<div class=\"col-sm\">

    <div class='produkt'>
             <a href='index.php?page=produkt&artikelnummer=$zeile->artikelnummer'>
             <div class='artikel'>$zeile->marke - $zeile->artikelname</div><br>
             <div class='bild' align='left'> <a href='index.php?page=produkt&artikelnummer=$zeile->artikelnummer'><img src='./images/$zeile->bild' width='225px' height='300px'> </a> </div>
             <div class='preis'>$zeile->preis € </div>
              <br><br>    </a>  </div></div>
              ";

         }
echo "<br>";




     $db = null;
} catch (PDOException $e) {
    echo "Error!: Bitte wenden Sie sich an den Administrator!?...".$e;
    die();
}
echo"</div></body> </html>";

?>
