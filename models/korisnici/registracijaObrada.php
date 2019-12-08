<?php 
    include('../../config/connection.php');
     if(isset($_POST['regPotvrdi'])){
        $korIme=$_POST['regKorIme'];
        $email=$_POST['regEmail'];
        $lozinka=md5($_POST['regLozinka']);
		$lozinkaP=md5($_POST['regLozinkaP']);
		

        $korImeProvera = "/^[A-ZČĆŠĐŽa-zčćšđž0-9]{7,20}$/";
        $emailProvera = "/^[a-zA-Z0-9-_.]+@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$/";
        $lozinkaProvera = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
        
        $nizIspravno = [];
        $nizGreske = [];

        if(preg_match($korImeProvera,$korIme)){
            array_push($nizIspravno, $korIme);
        }
        else
        {
            array_push($nizGreske,"korIme");
           
        }

        if(preg_match($emailProvera,$email)){
            array_push($nizIspravno, $email);
        }
        else
        {
            array_push($nizGreske,"Email");
        }

        if(preg_match($lozinkaProvera, $lozinka)){
            array_push($nizIspravno, $lozinka);
        }
        else
        {
            array_push($nizGreske,"Lozinka");
        }

        if($lozinkaP!=$lozinka){
            array_push($nizGreske,"LozinkaPotvrdi");
        }
        else
        {
            array_push($nizIspravno,"Potvrdjeno");
        }

        if(count($nizGreske)==0){
            $upisKorisnika="INSERT INTO korisnici VALUES (NULL,:ime,:mail,:pass,'2')";
            $priprema = $konekcija -> prepare($upisKorisnika);
            $priprema -> bindParam(':ime',$korIme);
            $priprema -> bindParam(':mail',$email);
            $priprema -> bindParam(':pass',$lozinka);
            $priprema -> execute();

            header("Location:../../index.php?stranica=index");
        }
        else
        {
            header("Location:../../index.php?stranica=greska");
        }
    }


?>




