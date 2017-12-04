<?php

include(dirname(__FILE__) . "/../account/userdata.php");
session_start();
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
                 <div class='bearbeiten'><li><a href='index.php?page=bearbeiten&artikelnummer=$zeile->artikelnummer'>Artikel bearbeiten</a></li></div>
                 </div>
                 <div class='produktinfos'>
                 <h1> $zeile->artikelname | $zeile->marke </h1>
                 EAN: $zeile->ean <br><br><br>
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
                 <br><br>
                
            
             <form action='index.php?page=warenkorb' method='post'>
             <input type='hidden' name='artikelnummer' value='$zeile->artikelnummer'>
             <input type='submit' value='In den Warenkorb'></form>
    
      ";}

      if (isset($_POST['artikelnummer'])){
          $artikelnummer=$_POST['artikelnummer'];

         /* $abfrage = "SELECT * FROM produktkatalog WHERE  artikelnummer = $artikelnummer ";
          $query = mysqli_query($abfrage);
          if(mysql_num_rows($query) > 0) {
              $zeile = mysqli_fetch_array($query);
                $bild = $zeile->bild;
                $artikelname =$zeile->artikelname;
                $marke=$zeile->marke;
                $preis=$zeile->preis;*/

        $neu = array('bild'=>$bild, 'artikelname'=> $artikelname, 'marke'=>$marke, 'preis'=>$preis);
        $_SESSION["warenkorb"][$artikelnummer]= $neu;}


    $db=null;}

catch (PDOException $e) {
    echo "Error!: Bitte wenden Sie sich an den Administrator!?..." . $e;
    die();}

        echo "</body></html>";


