<?php

function ispisKat(){
    include ("config/connection.php");

    $katUpit="SELECT * FROM kategorije";
                  $rezultat=$konekcija->query($katUpit);
                  if($rezultat){
                    return $rezultat;
                  }
}