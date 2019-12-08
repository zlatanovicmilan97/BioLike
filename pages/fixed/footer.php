 <!-- footer -->  
 <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                  <?php
                    $lin=linkoviIspis();
                    foreach($lin as $link):
                   ?>
                    <li><a href="<?= $link->link_putanja ?>"><?= $link->link_naziv ?></a></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
              
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Korisni linkovi</h3>
                    <ul class="aa-footer-nav">
                      
                      <li><a href="data/dokumentacijaPDF.pdf" target="_blank">Dokumentacija</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Kontaktirajte nas</h3>
                    <address>
                      <p>Aleksandra Vojinovića 56, Resnik-Beograd</p>
                      <p><span class="fa fa-phone"></span>+381 64 1234 567</p>
                      <p><span class="fa fa-envelope"></span>biolike@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Autor: <a href="index.php?stranica=autor">Zlatanovic Milan 158/16</a></p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->

  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Prijava / Registracija</h4>
          <form action="models/korisnici/prijavaObrada.php" class="aa-login-form" method="POST">
            <label for="">Korisničko ime<span>*</span></label>
            <input type="text" placeholder="Korisničko ime" name="prijavaKorIme">
            <label for="">Lozinka<span>*</span></label>
            <input type="password" placeholder="Lozinka" name="prijavaLozinka">
            <button class="aa-browse-btn" type="submit" name='prijavaPotvrdi'>Login</button>
           
            <div class="aa-register-now">
              Niste registrovani?<a href="index.php?stranica=registracija">Registrujte se sada!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>    

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="assets/js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="assets/js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="assets/js/sequence.js"></script>
  <script src="assets/js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="assets/js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="assets/js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="assets/js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="assets/js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="assets/js/custom.js"></script> 
<?php if(isset($_SESSION['korpa'])){
  echo "<script type='text/javascript'>
         $(document).ready(function(){
          $('#odjava').click(function(){
            var potvrdiOdjavu=confirm('Ukoliko se odjavite stavke iz vase korpe ce biti ponistene!');
            if(potvrdiOdjavu == true){
              return true;
            }
            else
            {
              return false;
            }
          });
         });

  </script>";
} ?>
    <script type="text/javascript">
        $(document).ready(function(){   
          
          $('.obrisi').click(function(){
            var korID=$(this).data('obrisiid');
            $.ajax({
              url:'models/korisnici/obrisiKor.php',
              method:'POST',
              type:'json',
              data:{
                id:korID
              },
              success:function(){
                window.location.replace("http://localhost/BioLike/index.php?stranica=korisnici");
              }
            });
          });

          // $('.izmeniKor').click(function(){
          //   var korIzm=$(this).data('izmeni');
          //   var korIme=$('#korIme').val();
          //   console.log(korIme);
          //   var email=$('#korEmail').val();
          //   console.log(email);
          //   var lozinka=$('#korPass').val();
          //   console.log(lozinka);
          //   var uloga=$('#korUl :checked').val();
          //   console.log(lozinka);
          //   $.ajax({
          //     url:'models/korisnici/izmeniKorisnika.php',
          //     method:'POST',
          //     type:'json',
          //     data:{
          //       id:korIzm,
          //       ime:korIme,
          //       email:email,
          //       lozinka:lozinka,
          //       uloga:uloga 
          //     },
          //     success:function(){
          //       // window.location.replace("http://localhost/BioLike/index.php?stranica=korisnici");
          //     }
          //   });
          // });

          $('#dodajKorDugme').click(function(){
            var dodajIme=$('#dodajIme').val();
            var dodajEmail=$('#dodajEmail').val();
            var dodajLozinka=$('#dodajLozinka').val();
            var dodajUloga=$('#dodajUloga :checked').val();

            $.ajax({
              url:'models/korisnici/dodajKorisnika.php',
              method:'POST',
              type:'json',
              data:{
                ime:dodajIme,
                email:dodajEmail,
                lozinka:dodajLozinka,
                uloga:dodajUloga 
              },
              success:function(){
                window.location.replace("http://localhost/BioLike/index.php?stranica=korisnici");
              }
            });
          });

          




          


//           $("#button").click(function() {
//     $('html, body').animate({
//         scrollTop: $("#myDiv").offset().top
//     }, 2000);
// });


          $('.aa-cart-quantity').change(function(){
          
          let nizKolicina=[];
          let nizCena=[];
         

            $('.cenaKorpa').each(function(){
              let cena=$(this).text();
              nizCena.push(cena);
            });

            $('.aa-cart-quantity').each(function(){
              let kolicina = $(this).val();
              nizKolicina.push(kolicina);
              
            });
    


            let nizZbir=nizCena.map(function(x,y){
              return x * nizKolicina[y];
            });

            
            let nizZbirNovo=[];
            $('.ukupnoKorpa').each(function(){
              let vrednost=$(this).val();
              nizZbirNovo.push(vrednost);
              
            });
            Array.prototype.splice.apply(nizZbirNovo, [0, nizZbir.length].concat(nizZbir));
        
            let nizZbirNovoSum=0;
            for(var i=0; i<nizZbirNovo.length; i++){
              nizZbirNovoSum+=nizZbirNovo[i];
            }
            console.log(nizZbirNovoSum);
            $('.ukupnoBezPDV').text(nizZbirNovoSum-(nizZbirNovoSum*20/100));
            $('.ukupnoSaPDV').text(nizZbirNovoSum);
          });




          
          $('.izmeniPr').click(function(e){
            e.preventDefault();
            let proID=$('#proSkriveno').data('id');
            let proNaziv=$('#proNaziv').val();
            let proOpis=$('#proOpis').val();
            let proCena=$('#proCena').val();
            let proKol=$('#proKol').val();
            let izmeniKat=$('#izmeniKat').find(':selected').val();
            let izmeniMeru=$('#izmeniMeru').find(':selected').val();
            $.ajax({
              url:'models/proizvodi/izmeniProizvod.php',
              method:'POST',
              type:'json',
              data:{
                id:proID,
                naziv:proNaziv,
                opis:proOpis,
                cena:proCena,
                kol:proKol,
                kat:izmeniKat,
                mera:izmeniMeru
              },
              success:function(){
                window.location.replace("http://localhost/BioLike/index.php?stranica=proizvodi&&strana=1");
              }
            });

            
            
          });
          $('.sortiraj').change(function(e){
            e.preventDefault();

            var sort=$(this).val();
            $.ajax({
              url:'models/proizvodi/ispisProizvoda.php',
              method:'GET',
              dataType:'json',
              data:{
                sort:sort
              },
              success:function(sortirani){
                ispisPr(sortirani);
              }
            });
          });

          $('#pretraga').keyup(function(e){
            e.preventDefault();
            

            var src=$(this).val();
            
            $.ajax({
              url:'models/proizvodi/ispisProizvoda.php',
              method:'GET',
              dataType:'json',
              data:{
                src:src
              },
              success:function(sortirani){
                ispisPr(sortirani);
              }
            });
          });



          $('#poruciDugme').click(function(){
            var ukupno=$('.ukupnoSaPDV').text();
            $.ajax({
              url:'models/proizvodi/poruci.php',
              method:'POST',
              type:'json',
              data:{
                ukupno:ukupno
              },
              success:function(){
                window.location.replace("http://localhost/BioLike/index.php?stranica=profil");
              }
            });
          });



        });

      function ispisPr(sortirani){
          html="";
          for(let sortiran of sortirani){
            html+=htmlSort(sortiran);

          }
          $('.aa-product-catg').html(html);
        }

        function htmlSort(sortiran){
          return ` <li>
                
                <form action="models/proizvodi/korpa.php" method="POST">
                <figure>
                  <a class="aa-product-img" href="#"><img style="height:300px; width:260px;" src="${sortiran.slika}" alt="${sortiran.ime}"></a>
                  <input style='width:100%; border:0px; opacity:0.9' type='submit' class='aa-add-card-btn' value='Dodaj u korpu' name='korpaPotvrdi'/>
                  
                   <input type='hidden' value='${sortiran.proizvodID}' name='skrivenoId'>
                   <input type='hidden' value='${sortiran.ime}' name='skrivenoNaziv'>
                   <input type='hidden' value='${sortiran.cena}' name='skrivenoCena'>
                   <input type='hidden' value='${sortiran.opis}' name='skrivenoOpis'>
                   <input type='hidden' value='${sortiran.merna_jedinica}' name='skrivenoJM'>
                  
                  <figcaption>
                    <h4 class="aa-product-title"><a href="#" value=''>${sortiran.ime}</a></h4>
                    <span class="aa-product-price">${sortiran.cena}din.</span>
                    <p class="aa-product-descrip">${sortiran.opis}</p>
                    <?php
                  if(isset($_SESSION['korisnik'])&&$_SESSION['korisnik']->ulogaID==1):
                 ?> 

                 <br/><a class='izbrisiProizvod' style='color:red; font-style:italic;' href='models/proizvodi/izbrisiProizvod.php?id=${sortiran.proizvodID}'>Ukloni </a>/
                    <a class='izmeniProizvod' style='color:red; font-style:italic;' href='index.php?stranica=proizvodi&&id=${sortiran.proizvodID}&&strana=1#izmeniProizvod' data-id="${sortiran.proizvodID}">Izmeni</a>
                  <?php endif; ?>
                  </figcaption>
                </figure>                         
  
                <!-- product badge -->
               <span class='aa-badge aa-sale' href='#'> ${sortiran.merna_jedinica} </span>
  
                 
                 </form>
                 
              </li>`;
        }



        function proveraRegistracija(){
            var korIme=document.querySelector('#regKorIme').value.trim();
            var email=document.querySelector('#regEmail').value;
            var lozinka=document.querySelector('#regLozinka').value;
            var lozinkaP=document.querySelector('#regLozinkaP').value;
            
            var korImeProvera = /^[A-ZČĆŠĐŽa-zčćšđž0-9]{7,20}$/;
            var emailProvera = /^[a-zA-Z0-9-_.]+@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$/;
            var lozinkaProvera = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

            var regIspravno = [];
            var regGreske = [];

            if(korImeProvera.test(korIme)){
                regIspravno.push(korIme);
                document.querySelector("#regKorIme").style.borderColor="#ddd";
            }
            else
            {
                regGreske.push("KORime");
                document.querySelector("#regKorIme").style.borderColor="red";
            }

            if(emailProvera.test(email)){
                regIspravno.push(email);
            }
            else
            {
                regGreske.push("email");
            }

            if(lozinkaProvera.test(lozinka)){
                regIspravno.push(lozinka);
            }
            else
            {
                regGreske.push("lozinka");
            }

            if(lozinkaP!=lozinka){
                regGreske.push("LozinkaP");
            }
            else
            {
                regIspravno.push("Potvrdjeno");
            }

            if(regGreske.length!=0){
               
                return false;
                
            }
            else{
                
                return true;
            }
        }

    </script>


  </body>
</html>