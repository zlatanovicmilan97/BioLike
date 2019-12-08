<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>BioLike <?php
      if(isset($_GET['stranica'])){
        $stranicaNaslov=$_GET['stranica'];
        if($stranicaNaslov=='index'){
          echo '';
        }
        else if($stranicaNaslov=='korpa'){
          echo '| Korpa';
        }
        else if($stranicaNaslov=='profil'){
          echo '| Prijava';
        }
        else if($stranicaNaslov=='proizvodi'){
          echo '| Proizvodi';
        }
        else{
          echo '';
        }
        
      }
     ?></title>
    
    <!-- Font awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="assets/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/bridge-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="assets/css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="assets/css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  </head>
  <body> 
   <!-- wpf loader Two -->
    <!-- <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Učitavanje</span>
      </div>
    </div>  -->
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start language -->
                
                <!-- / language -->

                <!-- start currency -->
                
                <!-- / currency -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>+381 64 1234 567</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                <?php
                    
                    if(isset($_SESSION['korisnik'])&&$_SESSION['korisnik']->ulogaID==1){
                      echo "<li><a href='index.php?stranica=korisnici'>Korisnici</a></li>
                      <li><a href='data/log.txt' target='_blank'>log.txt</a></li>
                      <li><a href='index.php?stranica=profil'>".$_SESSION['korisnik']->korIme."</a></li>
                      ";
                    }
                    elseif(isset($_SESSION['korisnik'])){
                      echo "<li><a href='index.php?stranica=profil'>".$_SESSION['korisnik']->korIme."</a></li>";
                      }
                    else{
                      echo "";
                    }
                ?>
                  <li class="hidden-xs"><a href="index.php?stranica=korpa">Korpa</a></li>
                  <?php
                  if(isset($_SESSION['korisnik'])){
                      echo "<li><a href='models/korisnici/odjavaObrada.php' name='odjava' id='odjava'>Odjavi se</a></li>";
                  }
                  else{
                      echo "<li><a href='' data-toggle='modal' data-target='#login-modal'>Prijavite se</a></li>";
                  }
                 

                    ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.php?stranica=index">
                  <p>bio<strong>like</strong> <span>zdrava hrana</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">KORPA</span>
                  <span class="aa-cart-notify"><?php
                  if(isset($_SESSION['korpa'])){
                    $brukorpi=count($_SESSION['korpa']);
                    echo $brukorpi;}
                    else{
                      echo "0";
                    }
                   ?></span>
                </a>
                <div class="aa-cartbox-summary">
                  <ul>
                  <?php
                    if(isset($_SESSION['korpa'])):
                    foreach($_SESSION['korpa'] as $pod): 
                    ?>
                    <li>
                    
                      <div class="aa-cartbox-info">
                        <h4><a href="#"><?= $pod['naziv']; ?></a></h4>
                        <p><?= $pod['cena']; ?>din.</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>
                    <?php endforeach; ?>
                    <?php else: echo ""; 
                    endif;
                    ?>                
                    
                  </ul>

                  <?php 
                  if(isset($_SESSION['korpa'])){
                   echo "<a class='aa-cartbox-checkout aa-primary-btn' href='index.php?stranica=korpa'>Pogledaj</a>";
                  }
                  else
                  {
                    echo "Korpa je prazna";
                  }
                  ?>
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
          

            <ul  class="nav navbar-nav">
                <?php 
                  include "models/meni/linkoviIspis.php";
                  $li=linkoviIspis();
                  foreach($li as $link):
                ?>
              <li><a href="<?= $link->link_putanja ?>"><?= $link->link_naziv ?></a></li>
                  <?php endforeach; ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->