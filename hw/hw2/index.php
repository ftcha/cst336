<?php

include "inc/functions.php";

?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title> My CSUMB CS Online Status </title>
        <meta charset="utf-8" />
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
        
    <body>
        
        <header> 
            <h1> My CSUMB CS Online Status </h1>
        </header>
        
        
        <br /><br />
        
        <div id="content">
            
            <span id=day> Course of the Day</span>
            <br /> <br />
            
            <?php
                main();
            ?>
            
        </div>
        
        <footer>
            <hr>
              CST336 2018&copy; Tcha <br />
              <strong>Disclaimer:</strong> The information in this webpage is fictitous. <br />
              
              <img src="img/csumb_logo.png" alt="csumb logo" />
            
        </footer>
        
    </body>

</html>