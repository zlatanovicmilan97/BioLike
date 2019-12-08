<?php

require_once("config.php");
// stranica();
try{
$konekcija = new PDO ("mysql:host=".SERVER.";dbname=".DBNAME.";charset=utf8;", USERNAME, PASSWORD);
$konekcija -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$konekcija -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
catch(PDOException $e){
    echo $e -> getMessage();
}

// function stranica(){
//     $open=fopen(LOG_FAJL, "a");
//     if($open){
//         fwrite($open, "{$_SERVER['PHP_SELF']}\t{$_SERVER['REMOTE_ADDR']}\n");
        
//     }
//     fclose($open);
// }