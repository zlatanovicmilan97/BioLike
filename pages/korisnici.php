
<?php if(isset($_SESSION['korisnik'])&&$_SESSION['korisnik']->ulogaID==1){
    echo "";
    
}
else
{
    echo "<script type='text/javascript'>window.onload=function(){
        window.location.replace('http://localhost/BioLike/dailyShop/index.php?stranica=greska');
    }</script>";
}
 ?>
 <!-- catg header banner section -->
 <section id="aa-catg-head-banner">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Korisnici</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Cart</li>
        </ol>
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
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        
                        
                        <th>ID</th>
                        <th>kor. ime</th>
                        <th>email</th>
                        <th>lozinka</th>
                        <th>uloga</th>
                        <th>aktivnost</th>
                        
                        <th>obriši</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody style="font-size:90%;">
                      <?php
                        include "models/korisnici/korisniciIspis.php";
                        $korisnici=ispisiKorisnike();
                        foreach($korisnici as $kor): 
                      ?>
                      
                      <tr>
                        <input type="hidden" />
                        <td><?= $kor->korisnikID ?></td>
                        <td><input  id="korIme"  style="border:0px; background-color:#F5F5F5" type="text" value="<?= $kor->korIme ?> "/></td>
                        <td><input id="korEmail"  style="border:0px; background-color:#F5F5F5" type="text" value="<?= $kor->email ?>"/></td></td>
                        <td><input id="korPass" class="korisnik"  style="border:0px; background-color:#F5F5F5" type="text" value="<?= $kor->lozinka ?>"/></td>
                        <td><select id="korUl">
                            <?php if($kor->ulogaID==1) {echo"<option value='$kor->ulogaID'>$kor->ulogaNaziv</option>
                            <option value='2'>korisnik</option>";}
                            elseif($kor->ulogaID==2){echo"<option value='$kor->ulogaID'>$kor->ulogaNaziv</option>
                                <option value='1'>admin</option>";
                            }
                            ?>
                        </select></td>
                        <td style='<?php 
                            if($kor->ulogovan==0){
                                echo "color:red;";
                            }
                            else{
                                echo "color:green;";
                            }
                        ?>'><input style="border:0px; background-color:#F5F5F5" type="text" value="<?php if($kor->ulogovan==1){echo "Ulogovan";} else{echo "Odjavljen";} ?>" disabled/></td>
                            
                        <td><?php if($kor->ulogaID==2){ echo "<a class='obrisi' href='#' data-obrisiID='$kor->korisnikID'>Obriši</a>";} ?></td>
                        
                      </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td></td>
                            <td><input id="dodajIme" style="background-color:#F5F5F5; border:1px solid #9e9e9e;" type="text"/></td>
                            <td><input id="dodajEmail" style="background-color:#F5F5F5; border:1px solid #9e9e9e;" type="text"/></td>
                            <td><input id="dodajLozinka" style="background-color:#F5F5F5; border:1px solid #9e9e9e;" type="text"/></td>
                            <td><select id="dodajUloga">
                                <option value='0'>Izaberite</option>
                                <option value='1'>admin</option>
                                <option value='2'>korisnik</option>
                            </select></td>
                            <td></td>
                            <td></td>
                            <td><a href="#" id="dodajKorDugme">Dodaj korisnika</a></td>
                        </tr>
                      </tbody>
                  </table>
                  
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Ukupan broj korisnika:</th>
                     <?php $brKorisnika=brKorisnika();
                     foreach($brKorisnika as $brK){
                         echo "<td>$brK->brKor</td>";} 
                         ?>
                   </tr>
                     <tr>
                   <th>Broj ulogovanih korisnika:</th>
                   <?php $brUlogovanig=brUlogovanih();
                     foreach($brUlogovanig as $brUL){
                         echo "<td>$brUL->brUL</td>";} 
                         ?>
                   </tr>
                 </tbody>
               </table>
               <a href="models/korisnici/excel.php" class="excelDugme" style="color:red; padding:1%; border:1px solid">Export korisnika u EXCEL</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
