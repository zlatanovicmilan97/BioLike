
  <!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            <?php 
              include "models/meni/slajder.php";
              $slajderi=slajder();
              foreach($slajderi as $slajder):
             ?>
            <li>
              <div class="seq-model">
                <img data-seq src="<?= $slajder->slajder_slika ?>" alt="<?= $slajder->slajder_opis ?>" />
              </div>
              <div class="seq-title">
                              
                <h2 data-seq><?= $slajder->slajder_naziv ?></h2>                
                <p data-seq style="background-color:black; opacity:0.7;"><?= $slajder->slajder_opis ?></p>
                <a data-seq href="index.php?stranica=proizvodi&&id=<?= $slajder->kategorijaID ?>&&strana=1" class="aa-shop-now-btn aa-secondary-btn">POGLEDAJ</a>
              </div>
            </li>
            
              <?php endforeach; ?> 
              <!-- <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>                  -->
          </ul>
          
          
        </div>
        
        <!-- slider navigation btn -->
        
               <!-- single slide item
            <li>
              <div class="seq-model">
                <img data-seq src="assets/img/slider/2.jpg" alt="Wristwatch slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 40% Off</span>                
                <h2 data-seq>Wristwatch Collection</h2>                
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
             single slide item -->
            <!-- <li>
              <div class="seq-model">
                <img data-seq src="assets/img/slider/3.jpg" alt="Women Jeans slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 75% Off</span>                
                <h2 data-seq>Jeans Collection</h2>                
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li> -->
            <!-- single slide item -->           
            <!-- <li>
              <div class="seq-model">
                <img data-seq src="assets/img/slider/4.jpg" alt="Shoes slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 75% Off</span>                
                <h2 data-seq>Exclusive Shoes</h2>                
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li> -->
            <!-- single slide item -->  
             <!-- <li>
              <div class="seq-model">
                <img data-seq src="assets/img/slider/5.jpg" alt="Male Female slide img" />
              </div>
              <div class="seq-title">
                <span data-seq>Save Up to 50% Off</span>                
                <h2 data-seq>Best Collection</h2>                
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div> --> 



      </div>
    </div>
  </section>
  <!-- / slider -->
  <!-- Start Promo section -->

  
            