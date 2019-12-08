<?php
session_start();
if(isset($_POST['korpaPotvrdi'])){
    $id=$_POST['skrivenoId'];
    $naziv=$_POST['skrivenoNaziv'];
    $opis=$_POST['skrivenoOpis'];
    $cena=$_POST['skrivenoCena'];
    $jedMere=$_POST['skrivenoJM'];

    $korpa=['id'=>$id,'naziv'=>$naziv,'opis'=>$opis,'cena'=>$cena,'jedMere'=>$jedMere];

    $_SESSION['korpa'][]=$korpa;
    header('Location:../../index.php?stranica=proizvodi&&strana=1');
}