<?php
if (isset($_POST['artikelnummer'])){
    $artikelnummer=$_POST['artikelnummer'];
    echo $_POST["artikelnummer"];

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

echo $_SESSION["warenkorb"];
/**
 * Created by PhpStorm.
 * User: anna-mariaosterloh
 * Date: 04.12.17
 * Time: 15:20
 */