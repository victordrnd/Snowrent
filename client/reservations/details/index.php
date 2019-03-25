<?php
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
include $root.'/includes/header.php';
$reservation = new Reservation;
$reservationlist = $reservation->getReservationById(htmlspecialchars($_GET['id']), true);
//print("<pre>".print_r($reservationlist,true)."</pre>");
$date1 = new DateTime($reservationlist[0]['RESDateArrive']);
$date2 = new DateTime($reservationlist[0]['RESDateDepart']);

$nbrdejour = $date1->diff($date2);
$nbrdejour =  $nbrdejour->format('%a');

?>
<body>
  <div class="container">
    <a href="../" class="text-dark"><i data-feather="chevron-left"></i></a>
    <h1 class="text-center">Détails de votre réservation</h1>
    <div class="row mt-5">
      <div class="col-12 col-md-4">
        <img src="<?=ROOTDIR?>upload/chalets/<?=$reservationlist[0]['RESChaletId']?>.png" onerror="this.src='<?=ROOTDIR?>assets/404.png'" class="col-12 " />
        <div class="card border-0 shadow-small mx-3 mt-4">
          <h5 class="mx-3">Tarif</h5>
          <ul class="list-unstyled">
            <li class="list-group-item border-0"><b><?=$reservationlist[0]['CHALETInfo'][1]['CATPrix']?>€</b> / nuit et par personne</li>
            <li class="list-group-item border-0">Nombre de vacanciers : <?=($reservationlist[0]['RESPrix']/$reservationlist[0]['CHALETInfo'][1]['CATPrix'])/$nbrdejour?></li>
            <li class="list-group-item border-0 text-bold"><strong>Total :</strong><span class="float-right text-primary"><b><?=$reservationlist[0]['RESPrix']?>€</b></span></li>
          </ul>
        </div>
      </div>

      <div class="col-12 col-md-8 mt-5 mt-md-0">
        <div class="card shadow-small border-0 mx-3 mx-md-0">
          <h2 class="text-center mt-3">Votre réservation</h2>
          <div class="row vdivide">
            <div class="col-6">
              <h5 class="mx-3 mt-3">Adresse de la location</h5>
              <ul class="list-unstyled mx-5">
                <li class="mt-3">Station de ski : <?=$reservationlist[0]['CHALETInfo'][0]['CHALETVille']?></li>
                <li class="mt-3">Code postal : <?=$reservationlist[0]['CHALETInfo'][0]['CHALETZip']?></li>
                <li class="mt-3">Adresse :</br> <?=$reservationlist[0]['CHALETInfo'][0]['CHALETAdresse']?></li>
              </ul>
            </div>
            <div class="col-6">
              <h5 class="mx-3 mt-3 text-right">Informations générales</h5>
              <ul class="list-unstyled mx-5 text-right">
                <li class="mt-3">Date d'arrivé : <?=$reservationlist[0]['RESDateArrive']?></li>
                <li class="mt-3">Date de départ : <?=$reservationlist[0]['RESDateDepart']?></li>

              </ul>
            </div>

          </div>


          <div class="row vdivide mt-5 mb-4">
            <div class="col-6">


              <h5 class="mx-3 mt-3">Détails supplémentaires</h5>
              <ul class="list-unstyled mx-5">
                <li class="mt-3">Catégorie : <?=$reservationlist[0]['CHALETInfo'][1]['CATLibelle']?></li>
                <li class="mt-3">Description : </br> <?=$reservationlist[0]['CHALETInfo'][1]['CATDescription']?></li>
              </ul>
            </div>
            <div class="col-6">


              <h5 class="mx-3 mt-3 text-right">Contact</h5>
              <ul class="list-unstyled mx-5 text-right">
                <li class="mt-3">Nom : <?=$reservationlist[0]['CHALETInfo'][2]['CLINom']?></li>
                <li class="mt-3">Prenom : <?=$reservationlist[0]['CHALETInfo'][2]['CLIPrenom']?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
</body>
<style>
.row.vdivide [class*='col-']:not(:last-child):after {
  background: #e0e0e0;
  width: 1px;
  content: "";
  display:block;
  position: absolute;
  top:0;
  bottom: 0;
  right: 0;
  min-height: 70px;
}
</style>
<?php
include $root.'/includes/footer/footer.php';
?>
