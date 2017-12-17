<?php
session_start();
if(isset($_GET['delete'])) {
    $del_id = $_GET['delete'];

   unset($_SESSION['warenkorb'][$del_id]);

}
header("Location:../index.php?page=warenkorb");

/**
 * Created by PhpStorm.
 * User: anna-mariaosterloh
 * Date: 16.12.17
 * Time: 19:33
 */