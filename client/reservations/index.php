<?php
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
include $root.'/includes/header.php';
$reservation = new Reservation;
$reservationlist = $reservation->getReservationByUser($_SESSION['id'], true);
$defaulturl = "'".ROOTDIR."assets/404.png'";

//print("<pre>".print_r($reservationlist,true)."</pre>");
?>
<body>
  <div class="container">
    <a href="../" class="text-dark"><i data-feather="chevron-left"></i></a>
    <h1 class="text-center">Vos réservations </h1>
    <?php
    if (empty($reservationlist[0])){
      echo '<div class="alert alert-secondary mt-5" role="alert">
      Il semblerait qu&apos;aucune réservation n&apos;ai été effectuée depuis votre compte, il n&apos;y a rien à afficher pour le moment.
      </div>';
    }
    ?>
    <div class="row ">
      <?php
      foreach ($reservationlist as $chalet ) {
        echo '
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 mt-4">
        <div class="card shadow-small  border-0 " >
        <img class="card-img-top" src="'.ROOTDIR.'upload/chalets/'.$chalet['CHALETInfo'][0]['CHALETId'].'.png" onerror="this.src='.$defaulturl.'" height=230px;/>
        <div class="card-body">
        <h3 class="card-title">'.$chalet['CHALETInfo'][0]['CHALETNom'].'</h3>
        <h6 class="mt-4">Votre réservation : <span class="badge badge-primary">'.$chalet['CHALETInfo'][1]['CATLibelle'].'</span></h6>
        <ul class="mx-2">
        <li>Arrivée : '.$chalet['RESDateArrive'].'</li>
        <li>Départ : '.$chalet['RESDateDepart'].'</li>
        </ul>
        <h6 class="mt-4">Adresse de la location : </h6>
        <ul class="list-unstyled mx-3">
        <li>Station : '.$chalet['CHALETInfo'][0]['CHALETVille'].' - '.$chalet['CHALETInfo'][0]['CHALETZip'].'</li>
        <li></li>
        <li>'.$chalet['CHALETInfo'][0]['CHALETAdresse'].'</li>
        </ul>
        <a class="btn btn-secondary text-white float-right" href="details/?id='.$chalet['RESId'].'">Afficher les détails</a>
        </div>
        </div>
        </div>';
      }
      ?>
    </div>
  </div>
</body>
<?php
include $root.'/includes/footer/footer.php';
?>
