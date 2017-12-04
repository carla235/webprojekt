<?php
/**
 * Created by PhpStorm.
 * User: carlastumpp
 * Date: 27.11.17
 * Time: 17:15
 */

echo " 
<html> 

<head> 
<style> 
body {
height: 100%; 
width: 100%; 
}

*{
    font-family: 'Open Sans Condensed', sans-serif;
   }
    
form { 
    height: 100%;
    width: 50%;
    background-color: ;
}

input {
    background-color: white;
    color: black ;
    padding: 14px 20px;
    margin: 8px 0;
    cursor: pointer;
    width: 100%;
    border: 1px solid black;
  
}

.button {
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    height: 40px;
    width: 100px;
    background-color: white;
    color: black;
    border: 1px solid black;
}

input.textfield { 
  
}

</style>
</head>

<body>";


try {
    include(dirname(_FILE) . "../../system/account/userdata.php");
    $artikelnummer = (int)$_GET["artikelnummer"];
    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM produktkatalog WHERE artikelnummer=$artikelnummer";
    $query = $db->prepare($sql);
    $query->execute();
    while ($zeile=$query->fetchObject()){

        echo"

<h1> Produktformular bearbeiten </h1> 


<!-- Variablen im Formualar bzw. das Formular zum ausfuellen --> 



<div class='productinput'><br>
<form action='./system/backend/bearbeiten/do.php' method='post'>
<label><b>Marke</b></label><br>   
<input type=\"text\" size=\"20\" maxlength='50' name='marke' value='$zeile->marke'><br><br>
<label><b>Artikelname</b></label><br> 
<input type='text' size='20' maxlength='50' name='artikelname' value='$zeile->artikelname'><br><br>
<label><b>EAN-Code</b></label><br> 
<input type='text' size='20' maxlength='13' name='ean' value='$zeile->ean'><br><br>
<label><b>Artikelnummer</b></label><br> 
<input type='text' size='20' maxlength='5' name='artikelnummer' value='$zeile->artikelnummer'><br><br>
<label><b>Preis</b></label><br> 
<input type='text' size='20' maxlength='10' name='preis' value='$zeile->preis'><br><br>
<label><b>Größe</b></label><br>
<input type='text' size='20' maxlength='2' name='groesse' value='$zeile->groesse'><br><br>
<label><b>Menge</b></label><br> 
<input type='number' size='20' maxlength='2' name='menge' value='$zeile->menge'><br><br>
<label><b>Artikelbeschreibung</b></label><br> 
<textarea class= 'textfield' id='text' name='artikelbeschreibung' cols='125' rows='10'>$zeile->artikelbeschreibung</textarea><br><br>
<label><b>Details</b></label><br> 
<textarea class= 'textfield' id='text' name='details' cols='125' rows='10' >$zeile->details</textarea><br><br>
<label><b>Bild ändern</b></label><br> 
<br><b>Aktuelles Bild</b><br> 
<a href='#'><img src='./images/$zeile->bild' width='225px' height='300px'> </a><br> <!-- not yet required --> 
<br>
<input type='file' name='bild' id='bild'><br>
<input type='submit' value='UPDATE!' class='button'/>
</div>
</div> ";


        echo "</form>";
        echo "</div>";

    }
    //else {
    //  echo "Datensatz nicht gefunden!";
    //  }

    $db = null;
} catch (PDOException $e) {
    echo "Error!: Bitten wenden Sie sich an den Administrator...";
    die();
}


?>