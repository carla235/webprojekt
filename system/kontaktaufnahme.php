<?php
//include_once "./index.php"
echo " 

<html>
    <head>
        <title> ANNE KERN Concept Store | Kontakt </title>
        <style>
 body {
 font-family: 'Open Sans Condensed', sans-serif;
}
    
.formulare { 
    height: auto;
    width: 50%;
    padding: 0%;  
    margin-right: 25%;
    background-color: ;
}
.checkbox {
    height: auto;
    width: auto;
    padding: 1%;  
    margin-right: 2%;
    background-color: white;
    color: black ;
    cursor: pointer;
    border: solid black;
  
}
#anfragetext {
    width: 100% 
}

input {
    background-color: white;
    color: black ;
    padding: 14px 20px;
    margin: 8px 0;
    cursor: pointer;
    width: 100%;
    border: 1px solid black;
  
}

.button {
    width: 15%;
    height: ;
    margin-right: 2%;
    background-color: lightgray;
    position: relative;
    float: left; 
}

</style>
    </head>
    <body>
        <div class=\"all\">
        
<!-- Formulare -->
    <div class=\"inhalt\">
            <form action=\"mailto:mi017@hdm-stuttgart.de\" method =\"post\" enctype=\"text/plain\">
                
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
                <input class='checkbox' type=\"checkbox\" name=\"grund\" value=\"frage\" />Frage<br />
                <input class='checkbox' type=\"checkbox\" name=\"grund\" value=\"verbesserungsvorschlag\" />Verbesserungsvorschlag<br />
                <input class='checkbox' type=\"checkbox\" name=\"grund\" value=\"feedback\" />Feedback <br/>
                <input class='checkbox' type=\"checkbox\" name=\"grund\" value='anderes' /> Anderes <br/><br/>
                
                 Anfragetext: <br/>
                <textarea id='anfragetext' name= \"anfragetext\" rows=\"10\" cols=\"30\"> </textarea> <br/>
                
            </fieldset>
        </div>
       
        
        <div >
            <input class=\"button\" type=\"reset\" value=\"Zurücksetzen\" />
            <input class=\"button\" type=\"reset\" href='../index.php?page=start' value=\"Abbrechen\" />
            <input class=\"button\" type=\"submit\" value=\"Versenden\" onclick=\"alert('Ihre Anfrage wurde abgeschickt')\" />
        </div>
            </form> 
            </div>
        </div>
    </body>
</html>

";