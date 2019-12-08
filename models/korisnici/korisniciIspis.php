<?php 
    
    function ispisiKorisnike(){
        include "config/connection.php";
        $upit="SELECT * FROM korisnici k INNER JOIN uloge u ON k.ulogaID=u.ulogaID ORDER BY u.ulogaID";
        $rezultat=$konekcija->query($upit);
        if($rezultat){
            return $rezultat;
        }
    }

    function brKorisnika(){
        include "config/connection.php";
        $upitBR="SELECT COUNT(*) AS brKor FROM korisnici";
        $rezultatBR=$konekcija->query($upitBR);
        if($rezultatBR){
            return $rezultatBR;
        }
    }
    
    function brUlogovanih(){
        include "config/connection.php";
        $upitUL="SELECT COUNT(*) AS brUL FROM korisnici WHERE ulogovan=1";
        $rezultatUL=$konekcija->query($upitUL);
        if($rezultatUL){
            return $rezultatUL;
        }
    }