<?php

function getDatabaseConnection($dbname = 'heroku_c6708bda43d5f23'){
    
    $host = 'us-cdbr-iron-east-01.cleardb.net';
    $username = 'b4444292890feb';
    $password = 'eed1d6f9';
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
  }

?>