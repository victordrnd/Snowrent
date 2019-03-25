<?php
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
include $root.'/includes/header.php';

$chalet = new Chalet;
$chaletinfo = $chalet->details($_SESSION['reservationChaletId']);
//var_dump($chaletinfo);
$imgurl = ROOTDIR.'upload/chalets/'.$chaletinfo[0]['CHALETId'].'.png';

$reservation = new Reservation;
$reservationinfo = $reservation->resdetails($_SESSION['reservationChaletId'], $_SESSION['id']);
//var_dump($reservationinfo);
?>
<body>
  <h1 class="text-center">Félicitation votre réservation a bien été prise en compte !</h1>
  <div class="container">


    <div class="card border-0 shadow-small mt-4">
      <div class="row">
        <div class="col-12 col-md-5">
          <img src="<?=$imgurl?>" onerror="this.src='<?=ROOTDIR?>assets/404.png'" class="col-12 col-md img-card-top">
        </div>
        <div class="col">
          <h5 class="text-center mt-4"><?=$chaletinfo[0]['CHALETNom'].' - '.$chaletinfo[0]['CHALETVille']?> </h5>
          <table class="table mt-3">

            <tbody>
              <tr>
                <th scope="row">Date d'arrivée</th>
                <td><?=$reservationinfo[0]['RESDateArrive']?></td>
              </tr>
              <tr>
                <th scope="row">Date de départ</th>
                <td><?=$reservationinfo[0]['RESDateDepart']?></td>
              </tr>
              <tr>
                <th scope="row">Tarif</th>
                <td class="text-primary"><?= $reservationinfo[0]['RESPrix']?> €</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>

    </div>
    <a href="<?=ROOTDIR?>client/" class="mt-4 text-center w-100 mx-auto d-block text-dark"><i data-feather="chevron-left"></i> Retour à l'espace client</a>

  </div>
</body>

<?php
include $root.'/includes/footer/footer.php';
?>
