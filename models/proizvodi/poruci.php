<?php
    session_start();
    include "../../config/connection.php";
    if(isset($_SESSION['korisnik'])){
    $kor=$_SESSION['korisnik']->korisnikID;
    if(isset($_POST['ukupno'])){
        $ukupno=$_POST['ukupno'];
        $datum=date('d.m.Y H:i:s');
        $upit="INSERT INTO porudzbine VALUES (NULL,:kor,:ukupno,:datum)";
        $pr=$konekcija->prepare($upit);
        $pr->bindParam(':kor',$kor);
        $pr->bindParam(':ukupno',$ukupno);
        $pr->bindParam(':datum',$datum);
        $pr->execute();
        unset($_SESSION['korpa']);
    }
}