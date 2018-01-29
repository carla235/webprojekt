<?php
/**
 * Created by PhpStorm.
 * User: carlastumpp
 * Date: 13.11.17
 * Time: 11:06
 */

echo "<html>
<head>
<title>ANNE KERN - Contact</title>
  <style>
    
    body{
    height: 100%; 
    }
      .contact{
      position: relative;
      float: left;
      left: 60%;
      margin-right: 10%;
      margin-top: -20%;  
      }
      
      #kontaktaufnahme {
      position: relative; 
      margin-top: 7%; 
      }
      
      .Social{
      display: inline;
      }
      
      .Social a{
      margin-right: 7%;
      }
      
      #contactus{
      padding: auto; 
      }
      
    </style>


</head>
<body>
<h1 id='contactus'>CONTACT US!</h1> <br>
<a href='https://www.google.de/maps/place/Anne+Kern+Concept+Store/@48.4767309,8.9346626,15z/data=!4m5!3m4!1s0x0:0xdc434e420bca24da!8m2!3d48.4767309!4d8.9346626'><img src='./Map.png' width='50%' height='auto%'></a>
<br>

<div class='contact'>
Marktstraße 11 <br>
Rottenburg<br>
Baden-Wurttemberg, Germany<br> <br>
<h1>FOLLOW US!</h1> <br> 

    <div class='Social'>
        <a href='https://www.instagram.com/annekern.conceptstore/?hl=de'><img src='./instagram.png'width='50px' height='50px'></a>
        <a href='https://www.facebook.com/annekern.conceptstore/'><img src='./facebook.png' width='50px' width='50px'></a>
        <div id='kontaktaufnahme'><a href='./system/kontaktaufnahme.php'> ANNE KERN Concept Store kontaktieren </a></div>
    </div>
</div> 


</body>
</html>
";