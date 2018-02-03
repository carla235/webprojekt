<?php

include(dirname(__FILE__) . "./../account/userdata.php");
session_start();
echo"<html>
<head>
<style>

.produktinfos{

}

.bild{
position:absolute;
margin-left: 50px;
}

.produkt{
margin-top: 100px;
}

.bearbeiten{
font-weight: bold;
}
</style>


</head>


<body>

<div class='container'> <div class='row'>";
try {
    // Artikelnummer wird bei Auswahl Shop in URL übergeben und hier an Parameter übergeben
    $artikelnummer = (int)$_GET["artikelnummer"];
    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    // Daten werden für entsprechende Artikelnummer aus der DB ausgewählt
    $sql = "SELECT * FROM produktkatalog WHERE artikelnummer=$artikelnummer";
    $query = $db->prepare($sql);
    $query->execute();

    while ($zeile = $query->fetchObject()) {


        echo"
            <div class=\"col-sm\">
            
                <div class='bild'><img src= './images/$zeile->bild' width='300px' height='auto' > ";

                        // Falls der Administrator (Kundennummer 14) angemeldet ist werden Backend Funktionen angezeigt)
                        if(isset($_SESSION['kundennummer']) && ($_SESSION['kundennummer'])== '14') {

                            echo"  
   <div class='bearbeiten'><a href='index.php?page=bearbeiten&artikelnummer=$zeile->artikelnummer'>Artikel bearbeiten | </a>
                                   <a href='./system/backend/loeschen/deleteproduct.php'>Artikel loeschen</a></div> ";}
                         else{}
            echo"
                 </div>
            </div>
            
                  <div class=\"col-sm\">
                    
                    // Artikel können in Warenkorb gelegt werden 
                     <form action='' method='post'>
                         <div class='produktinfos'>
                                <h1> $zeile->artikelname | $zeile->marke </h1>
                                EAN: $zeile->ean <br><br><br>
                                PREIS: $zeile->preis € <br><br><br>
                       
                                    <form action='' method='post' >
                                    GRÖßE: <select id='groesse'name=\"groesse\">
                                            <option value=\"XS\">XS</option>
                                            <option value=\"S\">S</option>
                                            <option value=\"M\">M</option>
                                            <option value=\"L\">L</option>
                                            <option value=\"XL\">XL</option>
                                            </select></form><br><br>

                                    <form action='' method='post'>
                                     MENGE: <select id='menge' name='menge'>
                                            <option value=\"1\">1</option>
                                            <option value=\"2\">2</option>
                                            <option value=\"3\">3</option>
                                            <option value=\"4\">4</option>
                                            <option value=\"5\">5</option>
                                            </select></form>   
                                            <br><br>



                 ARTIKELBESCHREIBUNG:<br>
                 $zeile->artikelbeschreibung<br><br>
                 DETAILS:<br>
                 $zeile->details<br><br>
                 LIEFERZEIT 3-5 WERKTAGE | 4,90€ 
                 <br><br>
                
            
           
             <input type='hidden' name='artikelnummer' value='$zeile->artikelnummer'>
             <input type='submit' value='In den Warenkorb'></form>
             </div>
             </div>
             </div>
             </div>
    
      ";}

      if (isset($_POST['artikelnummer'])){ // Artikel werden in Session array abgespeichert, mit dem sie im Warenkorb ausgelesen werden
          $artikelnummer=$_POST['artikelnummer'];

              $artikelnummer = (int)$_GET["artikelnummer"];
              $db = new PDO($dsn, $dbuser, $dbpass, $option);
              $sql = "SELECT * FROM produktkatalog WHERE artikelnummer=$artikelnummer";
              $query = $db->prepare($sql);
              $query->execute();

              while ($zeile = $query->fetchObject()) {
                $artikelnummer= $zeile->artikelnummer;
                $bild = $zeile->bild;
                $artikelname =$zeile->artikelname;
                $marke=$zeile->marke;
                $preis=$zeile->preis;
                  $groesse = $_POST['groesse'];
                  $menge = $_POST['menge'];

                  // Artikel werden in Array abgespeichert (=SESSION)
        $neu = array('artikelnummer'=>$artikelnummer, 'bild'=>$bild, 'artikelname'=> $artikelname, 'marke'=>$marke, 'preis'=>$preis, 'groesse'=>$groesse, 'menge'=>$menge);
        $_SESSION["warenkorb"][$artikelnummer]= $neu;

                  ;}




    $db=null;}}

catch (PDOException $e) {
    echo "Error!: Bitte wenden Sie sich an den Administrator!?..." . $e;
    die();}

        echo "</body></html>";


