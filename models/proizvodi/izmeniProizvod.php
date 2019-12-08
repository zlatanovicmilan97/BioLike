<?php 
include "../../config/connection.php";
if(isset($_POST{'id'})){
    $id=$_POST['id'];
    $naziv=$_POST['naziv'];
    $opis=$_POST['opis'];
    $cena=$_POST['cena'];
    $kol=$_POST['kol'];
    $kat=$_POST['kat'];
    $mera=$_POST['mera'];

    $upit="UPDATE proizvodi SET naziv=:naziv,opis=:opis,cena=:cena,kolicina=:kol,kategorijaID=:kat,merna_jedinica=:mera WHERE proizvodID=:id";

    $priprema=$konekcija->prepare($upit);
    $priprema->bindParam(':id',$id);
    $priprema->bindParam(':naziv',$naziv);
    $priprema->bindParam(':opis',$opis);
    $priprema->bindParam(':cena',$cena);
    $priprema->bindParam(':kol',$kol);
    $priprema->bindParam(':kat',$kat);
    $priprema->bindParam(':mera',$mera);
    $rezultat=$priprema->execute();
}