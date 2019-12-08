 

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div style="text-align:center;" class="cart-view-area">
         <?php 
                        include "models/autor/autorIspis.php";
                        $autor=autor();
                        foreach($autor as $a):
                     ?>
                    
                        <img src='<?= $a->slika ?>'/>
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
               
                  <table class="table">
                    <thead>
                    
                      
                      <tr>
                        <th><?= $a->ime." ".$a->prezime ?></th> 
                      </tr>
                      <tr>
                        <th><?= $a->opis ?></th> 
                      </tr>
                       
                    </thead>
                  </table>
                  <?php endforeach; ?>
                  
                </div>
                <a href="models/autor/word.php" class="wordDugme" style="color:red; padding:1%; border:1px solid">Preuzimi podatke o autoru (WORD)</a>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">  
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
