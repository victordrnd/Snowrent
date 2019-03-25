<?php
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
include $root.'/includes/header.php';

$facture = new Reservation;
$facturelist = $facture->getReservationByUser($_SESSION['id']);
?>
<title>SnowRent - Mes factures</title>
<body>
  <div class="mx-md-5 mx-2 mt-5">
    <a href="../" class="text-dark"><i data-feather="chevron-left"></i></a>
    <?php
    if (empty($facturelist[0])){
      echo '<div class="alert alert-secondary mt-5" role="alert"><i data-feather="info"></i>
      Il semblerait qu&apos;aucune réservation n&apos;ai été effectué depuis votre compte, il n&apos;y a rien à afficher pour le moment.
      </div>';
    }
    ?>
    <h1 class="mt-5">Vos factures</h1>

    <table class="table table-striped mt-3 ">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Date d'arrivé</th>
          <th scope="col">Date de départ</th>
          <th scope="col">Prix</th>
          <th scope="col">Détails</th>
        </tr>
      </thead>
      <tbody>

        <?php
        foreach ($facturelist as $factureinfo ) {
          echo '<tr>
          <th scope="row">1</th>
          <td>'.$factureinfo['RESDateArrive'].'</td>
          <td>'.$factureinfo['RESDateDepart'].'</td>
          <td>'.$factureinfo['RESPrix'].'€</td>
          <td><a class="text-dark" href="invoice.php/?id='.$factureinfo['RESId'].'"><i data-feather="printer"></i></a></td>
          </tr>';
        }
        ?>
      </tbody>
    </table>
  </div>

</body>

<?php
include $root.'/includes/footer/footer.php';
?>
