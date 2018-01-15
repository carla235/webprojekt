<?php
/**
 * Created by PhpStorm.
 * User: carlastumpp
 * Date: 11.12.17
 * Time: 16:47
 */


session_start();
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
    include(dirname(_FILE) . "/system/account/userdata.php");
   $kundennummer = $_SESSION['kundennummer'];


    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM benutzer WHERE kundennummer=$kundennummer";
    $query = $db->prepare($sql);
    $query->execute();
    while ($zeile=$query->fetchObject()){



echo "<h1> Lieferadresse </h1>";


//Variablen im Formualar bzw. das Formular zum ausfuellen -->

echo"
<div class='input'><br>
<form action='./system/lieferadresse_do.php' method='post'>
<label><b>Name</b></label><br>   
<input type=\"text\" size=\"20\" maxlength='50' name='name' value='$zeile->name'><br><br>
<label><b>Vorname</b></label><br> 
<input type='text' size='20' maxlength='50' name='vorname' value='$zeile->vorname'><br><br>
<label><b>Straße</b></label><br> 
<input type='text' size='20' maxlength='50' name='strasse' value='$zeile->strasse'><br><br>
<label><b>PLZ/Ort</b></label><br> 
<input type='text' size='20' maxlength='10' name='plz' value='$zeile->plz'><br><br>
<label><b>Telfonnummer</b></label><br>
<input type='text' size='20' maxlength='13' name='telefonnummer' value='$zeile->telefonnummer'><br><br>
<label><b>E-mail</b></label><br> 
<input type='text' size='20' maxlength='50' name='email' value='$zeile->email'><br><br>
<input type='submit' value='WEITER!' class='button'/>
</div> ";
        echo "</form>";


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