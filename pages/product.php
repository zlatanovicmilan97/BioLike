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
    
  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sortiraj</label>
                  <select class="sortiraj" name="">
                    <option value="1">Podrazumevano</option>
                    <option value="2">Naziv(a-z)</option>
                    <option value="3">Naziv(z-a)</option>
                    <option value="4">Cena(rastuće)</option>
                    <option value="5">Cena(opadajuće)</option>
                  </select>
                </form>
                
                
                
              </div>
              <div id="proizvodi" class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>

            <div  class="aa-product-catg-body">
              <?php if(isset($_SESSION['korisnik'])&&$_SESSION['korisnik']->ulogaID==1): ?>
            <div id="noviProizvod">
            <h3>Novi proizvod</h3>
                    <form action="noviProizvod.php" method="POST" enctype="multipart/form-data">
                      Naziv:
                      <input type="text" name="nazivProizvoda"/>
                      Opis:
                      <input type="text" name="opisProizvoda"/>
                      Cena:
                      <input type="number" name="cenaProizvoda" min="0" value="0"/></br>
                      Kolicina:
                      <input type="number" name="kolicinaProizvoda" min="0" value="0"/>


                      Kategorija:
                      <select name="izaberiKat">
                        <option value="0">Izaberite</option>
                      <?php require_once("models/proizvodi/ispisKategorija.php"); 
                        $kategorijeUP=ispisKat();
                        foreach($kategorijeUP as $katUP):
                      ?>
                        <option value="<?= $katUP->kategorijaID ?>"><?= $katUP->naziv ?></option>
                        <?php endforeach; ?>
                      </select>
                      Jedinica mere:
                      <select name="izaberiMeru">
                          <option value="0">Izaberite</option>
                          <option value="kg.">kg.</option>
                          <option value="kom.">kom.</option>
                      </select></br>
                      
                      Slika:<input style="margin-left:37%;" type="file" name="slikaFajl"/>
                      <input id="dodajDugme" type="submit" name="potvriNoviPr" value="Dodaj" style="float:right;"/>
                      
                    </form>

            </div>
            <?php endif; ?>
            
            <div id="izmeniProizvod">
            <?php
                    if(isset($_GET['id'])):
                      $proID=$_GET['id'];
                      $dohvatiPr="SELECT * FROM proizvodi WHERE proizvodID=$proID";
                      $rezultat123=$konekcija->query($dohvatiPr);
                      $podaci=$rezultat123->fetchAll();
                      foreach($podaci as $vrednost):
                        ?>
            <h3>Izmeni proizvod</h3>
                    <form action="#" method="POST" enctype="multipart/form-data">
                    
                      <input type="hidden" id="proSkriveno" data-id="<?= $vrednost->proizvodID ?>"/>
                      Naziv:
                      <input id="proNaziv" type='text' name='nazivProizvoda' value='<?= $vrednost->naziv ?>'/>
                      Opis:
                      <input id="proOpis" type='text' name='opisProizvoda' value='<?= $vrednost->opis ?>'/>
                      Cena:
                      <input id="proCena" type='number' name='cenaProizvoda' min='0' value='<?= $vrednost->cena ?>'/></br>
                      Kolicina:
                      <input id="proKol" type='number' name='kolicinaProizvoda min=0' value='<?= $vrednost->kolicina ?>'/>
                      
                     
                      Kategorija:
                      <select id="izmeniKat" name="izmeniKat">
                        <option value="0">Izaberite</option>
                      <?php require_once("models/proizvodi/ispisKategorija.php"); 
                        $kategorijeUP=ispisKat();
                        foreach($kategorijeUP as $katUP):
                      ?>
                        <option value="<?= $katUP->kategorijaID ?>"><?= $katUP->naziv ?></option>
                        <?php endforeach; ?>
                      </select>
                      Jedinica mere:
                      <select id="izmeniMeru" name="izmeniMeru">
                          <option value="0">Izaberite</option>
                          <option value="kg.">kg.</option>
                          <option value="kom.">kom.</option>
                      </select></br>
                      <input type="submit" class="izmeniPr" name="izmeniPr" value="Izmeni" style="float:right;" data-id="<?= $vrednost->proizvodID ?>"/>
                      <?php endforeach; endif; ?>
                    </form>
                          
                        




            </div>
                       


              <ul class="aa-product-catg">
                  
                <?php 
                    
                  require_once "models/proizvodi/ispisProizvoda.php";
                  $proizvodi=ispisProizvoda();
                 
                  
                  foreach($proizvodi as $proizvod):
                ?>
                  
                <!-- start single product item -->
                <li>
                
                <form action="models/proizvodi/korpa.php" method="POST">
                <figure>
                  <a class="aa-product-img" href="#"><img style="height:300px; width:260px;" src="<?= $proizvod->slika ?>" alt="<?= $proizvod->ime ?>"></a>
                  <?php 
                   if($proizvod->kolicina<1){
                     echo "";
                   }
                   else
                   {
                    echo "<input style='width:100%; border:0px; opacity:0.9' type='submit' class='aa-add-card-btn' value='Dodaj u korpu' name='korpaPotvrdi'/>";
                   }
                   ?>
                   <input type='hidden' value='<?= $proizvod->proizvodID ?>' name='skrivenoId'>
                   <input type='hidden' value='<?= $proizvod->ime ?>' name='skrivenoNaziv'>
                   <input type='hidden' value='<?= $proizvod->cena ?>' name='skrivenoCena'>
                   <input type='hidden' value='<?= $proizvod->opis ?>' name='skrivenoOpis'>
                   <input type='hidden' value='<?= $proizvod->merna_jedinica ?>' name='skrivenoJM'>
                  
                  <figcaption>
                    <h4 class="aa-product-title"><a href="#" value=''><?= $proizvod->ime ?></a></h4>
                    <span class="aa-product-price"><?= $proizvod->cena ?>din.</span>
                    <p class="aa-product-descrip"><?= $proizvod->opis ?></p>
                    <?php
                  if(isset($_SESSION['korisnik'])&&$_SESSION['korisnik']->ulogaID==1):
                 ?> 

                 <br/><a class='izbrisiProizvod' style='color:red; font-style:italic;' href='models/proizvodi/izbrisiProizvod.php?id=<?= $proizvod->proizvodID ?>'>Ukloni </a>/
                    <a class='izmeniProizvod' style='color:red; font-style:italic;' href='index.php?stranica=proizvodi&&id=<?= $proizvod->proizvodID  ?>&&strana=1#izmeniProizvod' data-id="<?= $proizvod->proizvodID ?>">Izmeni</a>
                  <?php endif; ?>
                  </figcaption>
                </figure>                         
  
                <!-- product badge -->
                <?php
                  if($proizvod->kolicina<1){
                    echo "<span class='aa-badge aa-sold-out' href='#'>Rasprodato!</span>";
                  } 
                  else
                  {
                    echo "<span class='aa-badge aa-sale' href='#'> $proizvod->merna_jedinica </span>";
                  }
                 ?>
                 
                 </form>
                 
              </li>
                <?php endforeach; ?>

                
                  
                 
                                   
              </ul>
              <!-- quick view modal -->  
             
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <?php
                                //  include "models/proizvodi/brziPregled.php";
                                //   $pro=brziPregled();
                        ?> 
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                          <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                              
                                  <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                          <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                             
                            </div>
                          </div>
                        </div>
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">$34.99</span>
                              <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                              <a href="#">S</a>
                              <a href="#">M</a>
                              <a href="#">L</a>
                              <a href="#">XL</a>
                            </div>
                            <div class="aa-prod-quantity">
                              <form action="">
                                <select name="" id="">
                                  <option value="0" selected="1">1</option>
                                  <option value="1">2</option>
                                  <option value="2">3</option>
                                  <option value="3">4</option>
                                  <option value="4">5</option>
                                  <option value="5">6</option>
                                </select>
                              </form>
                              <p class="aa-prod-category">
                                Category: <a href="#">Polo T-Shirt</a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                              <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!-- / quick view modal -->   
            </div>
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  
                  <?php 
                    $upitStranicenje="SELECT COUNT(*) FROM proizvodi";
                    $rezultat=$konekcija->query($upitStranicenje)->fetchColumn();
    
                    $brojPoStr=10;
                    
                    $brojStranica=ceil((int)$rezultat / $brojPoStr);
                    
    
                    $strana=(int)$_GET['strana'];
                    $offset=$strana*10-$brojPoStr;
    
                    $upitStr="SELECT * FROM proizvodi LIMIT $brojPoStr OFFSET $offset";

                    
                    $rezultatStr=$konekcija->query($upitStr);
                    

                    if($rezultatStr){
                        $podaciStr=$rezultatStr->fetchAll();

                    }
                  ?>


                  <?php 

					
					          $brojac=1;
					          for($i=0; $i<$brojStranica; $i++):
			
				            ?>
                  <li><a href="index.php?stranica=proizvodi&&strana=<?= $brojac ?>"><?= $brojac++ ?></a></li>
                
                
                   <?php endfor; ?>
                  
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->

            <div style="margin-top:5%;" class="aa-sidebar-widget">
              <h3>Pretraga <span class="fa fa-search"></span></h3>
              <form action="" class="aa-search-form">
               
                  <input style="width:100%; height:40px; margin-bottom:5%; padding:1%;" type="text" name="" id="pretraga" placeholder="Pretraga proizvoda">
            
                </form>
            </div>


            <div class="aa-sidebar-widget">
              <h3>Kategorija</h3>
              <ul class="aa-catg-nav">
                <?php 
                  require_once("models/proizvodi/ispisKategorija.php"); 
                  $kategorije=ispisKat();
                  foreach($kategorije as $kat):
                ?>
                <li><a href="index.php?stranica=proizvodi&id=<?= $kat->kategorijaID ?>&strana=1"><?= $kat->naziv ?></a></li>
                  <?php endforeach; ?>
                <li><a style="color:red;" href="index.php?stranica=proizvodi&id=0&strana=1">Poništi</a>
              </ul>
            </div>
            
            
           
           
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->
