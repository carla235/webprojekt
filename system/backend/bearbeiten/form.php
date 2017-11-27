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
form { 
    height: 100%;
    width: 50%;
    background-color: ;
}

input {
    background-color: beige;
    color: black ;
    padding: 14px 20px;
    margin: 8px 0;
    cursor: pointer;
    width: 100%;
    border: 3px solid gray;
  
}
input.textfield { 
  
}
#erstellen {
    width: 25%;
    height: ;
    background-color: aliceblue;
}
</style>
</head>

<body>";

try {
    include(dirname(_FILE) . "../../system/account/userdata.php");
    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM produktkatalog";
    $query = $db->prepare($sql);
    $query->execute();
    // if ($zeile = $query->fetchObject()) {     //Wenn es den Datensatz gibt dann echo..//holt sich hier den entsprechenden Datensatz
    while ($zeile=$query->fetchObject()){

        echo"

<h1> Produktformular bearbeiten </h1> 


<!-- Variablen im Formualar bzw. das Formular zum ausfuellen --> 

<form action='./system/backend/bearbeiten/do.php' method='post'>

<div class='productinput'><br>
<label><b>Marke</b></label><br>   
<input type=\"text\" size=\"20\" maxlength='50' name='marke' value='$zeile->marke'<br>
<label><b>Artikelname</b></label><br> 
<input type='text' size='20' maxlength='50' name='artikelname' value='$zeile->artikelname'><br>
<label><b>EAN-Code</b></label><br> 
<input type='text' size='20' maxlength='13' name='ean' value='$zeile->ean'<br>
<label><b>Artikelnummer</b></label><br> 
<input type='text' size='20' maxlength='5' name='artikelnummer' value='$zeile->artikelnummer'<br>
<label><b>Preis</b></label><br> 
<input type='text' size='20' maxlength='10' name='preis' value='$zeile->preis'<br>
<label><b>Größe</b></label><br> 
<input type='text' size='20' maxlength='2' name='groesse' value='$zeile->groesse'<br>
<label><b>Menge</b></label><br> 
<input type='number' size='20' maxlength='2' name='menge' value='$zeile->menge'<br>
<label><b>Artikelbeschreibung</b></label><br> 
<input class= 'textfield' type='text' size='100' name='artikelbeschreibung' value='$zeile->artikelbeschreibung'<br>
<label><b>Details</b></label><br> 
<input class= 'textfield' type='text' size='100' name='details' value='$zeile->details'<br>
<label><b>Bildupload</b></label><br> 
<input type='text' size='20' name='bild' placeholder='Klappt noch nicht'><br> <!-- not yet required --> 
<br>
<input type='submit' value='update!' class='button'/>
</div>
</div> ";
//sichern des neuen Datensatzes
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