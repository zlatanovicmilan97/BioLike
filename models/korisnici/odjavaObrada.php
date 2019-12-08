<?php
    session_start();
    if(isset($_SESSION['korisnik'])){
        include "../../config/connection.php";
        $upit="UPDATE korisnici SET ulogovan=0 WHERE korisnikID=:id";
        $rezultat=$konekcija->prepare($upit);
        $rezultat->bindParam(':id',$_SESSION['korisnik']->korisnikID);
        $rezultat->execute();
        unset($_SESSION['korisnik']);
        unset($_SESSION['korpa']);
        header("Location:../../index.php?stranica=index");
    }