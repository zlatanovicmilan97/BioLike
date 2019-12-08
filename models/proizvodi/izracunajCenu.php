<?php
if(isset($_POST['kolicina'])&&isset($_POST['id'])){
    $id=$_POST['id'];
    $kol=$_POST['kolicina'];
    include "../../config/connection.php";
    $upit="SELECT cena, proizvodID FROM proizvodi WHERE proizvodID=$id";
    $rezultat=$konekcija->query($upit);
    
    if($rezultat){
        $podatak=$rezultat->fetch();
        $pod=$podatak->cena;
        $ukupno = $pod*$kol;
        print_r($ukupno);
        echo json_encode([$ukupno,$id]);
    }
}