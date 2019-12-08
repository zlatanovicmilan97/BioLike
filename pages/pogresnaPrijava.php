

 <!-- Cart view section -->
 
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">

                
                <h4>Prijava <span style="font-weight:bold; color:red;">
                
                
                <?php 
                  if(isset($_GET['kor'])){
                    echo "Pogresna lozinka!";
                  }
                  else
                  {
                    echo "Korisnik ne postoji!";
                  }
                ?>
                
                
                </span><h5 style="font-weight:bold;">
                
                <?php 
                  if(isset($_GET['kor'])){
                    echo "";
                  }
                  else
                  {
                    echo "(Da li ste registrovani?)";
                  }
                ?>
                
                
                </h5>
                 <form action="models/korisnici/prijavaObrada.php" class="aa-login-form" method="POST" onsubmit="tekst()">
                  <label for="">Korisničko ime<span>*</span></label>
                   <input type="text" placeholder="Korisničko ime" name="prijavaKorIme" autofocus>
                   <label for="">Lozinka<span>*</span></label>
                    <input type="password" placeholder="Lozinka" name="prijavaLozinka">
                    <button type="submit" class="aa-browse-btn" name="prijavaPotvrdi">Uloguj se</button>
                    </br></br></br></br><span></span>
                  
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register"> 
                  
                

                 <h4>Registracija</h4>
                 <form action="models/korisnici/registracijaObrada.php" class="aa-login-form" method="POST" onSubmit="return proveraRegistracija()">
                    <label for="" >Korisničko ime<span>*</span></label>
                    <input type="text" placeholder="Korisničko ime" id="regKorIme" name="regKorIme">
                    <label for="">Email<span>*</span></label>
                    <input type="text" placeholder="Email" id="regEmail" name="regEmail">
                    <label for="">Lozinka<span>*</span></label>
                    <input type="password" placeholder="Lozinka" id="regLozinka" name="regLozinka">
                    <label for="">Potvrdi lozinku<span>*</span></label>
                    <input type="password" placeholder="Potvrdi lozinku" id="regLozinkaP" name="regLozinkaP">
                    <button type="submit" class="aa-browse-btn" id="regPotvrdi" name="regPotvrdi">Registruj se</button>                    
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->