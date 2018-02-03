<?php

echo " 
<html> 

<head> 
<style> 

#productform { 
    height: 100%;
    width: 50%;
      
    margin-right: 25%; 
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
}
input.textfield { 
  
}
#erstellen {
    width: 25%;
    height: ;
    background-color: lightgray;
}
</style>
</head>

<body>";



echo"
<!-- Beginn des Produktformulars --> 
<div id='productform'>
<h1> Produktformular </h1> 


<!-- Variablen im Formualar bzw. das Formular zum ausfuellen --> 
<!-- wenn Formular ausgefüllt ist werden, Daten mit der Methode POST an die do Seite übergeben-->
<form action='./system/backend/speichern.php' method='post' enctype='multipart/form-data'>

<div class='productinput'><br>
<label><b>Marke</b></label><br>   
<input type=\"text\" size=\"20\" maxlength='50' name='marke' placeholder='maximal 50 Zeichen' required><br><br>
<label><b>Artikelname</b></label><br> 
<input type='text' size='20' maxlength='50' name='artikelname' placeholder='maximal 50 Zeichen' required><br><br>
<label><b>EAN-Code</b></label><br> 
<input type='text' size='20' maxlength='13' name='ean' placeholder='maximal 13 Zahlen' required><br><br>
<label><b>Preis</b></label><br> 
<input type='text' size='20' maxlength='10' name='preis' placeholder='maximal 10 Zeichen' required><br><br>
<label><b>Größe</b></label><br> 
<input type='text' size='20' maxlength='2' name='groesse' placeholder='maximal 2 Zeichen' required><br><br>
<label><b>Menge</b></label><br> 
<input type='number' size='20' maxlength='2' name='menge' placeholder='maximal 2 Zahlen' required><br><br>
<label><b>Artikelbeschreibung</b></label><br> 
<textarea class= 'textfield' id='text' name='artikelbeschreibung' cols='87' rows='10'<br></textarea><br><br>
<label><b>Details</b></label><br> 
<textarea class= 'textfield' id='text' name='details' cols='87' rows='10' <br></textarea><br><br>
<label><b>Bildupload</b></label><br> 
<input type='file' name='bild' id='bild' placeholder='Klappt noch nicht'><br><br>
<input id='erstellen' type=\"submit\" name=\"erstellen\" value=\"Produkt Upload\">
</div></form>
</div> ";

echo"
</body>
</html>";

?>