<?php
/**
 * Created by PhpStorm.
 * User: carlastumpp
 * Date: 21.11.17
 * Time: 09:14
 */


include_once(dirname(__FILE__)."/./account/userdata.php");

try {
    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM produktkatalog ORDER BY date DESC ";
    $query = $db->prepare($sql);
    $query->execute();

    while ($zeile = $query->fetchObject()) {
        echo "<div class='produkte'>";
        echo "<br>";
        echo "<div class='artikelname'>$zeile->artikelname - 
            Marke: $zeile->marke";
        echo "</div><br>";
        if (!empty($zeile->bild)) {
            echo "<p><img src='./system/produkte/$zeile->images'></p><br>";
        }
        echo "<div class='preis'>";
        echo $zeile->preis . "<br>";
        echo "</div>";
    }
    echo "</div>";}
