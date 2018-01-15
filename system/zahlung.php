<?php
echo "
<html>
<head>
<title>Zahlungsmethode</title>
</head>
<body>
<h1>Bitte wähle deine Zahlungsmethode!</h1>
<form method='post' action='index.php?page=übersicht'>

    <input type=\"radio\" id=\"mc\" name='Zahlmethode' value=\"Kreditkarte\">
    <label for=\"mc\"> Kreditkarte</label> <br><br>
    <input type=\"radio\" id=\"vi\" name=\"Zahlmethode\" value=\"Paypal\">
    <label for=\"vi\"> Paypal</label><br><br>
    <input type=\"radio\" id=\"ae\" name=\"Zahlmethode\" value=\"Lastschrift\">
    <label for=\"ae\"> Lastschrift</label> <br><br>
   
<input type='submit' value='Weiter!' class='button'/>

</form>
";

echo"
 

</body>

</html>





";
/**
 * Created by PhpStorm.
 * User: anna-mariaosterloh
 * Date: 07.01.18
 * Time: 14:55
 */