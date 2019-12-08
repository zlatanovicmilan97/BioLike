<?php

session_start();
if(isset($_GET['rb'])){
    $rb=$_GET['rb'];
    unset($_SESSION['korpa'][$rb]);
    if(count($_SESSION['korpa'])<1){
        unset($_SESSION['korpa']);
    }
    header("Location:../../index.php?stranica=korpa");
    
}