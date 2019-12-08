<?php 

    include '../../config/connection.php';

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        
        $upit="DELETE FROM proizvodi WHERE proizvodID=:nesto";
        $priprema=$konekcija->prepare($upit);
        $priprema->bindParam('nesto',$id);
        $rezultat=$priprema->execute();
       
        header('Location: ../../index.php?stranica=proizvodi&&strana=1#proizvodi');
        
    }