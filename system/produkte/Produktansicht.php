<?php
echo "<html>";
echo "<br>";
include(dirname(__FILE__)."/./account/userdata.php");

try {
    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM produkt WHERE id=(SELECT MAX(id) FROM blogposts) ";
    $query = $db->prepare($sql);
    $query->execute();

    $zeile =$query->fetchObject();
    if ($zeile == NULL) {
        echo "Bla";
    } else {
        echo "<img scr='./system/images/$zeile->filename' width='200em' height='auto'> ";
        echo "<p>".$zeile->content."</p><br>";
        echo "  <p><img src='./system/blogposts/uploads/$zeile->filename' width='200em' height='auto' ></p>";
    }
    $db=null;}

catch (PDOException $e) {
    echo "Error!: Bitte wenden Sie sich an den Administrator!?..." . $e;
    die();
}
//echo "</div>";
echo"<html>";
?>

/**
 * Created by PhpStorm.
 * User: anna-mariaosterloh
 * Date: 21.11.17
 * Time: 13:53
 */