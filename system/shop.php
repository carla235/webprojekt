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
 .artikelname {
 font-family: Arial;
 }
 
 .preis {
 font-family: Arial;
 }
 
    
.produkt {

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


            echo "<div class='produkt'>
             <a href='index.php?page=produkt&artikelnummer=$zeile->artikelnummer' <div class='artikel'>$zeile->marke - 
                   $zeile->artikelname</div><br>";

            //if (!empty($zeile->bild)) {
            //echo "<p><img src='./system/produkte/$zeile->bild'></p><br>";
            //}
            echo "<div align='left'> <a href='#'><img src='./$zeile->bild' width='225px' height='300px'> </a> </div>";
            echo "<div class='preis'>$zeile->preis € </div>";
            echo "<br><br>    </a>  </div>
</tr>";
         }
echo "<br>";




     $db = null;
} catch (PDOException $e) {
    echo "Error!: Bitte wenden Sie sich an den Administrator!?...".$e;
    die();
}
?>
