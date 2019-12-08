<?php 

function slajder(){
    include "config/connection.php";
    $upit="SELECT * FROM slajder s INNER JOIN kategorije k ON s.kategorijaID=k.kategorijaID";
    $rez=$konekcija->query($upit);
    if($rez){
        return $rez;
    }
}