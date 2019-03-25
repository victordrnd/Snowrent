<?php
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
include $root.'/includes/header.php';
$chaletid = $_GET['id'];
$_SESSION['reservationChaletId'] = $chaletid;
$chalet = new Chalet;
$chaletinfo = $chalet->details($chaletid);

?>
<title>SnowRent - <?= $chaletinfo[0]['CHALETNom']?></title>
<body>

  <h1 class="text-center"><?=$chaletinfo[0]['CHALETNom'].' - '.$chaletinfo[0]['CHALETVille']?></h1>


  <div class="row mt-5 mb-5">
    <div class="col-12 col-md-6 col-sm-12">
      <img src="<?=ROOTDIR?>upload/chalets/<?=$chaletinfo[0]['CHALETId']?>.png" onerror="this.src='<?=ROOTDIR?>assets/404.png'" class="col-12 col-md"/>
    </div>

    <div class="col-12 col-md-6 col-sm-12 shadow-small rounded p-3">

      <h2 class="text-center"><?=$chaletinfo[0]['CHALETNom']?></h2>
      <h3 class="text-center text-primary"><?=$chaletinfo[1]['CATPrix']?>€ <span class="text-muted small">/ nuit</span></h3>
      <p class="mt-4 p-3"><?=$chaletinfo[0]['CHALETDescription']?></p>
    </div>
  </div>

  <div class="row mt-5 ml-md-5 mr-md-5 ml-3 mr-3 ">
    <div class="col-12 col-md-6">
      <h3>Détails de la location</h3>
      <label class="mt-3">Surface : <?= $chaletinfo[0]['CHALETSurface']?> m²</label></br>
      <label class="mt-3">Categorie : <?= $chaletinfo[1]['CATLibelle']?></label></br>
      <label class="mt-3">Description : <?=$chaletinfo[1]['CATDescription']?></label>
    </div>
    <div class="col-12 col-md-6">
      <h3>Adresse de la location</h3>
      <label class="mt-3">Station de ski : <?= $chaletinfo[0]['CHALETVille'] ?></label></br>

      <label>Code Postal : <?= $chaletinfo[0]['CHALETZip'] ?></label></br>
      <label>Adresse : <?= $chaletinfo[0]['CHALETAdresse'] ?></label></br>
    </div>
  </div>
  <div class="row justify-content-center mt-3">

    <div class=" col-10 ">
      <a href="../informations/" class="btn btn-secondary text-white  ml-auto mr-auto d-block ml-md mr-md mr-5 ml-5 p-2 ">Continuer la réservation <i class="fas fa-arrow-right"></i></a>
    </div>
  </div>



</body>
<?php
include $root.'/includes/footer/footer.php';
?>
