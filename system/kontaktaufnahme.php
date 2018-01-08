<?php

echo " 

<html>
    <head>
        <meta charset=\"UTF-8\" />
        <meta name=\"author\" content=\"ANNE KERN Concept Store\" />
        <meta name=\"description\" content=\"Kontakt zu ANNE KERN Concept Store aufnehmen\" />
        <meta name=\"keywords\" content=\"Kontakt, Feedback, Frage\" />
        <title> ANNE KERN Concept Store | Kontakt </title>
        <style> 
        
div.all {
    font-family: ; 
    max-width: 1150px;
    min-height:580px;
    margin:auto;
    text-align: justify;
    background-color: white;
    box-shadow: 0 5px 5px 0 rgba(0,0,0,0.24), 0 5px 5px 0 rgba(0,0,0,0.19);
}

header {
    position: fixed;
    display: block;
    background-color: white; 
    top: 0;
    height: 65px;
    max-width: 1150px;
    width:100%;
    margin:auto;
    box-shadow: 0 5px 5px 0 rgba(0,0,0,0.24), 0 5px 5px 0 rgba(0,0,0,0.19);
    
}


div.inhalt {
    margin-top: 74px;
    width: 100%;
}

/*Kontakt*/

div.formulare {
    margin-top:3%;
    margin-left:5%;
    display:inline-block;
    vertical-align: text-top;
}

input[type=text], select {
    width: 100%;
    padding: 10px 20px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

textarea{
    width: 99%;
    height:35%;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
}

fieldset {
    min-width: 450px;
    height: 320px;
    border: 1px solid grey;
    border-radius: 5px;
    width:50%;
    
} 

input[type=submit], input[type=reset] {
    width: 480px;
    background-color: white;
    color: black;
    padding: 14px 20px;
    margin-left: 5%;
    margin-bottom:2%;
    margin-top:10px;
    border: 1px solid silver;
    border-radius: 4px;
    cursor: pointer;
    font-size: 11pt;
    font-family: Avenir;
    box-shadow: 0 5px 5px 0 rgba(0,0,0,0.24), 0 5px 5px 0 rgba(0,0,0,0.19);
    
}

input[type=submit]:hover, input[type=reset]:hover {
   background-color: lightgrey;
   color: white;
    
}
        
        </style>
    </head>
    <body>
        <div class=\"all\">
        
<!-- Formulare -->
    <div class=\"inhalt\">
            <form action=\"mailto:mi017@hdm-stuttgart.de\"
              method =\"post\" enctype=\"text/plain\">
                
        <div class=\"formulare\">
            <fieldset>
                <legend>Persönliche Daten:</legend>
        
                Titel:<br/>
                <select name=\"titel\">
                <option value=\"-.\">-</option>
                <option value=\"Dr.\">Dr.</option>
                <option value=\"Prof.\">Prof.</option>
                <option value=\"Prof. Dr\">Prof. Dr.</option>
                </select> <br/>

                Anrede:<br/>
                <select name=\"anrede\">
                <option value=\"Herr\">Herr</option>
                <option value=\"Frau\">Frau</option>
                </select> <br/>

                Vorname: <br/>
                <input type=\"text\" name= \"Vorname\" size=\"50\" maxlength=\"50\"/> <br/>

                Nachname: <br/>
                <input type=\"text\" name= \"Nachname\" size=\"50\" maxlength=\"50\"/> <br/>

                E-Mail-Adresse: <br/>
                <input type=\"text\" name= \"e-mail\" size=\"50\" maxlength=\"50\"/> <br/>
            </fieldset>
        </div>           
        <div class=\"formulare\">
            <fieldset>
                <legend>Ihre Anfrage:</legend>
        
                Grund der Kontaktaufnahme:<br/>
                <input type=\"checkbox\" name=\"grund\"
                value=\"frage\" />Frage<br />
                <input type=\"checkbox\" name=\"grund\"
                value=\"verbesserungsvorschlag\" />Verbesserungsvorschlag<br />
                <input type=\"checkbox\" name=\"grund\"
                value=\"feedback\" />Feedback <br/>
                <input type=\"checkbox\" name=\"grund\"
                value=\"anderes\" />Anderes <br/><br/>

                Anfragetext: <br/>
                <textarea  name= \"anfragetext\" rows=\"10\" cols=\"30\"> </textarea> <br/>

            </fieldset>
        </div>
        <div class=\"button\">
            <input type=\"reset\" value=\"Zurücksetzen\" />
            <input type=\"submit\" value=\"Versenden\" onclick=\"alert('Ihre Anfrage wurde abgeschickt')\" />
        </div>
            </form> 
            </div>
        </div>
    </body>
</html>

";