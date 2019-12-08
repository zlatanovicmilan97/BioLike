<?php 

    include "config/connection.php";
    if(isset($_POST['potvriNoviPr'])){
        $naziv=$_POST['nazivProizvoda'];
        $opis=$_POST['opisProizvoda'];
        $cena=$_POST['cenaProizvoda'];
        $kol=$_POST['kolicinaProizvoda'];
        $kat=$_POST['izaberiKat'];
        $jedMere=$_POST['izaberiMeru'];

        $vreme=time();
        $imeFajla=$_FILES['slikaFajl']['name'];
        $tmpFajla=$_FILES['slikaFajl']['tmp_name'];
        $velFajla = $_FILES['slikaFajl']['size'];
        $tipFajla = $_FILES['slikaFajl']['type'];

        $tipovi = ['image/jpg', 'image/png', 'image/jpeg'];
        $greske=[];
            if(!in_array($tipFajla, $tipovi)){
                array_push($greske, "Pogresan tip fajla.");
            }
            if($velFajla > 4000000){
                array_push($greske, "Fajl je preveliki.");
            }

            if(count($greske) == 0){
                list($sirina, $visina) = getimagesize($tmpFajla);

                $postojecaSlika = null;
                switch($tipFajla){
                    case 'image/jpeg':
                        $postojecaSlika = imagecreatefromjpeg($tmpFajla);
                        break;
                    case 'image/png':
                        $postojecaSlika = imagecreatefrompng($tmpFajla);
                        break;
                }

                $novaVisina = $visina*0.7;
                $novaSirina = ($visina/$novaVisina) * $sirina;

                $novaSlika = imagecreatetruecolor($novaSirina, $novaVisina);

                imagecopyresampled($novaSlika, $postojecaSlika, 0, 0, 0, 0, $novaSirina, $novaVisina, $sirina, $visina);

                $ime = time().$imeFajla;
                $putanjaNove = 'assets/img/proizvodi/mala'.$ime;

                switch($tipFajla){
                    case 'image/jpeg':
                        imagejpeg($novaSlika, $putanjaNove, 75);
                        break;
                    case 'image/png':
                        imagepng($novaSlika, $putanjaNove);
                        break;
                }
            }
        
        $krajnjaPutanja="assets/img/proizvodi/$vreme$imeFajla";
        $novaSlika=move_uploaded_file($tmpFajla,$krajnjaPutanja);

        $upit="INSERT INTO proizvodi VALUES (NULL,:naziv,:opis,:cena,:kol,:slika,:kat,:jed)";

        $priprema=$konekcija->prepare($upit);
        $priprema->bindParam(':naziv',$naziv);
        $priprema->bindParam(':opis',$opis);
        $priprema->bindParam(':cena',$cena);
        $priprema->bindParam(':kol',$kol);
        $priprema->bindParam(':slika',$krajnjaPutanja);
        $priprema->bindParam(':kat',$kat);
        $priprema->bindParam(':jed',$jedMere);
        $priprema->execute();

        header("Location:index.php?stranica=proizvodi&&strana=1");


        


    }




