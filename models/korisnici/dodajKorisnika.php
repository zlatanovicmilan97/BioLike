<?php

include "../../config/connection.php";

if(isset($_POST['ime'])){
    $ime=$_POST['ime'];
    $email=$_POST['email'];
    $lozinka=md5($_POST['lozinka']);
    $uloga=$_POST['uloga'];

    $upit="INSERT INTO korisnici VALUES(NULL,:ime,:email,:lozinka,:uloga,0)";
    $pr=$konekcija->prepare($upit);
    $pr->bindParam(':ime',$ime);
    $pr->bindParam(':email',$email);
    $pr->bindParam(':lozinka',$lozinka);
    $pr->bindParam(':uloga',$uloga);
    $pr->execute();
}