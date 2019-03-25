<?php

if(isset($_SESSION['id'])){
  $right = '<div class="ml-auto mr-4 d-none d-md-block">
  <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="inbox"></i>
  '.$_SESSION['nom'].' '.$_SESSION['prenom'].'
  </a>

  <div class="dropdown-menu border-0 shadow-small" aria-labelledby="dropdownMenuLink" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
  <a class="dropdown-item" href="'.ROOTDIR.'client"><i data-feather="bookmark"></i> Espace Membre</a>
  <a class="dropdown-item" href="'.ROOTDIR.'client/reservations"><i data-feather="bell"></i> Mes réservations</a>
  <a class="dropdown-item" href="'.ROOTDIR.'client/process/logout.php"><i data-feather="power"></i> Déconnexion</a>
  </div>
  </div>
  </div>';


}
else{
  $right = '<li class="nav-item col-4 ml-auto bg-primary rounded  d-none d-md-block" style="max-width:160px;text-align:center;">
  <a class="nav-link active color-white " href="'.ROOTDIR.'inscription/">INSCRIPTION</a>
  </li>

  <a class="nav-link shadow-sm ml-3 bg-white rounded  d-none d-md-block" href="'.ROOTDIR.'connexion/">CONNEXION</a>';
}

if(isset($_SESSION['id']) && (!isset($_SESSION['CLIVerif']) || $_SESSION['CLIVerif'] == 0) ){
  $right = '<div class="ml-auto mr-4 d-none d-md-block">

  <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="inbox"></i>
  '.$_SESSION['nom'].' '.$_SESSION['prenom'].' <span class="badge badge-pill badge-warning text-white"><i class="fas fa-exclamation"></i></span>
  </a>

  <div class="dropdown-menu border-0 shadow-small" aria-labelledby="dropdownMenuLink" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
  <span class="small p-3 text-center text-warning">Pensez à vérifier votre mail</span>
  <a class="dropdown-item" href="'.ROOTDIR.'client"><i data-feather="bookmark"></i> Espace Membre</a>
  <a class="dropdown-item" href="'.ROOTDIR.'client/reservations"><i data-feather="bell"></i> Mes réservations</a>
  <a class="dropdown-item" href="'.ROOTDIR.'client/process/logout.php"><i data-feather="power"></i> Déconnexion</a>
  </div>
  </div>
  </div>';
}

?>

<ul class="nav shadow-sm p-3 mb-5 " style="min-height:70px;">
  <li class="nav-item d-none d-md-block">
    <a class="nav-link active" href="#"><img src="<?=ROOTDIR?>assets/logo.svg" width="30"/></a>
    </li
    <li class="nav-item">
      <a class="nav-link color-grey  d-none d-md-block" href="<?=ROOTDIR?>">ACCUEIL</a>
    </li>
    <li class="nav-item">
      <a class="nav-link color-grey d-none d-md-block" href="<?=ROOTDIR?>chalets/">CHALETS</a>
    </li>
    <li class="snowrent" ><a class="text-dark no-underline" href="<?=ROOTDIR?>">SNOWRENT</a></li>
    <?php echo $right ?>
    <!--Hamburger-->
    <li class="float-right d-block d-sm-none"><a data-toggle="collapse" class="text-dark" href="#navbarmobile"><i data-feather="menu" class=" mt-2 ml-2"></i></a></li>
    <div class="collapse bg-white mt-5  d-sm-none" id="navbarmobile">
      <ul class="nav d-block">
        <li class="nav-item "><a class="nav-link color-grey" href="<?=ROOTDIR?>">ACCUEIL</a></li>

        <li class="nav-item"><a class="nav-link color-grey" href="<?=ROOTDIR?>chalets/">CHALETS</a></li>

        <li class="nav-item "><a class="nav-link  shadow-sm rounded" href="<?=ROOTDIR?>connexion">CONNEXION</a> </li>
        <li class="nav-item mt-3"><a class="nav-link  bg-primary rounded  color-white active" href="<?=ROOTDIR?>inscription/">INSCRIPTION</a></li>
      </ul>
    </div>
  </ul>
  <style>
  .color-grey{
    color:#737373 !important;
  }

  .color-grey:hover{
    color:#007bff !important;
  }

  .color-white{
    color:white !important;
  }
  ::-webkit-scrollbar {
    display: none;
  }
  .shadow-small{
    box-shadow: 0 5px 15px rgba(0,0,0,.08);
  }
  .snowrent{
    position:absolute;
    left:50%;
    transform:translateX(-50%);
    font-family: 'Major Mono Display', monospace;
    font-weight:bolder;
    font-size:22px;
  }

  .no-underline:hover{
    text-decoration: none;
  }
  img[src=""] {
    display: none;
  }
</style>
