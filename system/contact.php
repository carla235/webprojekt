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
    
    html{
       height: 100%; 
       width: 100%; 
    }
    
    body {
        font-family: 'Open Sans Condensed', sans-serif;
        margin-left: 10%;
        margin-right: 10%;
        height: 100%; 
    }
    
      .contact{
      left: 30%;
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
      
      .umrandung_1{
 border-style: dotted;
  border-width: 1.5px;
  margin-left: 1.1%;
  margin-right:5px;
  margin-top: 5%;
  margin-bottom: 5%;
  padding: 1%;
  padding-left:5%;
  padding-right:5%;
  padding-bottom:5%;
  padding-top:7%;
  }
  
  .inhaberin{
margin-left: 0.1%;
  margin-right:1px;
  margin-top: 5%;
  margin-bottom: 5%;

  }
      
 .map{
margin-left: 0.1%;
  margin-right:1px;
  margin-top: 11%;
  margin-bottom: 5%;

  }
      
    </style>


</head>
<body>

<div class=\"container\">
<div class='col-sm-12>
<h1 id='contactus'>CONTACT US!</h1> <br>
</div>
  <div class=\"row\">
  <div class=\"col-sm-6 inhaberin\">
<img src='./images/inhaberin.jpg'  width='80%' height='auto'>
</div><br>
<div class='col-sm-4 umrandung_1'>
<p class=\"text-left\">
„Ich möchte Menschen mit meinem Produkt- und Markenangebot in toller Atmosphäre regelmäßig überraschen, sie inspirieren und immer wieder aufs Neue begeistern“
<br><br>
<h2>FOLLOW US!</h2> <br> 

    <div class='Social'>
        <a href='https://www.instagram.com/annekern.conceptstore/?hl=de'><img src='./instagram.png'width='50px' height='50px'></a>
        <a href='https://www.facebook.com/annekern.conceptstore/'><img src='./facebook.png' width='50px' width='50px'></a>
        <div id='kontaktaufnahme'><a href='./system/kontaktaufnahme.php'> ANNE KERN Concept Store kontaktieren </a></div>
    </div>
</p>
</div>

<div class=\"container\">

<div class=\"row\">
  <div class=\"col-sm-6 map\">
<a href='https://www.google.de/maps/place/Anne+Kern+Concept+Store/@48.4767309,8.9346626,15z/data=!4m5!3m4!1s0x0:0xdc434e420bca24da!8m2!3d48.4767309!4d8.9346626'><img src='./Map.png' width='80%' height='auto'></a>
</div><br>
<div class='col-sm-4 umrandung_1'>

<p class=\"text-left\">
Marktstraße 11 <br>
72108 Rottenburg<br>
Baden-Wurttemberg, Germany<br>
Tel:  07472/4405268 <br>
Mo-Sa, 10:00-18:30 <br><br>
 
</p>
</div>



</body>
</html>
";