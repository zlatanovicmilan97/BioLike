 

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        
                        
                        <th>Proizvod</th>
                        <th>Cena</th>
                        <th>Kolicina</th>
                        <th>Jed. mere</th>
                        <th><?php
                  if(isset($_SESSION['korpa'])){
                 echo "<a style='color:red; font-size:70%;' href='models/proizvodi/obrisiKorpu.php' name='obrisiKorpu'>Obriši sve</a>";
                  }
                  ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        if(isset($_SESSION['korpa'])):
                        $br=0;
                    
                          foreach($_SESSION['korpa'] as $podatak):
                            
                      ?>
                      
                      <tr>
                        <input type="hidden" />
                        <td><a class="aa-cart-title" href="#"><?= $podatak['naziv']; ?></a></td>
                        <td class="cenaKorpa" data-id="<?= $podatak['id'] ?>"><?= $podatak['cena']; ?></td>
                        <td><input name='kolicina' class="aa-cart-quantity" type="number" value="0" min="1" data-id="<?= $podatak['id'] ?>"></td>
                        <td><?= $podatak['jedMere']; ?></td>
                        <td><a class="remove" href="models/proizvodi/obrisiProizvodKorpa.php?rb=<?= $br++ ?>"><fa class="fa fa-close"></fa></a></td>
                      </tr>
                          <?php endforeach; endif; ?>
                      </tbody>
                  </table>
                  
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               
               <table class="aa-totals-table">
                 <tbody>
                 <?php 
                       if(isset($_SESSION['korpa'])):
                          $ukupno = 0;
                       foreach($_SESSION['korpa'] as $cena){
                          $ukupno+=$cena['cena'];
                          $PDV=$ukupno*25/100;
                          $ukupnoBezPDV=$ukupno-$PDV;
                       }
                     ?>
                   <tr>
                     <th>Ukupno bez PDV-a:</th>
                     <td class='ukupnoBezPDV'>
                       0
                    </td>
                   </tr>
                   <tr>
                     <th>Ukupno:</th>
                     <td class="ukupnoSaPDV">0</td>
                   </tr>
                      <?php else: echo "<span style='font-size:110%; color:red;'>Korpa je prazna. </span> <a style='text-decoration:underline;' href='index.php?stranica=proizvodi&&strana=1'> (Izaberi proizvode)</a>"; ?>
                   <?php
                  endif;
                    ?>
                 </tbody>
               </table>
               <?php 
               
               if(isset($_SESSION['korpa'])&&isset($_SESSION['korisnik'])){
                echo "<a href='#' id='poruciDugme' class='aa-cart-view-btn'>Poruči</a>";
               }
               else if(isset($_SESSION['korpa'])){
                echo "<span style='font-size:110%; color:red;'>Morate biti prijavljeni kako biste poručili!</span> <a style='text-decoration:underline;' href='' data-toggle='modal' data-target='#login-modal'> (Prijavite se)</a>";
                  } ?>
               
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
