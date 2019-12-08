<?php
   
   session_start();
   include('../../config/connection.php');
    if(isset($_POST['prijavaPotvrdi'])){
        
        $korIme=$_POST['prijavaKorIme'];
        $lozinka=md5($_POST['prijavaLozinka']);

        $upit="SELECT * FROM korisnici WHERE korIme=:korisnicko AND lozinka=:pass";
        $priprema=$konekcija->prepare($upit);
        $priprema -> bindParam(":korisnicko",$korIme);
        $priprema -> bindParam(":pass",$lozinka);
        
        $rezultat= $priprema->execute();



        if($rezultat){
            if($priprema->rowCount()==1){
                $korisnik = $priprema->fetch();
                
                $_SESSION['korisnik']=$korisnik;
                $upit2="UPDATE korisnici SET ulogovan=1 WHERE korisnikID=:id";
                $rezultat=$konekcija->prepare($upit2);
                $rezultat->bindParam(':id',$_SESSION['korisnik']->korisnikID);
                $rezultat->execute();

                header("Location:../../index.php?stranica=index");
            }
            else{
                
                $upit3="SELECT * FROM korisnici WHERE korIme=:ime";
                $priprema3=$konekcija->prepare($upit3);
                $priprema3 -> bindParam(":ime",$korIme);
                $rezultat3=$priprema3->execute();
                
                if($rezultat3){
                    if($priprema3->rowCount()==1){
                        
                        $to      = 'milanzlatanovic97@hotmail.rs';
                        $subject = 'Pogresna lozinka';
                        $message = 'Poštovani, na našem sajtu je iskorišćeno Vaše korisničko ime prilikom neuspele prijave. Da li ste to bili Vi?';
                        $headers = 'From: xmix97@live.com' . "\r\n" .
                            'Reply-To: xmix97@live.com' . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();
                        mail($to, $subject, $message, $headers);
        
                         header("Location:../../index.php?stranica=pogresnaPrijava&&kor");
                        } 
                        else
                        {
                            header("Location:../../index.php?stranica=pogresnaPrijava");
                        } 
                    
                    
                }
            }
            
                
         }



            
        }
        
        
        
    

    // if(isset($_POST['prijavaPotvrdi2'])){
    //     $korIme=$_POST['prijavaKorIme'];
    //     $lozinka=md5($_POST['prijavaLozinka']);

    //     $upit="SELECT * FROM korisnici WHERE korIme=:korisnicko AND lozinka=:pass";
    //     $priprema=$konekcija->prepare($upit);
    //     $priprema -> bindParam(":korisnicko",$korIme);
    //     $priprema -> bindParam(":pass",$lozinka);
        
    //     $rezultat= $priprema->execute();
    //     if($rezultat){
    //         if($priprema->rowCount()==1){
    //             $korisnik = $priprema->fetch();

    //             $_SESSION['korisnik']=$korisnik;

    //             header("Location:../../index.php?stranica=index");
    //         }
    //     }
        
    // }