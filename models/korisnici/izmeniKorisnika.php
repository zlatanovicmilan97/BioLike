<?php

include "../../config/connection.php";
if(isset($_POST['id'])){
    $id=$_POST['id'];
    $ime=$_POST['ime'];
    $email=$_POST['email'];
    if(strlen($_POST['lozinka']>8)){
        $lozinka=$_POST['lozinka'];
    }
    else{
        $lozinka=md5($_POST['lozinka']);
    }
    
    $uloga=$_POST['uloga'];
    
    $upit="UPDATE korisnici SET korIme=:ime, email=:email, lozinka=:lozinka, ulogaID=:uloga WHERE korisnikID=:id";
    $pr=$konekcija->prepare($upit);
    $pr->bindParam(':ime',$ime);
    $pr->bindParam(':email',$email);
    $pr->bindParam(':lozinka',$lozinka);
    $pr->bindParam(':uloga',$uloga);
    $pr->bindParam(':id',$id);
    
    $pr->execute();
    var_dump($pr);
    
}