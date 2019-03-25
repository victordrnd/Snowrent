<?php
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
include $root.'/includes/header.php';


$chaletid = $_GET['id'];
$chalet = new Chalet;
$chaletinfo = $chalet->details($chaletid);
if(empty($chaletinfo[0]['CHALETId'])){
  echo '<div class="alert alert-danger text-center w-50 mx-auto " role="alert">
  Le chalet demandé n&apos;existe pas ou plus.
  </div>';
  echo '<a href="../" class="text-center w-100 mx-auto d-block ">Retour à la liste des chalets</a>';
  include $root.'/includes/footer/footer.php';
  exit;
}

$reservation = new Reservation;
$reservationlist = $reservation->getResertionByChalet($chaletid);
?>
<title>SnowRent - <?= $chaletinfo[0]['CHALETNom']?></title>
<link href="../../src/vendor/needim/noty/lib/noty.css" rel="stylesheet">
<script src="../../src/vendor/needim/noty/lib/noty.js" type="text/javascript"></script>
<body>

  <h1 class="text-center">Détails - Location</h1>
  <div class="container">
    <a href="../" class="text-dark"><i data-feather="chevron-left"></i></a>
  </div>
  <div class="d-inline float-right ">
    <a class="btn shadow-small mr-4" href="../edit/?token=<?=$chaletinfo[0]['CHALETId']?>"><i class="fas fa-pencil-alt"></i> Editer</a>
    <a class="btn mr-4 btn-danger text-white" data-toggle="modal" data-target="#exampleModal"><i class="far fa-trash-alt"></i> Supprimer</a>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Supprimer le chalet</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Souhaitez vous vraiment supprimer le chalet de la location ?
          Les réservations en cours seront supprimées et remboursées.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary" onclick="remove('<?=$chaletid?>')">Confirmer la suppression</button>
        </div>
      </div>
    </div>
  </div>



  <div class="row mt-5 mb-5">
    <div class="col-12 col-md-6 col-sm-12">
      <img src="<?=ROOTDIR?>upload/chalets/<?=$chaletinfo[0]['CHALETId']?>.png" onerror="this.src='<?=ROOTDIR?>assets/404.png'" class="col-12 col-md"/>
    </div>

    <div class="col-12 col-md-6 col-sm-12 shadow-small rounded p-3">

      <h2 class="text-center"><?=$chaletinfo[0]['CHALETNom']?></h2>
      <p class="mt-4 p-3"><?=$chaletinfo[0]['CHALETDescription']?></p>
      <h4>Réservation en cours :</h4>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Date d'arrivée</th>
            <th scope="col">Date de départ</th>
            <th scope="col">Prix</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($reservationlist as $reservationinfo) {
            echo '<tr>
            <th scope="row">1</th>
            <td>'.$reservationinfo['RESDateArrive'].'</td>
            <td>'.$reservationinfo['RESDateDepart'].'</td>
            <td>'.$reservationinfo['RESPrix'].'</td>
            </tr>';
          }
          ?>
        </tbody>
      </table>
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


</body>
<?php
include $root.'/includes/footer/footer.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function remove(chaletid){


  $.ajax({
    type: 'POST',
    url: 'process/delete.php',
    data: {
      'chaletid': chaletid
    },
    success: function(data){
      if(data.status == 'success') {
        new Noty({
          type : 'warning',
          text: 'Notifcation - Le chalet a correctement été supprimé',
          layout: 'topRight',
          theme: 'sunset',
          timeout: 5000,
          progressBar: true,

        }).show();
      }
      else {
        console.log(data.status);
      }
    }
  });
}
</script>
