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
 .produkt.artikel {
 font-family: Arial;
 display: inline;
 }
 
 .preis {
 font-family: Arial;
 }
 
    
.produkt {
display: inline;
}

.gallery {
height: 40%; 
width: 30%; 
margin: 5px;  
float: right; 
}

</style>
</head>";


include_once(dirname(__FILE__)."/./account/userdata.php");

try {
    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM produktkatalog";
    $query = $db->prepare($sql);
    $query->execute();

    while ($zeile = $query->fetchObject()) {


            echo "<div class='gallery'>
             <div class='produkt'>
             <a href='index.php?page=produkt&artikelnummer=$zeile->artikelnummer' <div class='artikel'>$zeile->marke - 
                   $zeile->artikelname</div><br>
              <div class='bild' align='left'> <a href='index.php?page=produkt&artikelnummer=$zeile->artikelnummer'><img src='./images/$zeile->bild' width='225px' height='300px'> </a> </div>
              <div class='preis'>$zeile->preis € </div>
              <br><br>    </a>  </div>
              </div>";

         }
echo "<br>";




     $db = null;
} catch (PDOException $e) {
    echo "Error!: Bitte wenden Sie sich an den Administrator!?...".$e;
    die();
}
?>
