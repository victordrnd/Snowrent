<?php
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
include $root.'/includes/header.php';
$chalet = new Chalet;

if(isset($_POST['submit'])){
  $chalet->edit($_GET['token'], $_POST['CHALETNom'], $_POST['CHALETVille'], $_POST['CHALETAdresse'], $_POST['CHALETZip'], $_POST['CHALETDescription']);
}

$chaletinfo = $chalet->secureDetails(htmlspecialchars($_GET['token']), $_SESSION['id']);

if(!isset($chaletinfo[0])){
  $error = '<div class="alert alert-danger mt-5" role="alert">
  Il semblerait qu&apos;aucune location n&apos;ai été renseignée, merci de réessayer
</div>';
}

?>
<body>
  <div class="container">
      <a href="../" class="text-dark"><i data-feather="chevron-left"></i></a>
    <h1 class="text-center">Edition de votre location</h1>
    <div class="row">
      <div class="col-12 mb-5">
        <div class="card shadow-small border-0 p-4">

          <img src="<?=ROOTDIR?>upload/chalets/<?=$chaletinfo[0]['CHALETId']?>.png" class="col-6 rounded mx-auto d-block" onerror="this.src='<?=ROOTDIR?>assets/404.png'">

          <?
          if(isset($error)){
            echo $error;
            exit;
          }
          ?>
          <form method="post" action="">


            <label class="h6 mt-2">Nom de la location : </label>
            <input type="text" name="CHALETNom" class="form-control" value="<?=$chaletinfo[0]['CHALETNom']?>" onerror="this.value=null"/>
            <label class="h6 mt-3">Adresse : </label>
            <div class="mx-5">
              <label>Station :</label>
              <input type="text" name="CHALETVille" class="form-control" value="<?=$chaletinfo[0]['CHALETVille']?>"/>
              <label>Adresse :</label>
              <textarea class="form-control" name="CHALETAdresse"><?=$chaletinfo[0]['CHALETAdresse']?></textarea>
              <label>Code postal :</label>
              <input type="number" class="form-control" name="CHALETZip" value="<?=$chaletinfo[0]['CHALETZip']?>"/>
            </div>
            <label class="h6 mt-3">Description</label>
            <textarea class="form-control" rows="6" name="CHALETDescription"><?=$chaletinfo[0]['CHALETDescription']?></textarea>
            <button type="submit" name="submit" class="btn btn-primary mt-4 mx-auto d-block px-3">Modifier la location <i data-feather="send"></i></button>
          </form>
        </div>


      </div>
    </div>
  </div>
</div>


</body>
<?php
include $root.'/includes/footer/footer.php';
?>
