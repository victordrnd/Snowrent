<?php

$url = $_SERVER['REQUEST_URI'];
//controle sur la page connexion, redirection vers panel si connecté
if(strpos($url, 'connexion')){
  if(isset($_SESSION['id'])){
    header('location:../client/');
  }
}

//controle sur la page inscription, redirection vers panel si connecté
if($url == '/inscription/'){
  if(isset($_SESSION['id']) && $_SESSION['CLIVerif'] == 1){
    header('location:../client/');
  }
  else{
    header('location:compleprofil');
  }
}


//controle sur tout le panel client interdit si pas connecté
if(strpos($url, 'client')){
  if(empty($_SESSION['id'])){
    header('location:'.ROOTDIR);
  }
  if($_SESSION['CLIVerif'] == 0){
    header('location:../inscription/completeprofil');
  }
}


?>
