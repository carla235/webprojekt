<?php

include(dirname(__FILE__) . "/../account/userdata.php");
echo"<html>
<head>
<style>
.produktinfos{

margin-left: 400px;
margin-bottom:600px;
}

.bild{
position:absolute;
margin-left: 50px;
}

.produkt{
margin-top: 100px;
}

</style>
</head>


<body>";
try {
    $artikelnummer = (int)$_GET["artikelnummer"];
    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM produktkatalog WHERE artikelnummer=$artikelnummer";
    $query = $db->prepare($sql);
    $query->execute();

    while ($zeile = $query->fetchObject()) {
        echo    "<div class='produkt'></div><div class='bild'><img src= './images/$zeile->bild' width='300px' height='auto' > 
                 <div class='bearbeiten'><li><a href='index.php?page=bearbeiten'>Artikel bearbeiten</a></li></div>
                 </div>
                 <div class='produktinfos'>
                 <h1> $zeile->artikelname | $zeile->marke </h1>
                 EAN:$zeile->ean <br><br><br>
                 PREIS: $zeile->preis € <br><br><br>
                GRÖßE:  <select name=\"groesse\">
                     <option value=\"XS\">XS</option>
                     <option value=\"S\">S</option>
                     <option value=\"M\">M</option>
                     <option value=\"L\">L</option>
                     <option value=\"XL\">XL</option>
                 </select><br><br>
                 MENGE:  <select name=\"menge\">
                     <option value=\"1\">1</option>
                     <option value=\"2\">2</option>
                     <option value=\"3\">3</option>
                     <option value=\"4\">4</option>
                     <option value=\"5\">5</option>
                 </select><br><br>


                 ARTIKELBESCHREIBUNG:<br>
                 $zeile->artikelbeschreibung<br><br>
                 DETAILS:<br>
                 $zeile->details<br><br>
                 LIEFERZEIT 3-5 WERKTAGE | 4,90€ 
                  </div>
                 
      
      ";}
      $db=null;}

catch (PDOException $e) {
    echo "Error!: Bitte wenden Sie sich an den Administrator!?..." . $e;
    die();}

        echo "</body></html>";


