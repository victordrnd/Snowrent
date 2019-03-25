<?php
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
include $root.'/includes/header.php';
$chaletinfo = new Chalet;
$chaletlist = $chaletinfo->meschalets($_SESSION['id']);
$defaulturl = "'".ROOTDIR."assets/404.png'";
?>
<title>SnowRent - Mes chalets</title>
<body>
  <div class="container">
    <a href="../" class="text-dark"><i data-feather="chevron-left"></i></a>
    <h1 class="text-center">Mes chalets en location</h1>
    <?php
    if (empty($chaletlist[0])){
      echo '<div class="alert alert-secondary mt-5" role="alert">
      Il semblerait qu&apos;aucun de vos appartements ou chalets ne soit en location, proposez en un <b><a href="../proposer/">depuis cette page</a></b>
      </div>';
    }
    ?>
    <div class="row">
      <?php
      foreach ($chaletlist as $chalet ) {
        echo '<div class="col-12 col-sm-6 col-md-4 col-lg-4 mt-4">
        <div class="card shadow-small border-0" >
        <img class="card-img-top" src="'.ROOTDIR.'upload/chalets/'.$chalet['CHALETId'].'.png" onerror="this.src='.$defaulturl.'"/>
        <div class="card-body">
        <h3 class="card-title">'.$chalet['CHALETNom'].'</h3>
        <p class="card-text">'.$chalet['CHALETDescription'].'</p>
        <a class="btn btn-secondary text-white float-right" href="details?id='.$chalet['CHALETId'].'">Afficher les détails</a>
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
