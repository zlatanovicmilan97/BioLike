<?php

    function linkoviIspis(){
        include "config/connection.php";
        $upit="SELECT * FROM linkovi";
        $rez=$konekcija->query($upit);
        if($rez){
            return $rez;
        }
    }