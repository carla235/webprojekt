<?php
/**
 * Created by PhpStorm.
 * User: carlastumpp
 * Date: 21.11.17
 * Time: 09:00
 */

include_once(dirname(__FILE__) . "/../account/userdata.php");

try {
    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM produktkatalog";
    $query = $db->prepare($sql);
    $query->execute();

    while ($zeile = $query->fetchObject()) {
        echo "<div class='produkte'>";
        echo "<br>";
        echo "<div class='artikelname'>$zeile->artikelname - 
            Marke: $zeile->marke";
        echo "</div><br>";
        //if (!empty($zeile->bild)){
        //echo "<p><img src='./system/produkte/$zeile->images'></p><br>";}
        echo "<div align='left'><a href='#'><img src='../../glitzerkleid.jpeg' width='225px' height='300px'></a></div>";
        echo "<div class='preis'>$zeile->preis €";
        echo "</div>";
    }

    $db = null;
} catch (PDOException $e) {
    echo "Error!: Bitte wenden Sie sich an den Administrator!?...".$e;
    die();
}
?>



    //session_start();
   // if (isset($_SESSION['userid'])){
