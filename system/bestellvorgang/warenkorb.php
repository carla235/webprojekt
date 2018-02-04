<?php
include "./system/account/userdata.php";

session_start(); //Session wird wieder aufgenommen

echo "
<html>
<head>
<title>Warenkorb</title>
<style>


.Kosten{
float:right;
width:300px;
margin-top:-70px;
margin-right: 100px;
}

.produkt{
float: left; 
width: 400px;
margin-left: 30px;
}


.produktinfos{
margin-left: 150px;
position:relative; 
top: -150px;

}
</style>
</head>
<body>

<h1>Mein Warenkorb</h1>
<body><div class='container'> <div class='row'>

<div class=\"col-sm\">

<br><br>";


        if (isset($_SESSION['warenkorb'])) { // Prüfen, ob Session-Variable für den Warenkorb existiert
            foreach($_SESSION['warenkorb']as $neu){ // Gibt Artikelinformationen aus Session array aus
                $id= $neu['artikelnummer'];
                $a = $neu['bild'];
                echo "<a href='#'><img src= './images/$a' width='100px' height='auto'></a>";

                echo "<div class='produktinfos'>";
                echo $neu ['artikelname']." |  ";
                echo $neu['marke']."<br>";
                echo $neu['groesse']." | ";
                echo $neu['menge']."<br>";

                echo $neu['preis']."€<br><br><br>";

                echo "<input type='text' name='menge' placeholder='Menge' class='form_control' value=''>"; echo "<br>";echo "<br>";
                echo "<input type='hidden' name='hidden_preis' value='<?php echo $row\['preis']; >";

                echo "<a href= './system/bestellvorgang/delete_wk.php?delete=$id'><img src='./cross.png' height='20px' width='auto'></a></div>";


            }
        }


echo "
</div>
 <div class=\"col-sm\">
<h3>SUMME DEINER BESTELLUNG!</h3>";

if (isset($_SESSION['warenkorb'])) { // Prüfen, ob Session-Variable für den Warenkorb existiert
    foreach($_SESSION['warenkorb'] as $neu){ // Gibt artikelname und Preis aus Session array aus

    echo $neu['artikelname']." | ";
    echo $neu['preis']."€<br><br>";


    }
    }
/*if (!empty($_SESSION['warenkorb'])){
     $total = 0;
     foreach($_SESSION['warenkorb']as $keys => $values) {
         //echo $values['artikelname'];
         //echo $values['menge'];
         //echo $values['preis'];
         echo number_format( $values['preis']+$values['preis'], 2); echo "<br>";
         //$values['menge']*
     }
}
*/

if(isset($_SESSION['warenkorb'])) {
     foreach($_SESSION['warenkorb'] as $neu){

        $summe = $neu['preis'];
}
}
    //$summe = number_format($row['preis']+$row['preis'],3);
    echo "Versand: 4.90€"; echo "<br>";echo "<br>";




    $p=  $summe + 4.90 ;
    echo"Summe: $p €<br><br><br>
<a href='index.php?page=kaufen'>
<input type='submit' value='KAUFEN!' class='button'/></a>


";

echo"</div></div>";

echo "</body>


</html>
";


/**
 * Created by PhpStorm.
 * User: anna-mariaosterloh
 * Date: 29.11.17
 * Time: 10:15
 */