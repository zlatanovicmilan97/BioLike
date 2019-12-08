<?php 
session_start();
require_once("config/connection.php");
include("pages/fixed/header.php");
if(isset($_GET['stranica'])){
	$stranica = $_GET['stranica'];
	if($stranica=='index'){
		include "pages/index.php";
	 }  else if ($stranica == 'omiljeno') {
		include "pages/wishlist.php";
	 }  else if ($stranica == 'korpa') {
	 	include "pages/cart.php";
     }
        else if ($stranica == 'profil') {
        include "pages/profil.php";
	 }
	 else if ($stranica == 'registracija') {
        include "pages/registracija.php";
     }
     else if ($stranica == 'pogresnaPrijava') {
        include "pages/pogresnaPrijava.php";
	 }
	 else if ($stranica == 'proizvodi') {
        include "pages/product.php";
	 }
	 else if ($stranica == 'korisnici') {
        include "pages/korisnici.php";
	 }
	 else if ($stranica == 'greska') {
        include "pages/404.php";
	 }
	 else if ($stranica == 'kontakt') {
        include "pages/kontakt.php";
	 }	
	 else if ($stranica == 'autor') {
        include "pages/autor.php";
     }			 
	
	else {
		include "pages/index.php";
	}
}
else
{
    include "pages/index.php";
}
include("pages/fixed/footer.php");

 