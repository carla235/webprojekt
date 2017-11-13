<?php
/**
 * Created by PhpStorm.
 * User: zigza
 * Date: 11/8/2017
 * Time: 10:12 AM
 */
define("DBHOST",  "localhost");
define("DBNAME",  "u-cs235");
define("DBUSER", "cs235");
define("DBPASS", "ohBahphae2");

$dbserver="mysql:host=".DBHOST.";dbname=".DBNAME.";charset=utf8";
$options=array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
try {
    $db = new PDO($dbserver, DBUSER, DBPASS, $options);
}
catch (PDOException $p) {
    echo ("Fehler beim Aufbau der Datenbankverbindung.");
    print_r($p);
    die();
}

?>