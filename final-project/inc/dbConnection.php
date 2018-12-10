<?php

function getDatabaseConnection($dbname = 'heroku_c6708bda43d5f23'){
    //C9 db info
    $host = 'us-cdbr-iron-east-01.cleardb.net';
    $username = 'b4444292890feb';
    $password = 'eed1d6f9';
    
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 

    //created db connection
    $dbConn=new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //display errors when accessing tables
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}

?>