<?php
    
    function porudzIspis(){
        include "config/connection.php";
        if(isset($_SESSION['korisnik'])){
            $korID=$_SESSION['korisnik']->korisnikID;
            if($_SESSION['korisnik']->ulogaID==2){
                $upit="SELECT * FROM porudzbine p INNER JOIN korisnici k ON p.korisnikID=k.korisnikID WHERE k.korisnikID=$korID ORDER BY porudzbinaID DESC";
                 $rezultat=$konekcija->query($upit);
             if($rezultat){
            return $rezultat;
        }
     }
     else
     {
        $upit="SELECT * FROM porudzbine p INNER JOIN korisnici k ON p.korisnikID=k.korisnikID ORDER BY porudzbinaID DESC";
        $rezultat=$konekcija->query($upit);
            if($rezultat){
         return $rezultat;
}
     }
  }
}

function proudzUkupno(){
    include "config/connection.php";
    $upitUkupno="SELECT COUNT(*) AS ukupanBR, SUM(ukupno) AS iznos FROM porudzbine";
    $ukupno=$konekcija->query($upitUkupno);
    if($ukupno){
        return $ukupno;
    }
}