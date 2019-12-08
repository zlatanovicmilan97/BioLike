<?php 
include "../../config/connection.php";
if(isset($_POST['id'])){
    $id=$_POST['id'];
    
    $upit="DELETE FROM korisnici WHERE korisnikID=:id";
    $pr=$konekcija->prepare($upit);
    $pr->bindParam(':id',$id);
    $pr->execute();
}