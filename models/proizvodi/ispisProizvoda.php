<?php

    
        


        // FILTER
        
        if(isset($_GET['sort'])){
            include ("../../config/connection.php");
            $sort=$_GET['sort'];
            header("Content-type: application/json");

            if($sort==1){
                $upit="SELECT *, p.naziv AS ime FROM proizvodi p INNER JOIN kategorije k ON p.kategorijaID=k.kategorijaID";
                $rezultat=$konekcija->query($upit);
                $podaci=$rezultat->fetchAll();
                echo json_encode($podaci);
                http_response_code(200);
                
            }

            elseif($sort==2){
                $upit="SELECT *, p.naziv AS ime FROM proizvodi p INNER JOIN kategorije k ON p.kategorijaID=k.kategorijaID ORDER BY ime";
                $rezultat=$konekcija->query($upit);
                $podaci=$rezultat->fetchAll();
                echo json_encode($podaci);
                http_response_code(200);
            }

            elseif($sort==3){
                $upit="SELECT *, p.naziv AS ime FROM proizvodi p INNER JOIN kategorije k ON p.kategorijaID=k.kategorijaID ORDER BY ime DESC";
                $rezultat=$konekcija->query($upit);
                $podaci=$rezultat->fetchAll();
                echo json_encode($podaci);
                http_response_code(200);
            }

            elseif($sort==4){
                $upit="SELECT *, p.naziv AS ime FROM proizvodi p INNER JOIN kategorije k ON p.kategorijaID=k.kategorijaID ORDER BY cena";
                $rezultat=$konekcija->query($upit);
                $podaci=$rezultat->fetchAll();
                echo json_encode($podaci);
                http_response_code(200);
            }

            elseif($sort==5){
                $upit="SELECT *, p.naziv AS ime FROM proizvodi p INNER JOIN kategorije k ON p.kategorijaID=k.kategorijaID ORDER BY cena DESC";
                $rezultat=$konekcija->query($upit);
                $podaci=$rezultat->fetchAll();
                echo json_encode($podaci);
                http_response_code(200);
            }
            

        }

        elseif(isset($_GET['src'])){
            include "../../config/connection.php";
            $src=$_GET['src'];
            $src = "%".strtolower($src)."%";
            $upit="SELECT *, p.naziv AS ime FROM proizvodi p INNER JOIN kategorije k ON p.kategorijaID=k.kategorijaID WHERE p.naziv LIKE '%$src%'";
                $rezultat=$konekcija->query($upit);
                $podaci=$rezultat->fetchAll();
                echo json_encode($podaci);
                http_response_code(200);
        }
        



        function ispisProizvoda(){
            include "config/connection.php";
        if(isset($_GET['id'])&&$_GET['id']!=0){
            $kat=$_GET['id'];
            $upit="SELECT *, p.naziv AS ime FROM proizvodi p INNER JOIN kategorije k ON p.kategorijaID=k.kategorijaID WHERE p.kategorijaID=$kat";
            $rezultat=$konekcija->query($upit);
            return $rezultat;
        }
        else{
            $upit2="SELECT *, p.naziv AS ime FROM proizvodi p INNER JOIN kategorije k ON p.kategorijaID=k.kategorijaID";
            $rezultat=$konekcija->query($upit2);
            return $rezultat;
        }
       
        

        
    }