<?php 

    

    function autor(){
        include "config/connection.php";
        $upit="SELECT * FROM autor";
        $rez=$konekcija->query($upit);
        if($rez){
            return $rez;
        }
    }