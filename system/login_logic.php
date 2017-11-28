<?php

include(dirname(__FILE__) . "/account/userdata.php"); // Inkludiere userdata
session_start();

//$db = new PDO($dsn, $dbuser, $dbpass, $option);

$email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
if(!empty($email)) { // Wenn email nicht leer wird Passwort geholt aus Formular
    $errorMessage = "";
    $passwort = htmlspecialchars($_POST["passwort"], ENT_QUOTES, "UTF-8");

    $db = new PDO($dsn, $dbuser, $dbpass, $option);
    $sql = "SELECT * FROM benutzer WHERE email= :email  ";
    $query = $db->prepare($sql);
    $query->execute(array(':email' => $email, ));

    $zeile = $query->fetch();

    //Überprüfung des Passworts wenn e-mail stimmt

//if (password_verify($passwort, $zeile["passwort"]== false)){echo "123";}

   if($zeile !== false && password_verify($passwort, $zeile["passwort"])) {

        $_SESSION['kundennummer'] = $zeile['kundennummer'];
         header("Location:./../index.php");
      //die('Login erfolgreich. Weiter zu <a href="index.php">internen Bereich</a>');
   } else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }
}


//echo "<html> Hallo</html>";

/*if (!empty($errorMessage)) {

    echo "<html> 
    <head><meta charset=\"UTF-8\">
    
    <body>
    <h1>Login! </h1>
<form action='./system/login_logic.php' method='post'>
e-mail <input type='text' name='email'> <br>
Passwort <input type='password' name='passwort'><br>
<input type='submit' value='Einloggen!'>
</form>
  

    </body>
    </html>";
}
    else{
        echo " Seite nicht gefunden!";}


/**
 * Created by PhpStorm.
 * User: anna-mariaosterloh
 * Date: 22.11.17
 * Time: 17:50
 */