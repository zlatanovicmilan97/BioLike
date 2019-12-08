<?php
define("BASE_URL", "http://localhost/BioLike/");
define("ABSOLUTE_PATH", $_SERVER['DOCUMENT_ROOT']."/BioLike/");

define("ENV_FAJL", ABSOLUTE_PATH."config/.env");
define("LOG_FAJL", ABSOLUTE_PATH."data/log.txt");

define("SERVER", env("SERVER"));
define("DBNAME", env("DBNAME"));
define("USERNAME", env("USERNAME"));
define("PASSWORD", env("PASSWORD"));

function env($naziv){
    $open=fopen(ENV_FAJL, 'r');
    $podaci=file(ENV_FAJL);
    // fclose(ENV_FAJL);
    $vrednost="";

    foreach($podaci as $podatak){
        $konfig=explode("=", $podatak);
        if($konfig[0]==$naziv){
            $vrednost=trim($konfig[1]);
        }
    }
    return $vrednost;
}
