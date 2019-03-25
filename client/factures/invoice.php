<?php
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
include $root.'/includes/header.php';
$user = new Utilisateur;
$userinfo = $user->details($_SESSION['id']);
$userinfo = $userinfo[0];
$reservation = new Reservation;
$reservationinfo = $reservation->getReservationById($_GET['id']);
$chalet = new Chalet;
$chaletinfo = $chalet->details($reservationinfo[0]['RESChaletId']);
$nbrvacancier = $reservationinfo[0]['RESPrix']/ $chaletinfo[1]['CATPrix'];

$date1 = new DateTime($reservationinfo[0]['RESDateArrive']);
$date2 = new DateTime($reservationinfo[0]['RESDateDepart']);

$nbrdejour = $date1->diff($date2);
$nbrdejour =  $nbrdejour->format('%a');
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<div class="container mb-5">
  <h1 class="text-center">Facture SnowRent</h1>
  <div class="card mt-5">
    <div class="card-header">
      Facture
      <strong><?=date('Y-m-d')?></strong>
      <span class="float-right"> <strong>Status:</strong> <span class="badge badge-primary">Validé</span></span>

    </div>
    <div class="card-body">
      <div class="row mb-4">
        <div class="col-sm-6">
          <div>
            <strong>SnowRent</strong>
          </div>
          <div>58 rue Pierre Dupont</div>
          <div>69004 - Lyon</div>
          <div>Email: facture@snowrent.fr</div>
          <div>Phone: +33 4 56 78 90 11</div>
        </div>

        <div class="col-sm-6">
          <div>
            <strong><?=$userinfo['CLINom'].' '.$userinfo['CLIPrenom']?></strong>
          </div>
          <div><?=$userinfo['CLIAdresse'].' - '.$userinfo['CLIZip']?></div>
          <div>Email: <?=$userinfo['CLIMail']?></div>
        </div>



      </div>

      <div class="table-responsive-sm">
        <table class="table table-striped">
          <thead>
            <tr>
              <th class="center"><i data-feather="hash"></i></th>
              <th>Réservation</th>
              <th>Description</th>

              <th class="right">Dates</th>
              <th class="center">Vacanciers</th>
              <th class="right">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="center">1</td>
              <td class="left strong"><b><?=$chaletinfo[0]['CHALETNom']?></b></td>
              <td class="left">
                <b><?=$chaletinfo[1]['CATLibelle']?></b>
              </br>
                <?=$chaletinfo[0]['CHALETVille'].' - '.$chaletinfo[0]['CHALETZip']?></br> <?=$chaletinfo[0]['CHALETAdresse']?></td>

              <td class="right"><?=$reservationinfo[0]['RESDateArrive']?> au <?=$reservationinfo[0]['RESDateDepart']?></td>
              <td class="center"><?=$nbrvacancier /$nbrdejour?></td>
              <td class="right"><?=$reservationinfo[0]['RESPrix']?> €</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="row">
        <div class="col-lg-4 col-sm-5">

        </div>

        <div class="col-lg-4 col-sm-5 ml-auto">
          <table class="table table-clear">
            <tbody>
              <tr>
                <td class="left">
                  <strong>Total</strong>
                </td>
                <td class="right">
                  <strong><?=$reservationinfo[0]['RESPrix']?> €</strong>
                </td>
              </tr>
            </tbody>
          </table>

        </div>

      </div>

    </div>
  </div>
</div>
<script>
window.print();
</script>
<?php
include $root.'/includes/footer/footer.php';
 ?>
