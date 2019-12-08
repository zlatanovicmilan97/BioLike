
 <!-- catg header banner section -->
 <section id="aa-catg-head-banner">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
         <p>Korisnicko ime: <i style="color:red;"><?php echo $_SESSION['korisnik']->korIme ?></i></p>
         <p>Email: <i style="color:red;"><?php echo $_SESSION['korisnik']->email ?></i></p>
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
               <h3>Istorijat porudžbina:</h3>
                  <table class="table">
                    <thead>
                      <tr>
                        
                        
                        <th>redni broj porudžbine</th>
                        <?php
                        if($_SESSION['korisnik']->ulogaID==1){
                            echo "<th>korisnik</th>";
                        }
                         ?>
                        <th>vreme porudžbine</th>
                        <th>iznos</th>
                        
                      </tr>
                    </thead>
                    <tbody style="font-size:90%;">
                      <?php
                        include "models/proizvodi/ispisPorudzbina.php";
                        
                        $porudzbine=porudzIspis();
                        
                        foreach($porudzbine as $por):
                      ?>
                      <tr>
                            <td><?= $por->porudzbinaID ?></td>
                            <?php
                        if($_SESSION['korisnik']->ulogaID==1){
                            echo "<td>$por->korIme</td>";
                        }
                         ?>
                            <td><?= $por->datum ?></td>
                            <td><?= $por->ukupno ?>din.</td>
                      </tr>
                        <?php endforeach; ?>
                      </tbody>
                  </table>
                  
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <?php
               if($_SESSION['korisnik']->ulogaID==1):
                ?>
               <table class="aa-totals-table">
                
                 <tbody>
                    
                   <tr>
                     <th>Ukupan broj porudžbina:</th>
                     <th><?php
                        $ukupnoPor=proudzUkupno();
                        foreach($ukupnoPor as $uk){
                            echo $uk->ukupanBR;
                        } 
                    ?></th>
                   </tr>
                     <tr>
                   <th>Ukupan iznos:</th>
                   <th><?php
                        $ukupnoPor=proudzUkupno();
                        foreach($ukupnoPor as $uk){
                            echo $uk->iznos."din";
                        } 
                    ?></th>
                   </tr>
                 </tbody>
               </table>
                    <?php endif; ?>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
