<?php
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
include $root.'/includes/header.php';

$chalet = new Chalet;
$chaletinfo  = $chalet->details($_SESSION['last_chalet_id']);
$response = null;
$display ='d-none';
if(isset($_FILES['image'])){
  $response = $chalet->upload($_FILES['image'], $_SESSION['last_chalet_id']);
  $chalet->setDescription($_SESSION['last_chalet_id'], htmlspecialchars($_POST['description']));
  $success = '<div class="alert alert-primary" role="alert">
  <i data-feather="check"></i> Féliciation votre location est désormais en ligne
</div>';
  if(!empty($response)){
    $display = 'd-block';
  }
}

?>
<body>
  <div class="container">
    <h1 class="text-center">Détails supplémentaires</h1>
    <?php
    if(isset($success)){
      echo $success;
    }
     ?>
    <div class="row mt-5">
      <div class="col-12 col-md mr-md-5">
        <div class="card shadow-small border-0 p-3">

          <div class="alert alert-warning <?= $display?>" role="alert">
            <?= $response?>
          </div>

          <h3 class="text-center">Image principale</h3>
          <form class="mt-5" method="POST" id="form" action="" enctype="multipart/form-data">
            <div class="form-group form-row">

              <label class="input-group-btn  col">
                <span class="btn btn-primary">
                  Sélectionner&hellip; <input type="file" class="d-none" id="main" onchange="preview(this);" name="image">
                </span>
              </label>
              <input type="text" class="form-control col-8 text-input" readonly>

            </div>
            <small class="form-text text-muted text-center">Limitation: 4 Mo par fichier </small>


            <img src="" class="h-25" id="preview"/>
            <small class="form-text text-muted text-center">Une location avec photographie est 7 fois plus visitée </small>
          </div>
        </div>
        <div class="col-12 col-md-6 mt-5 mt-md-0">
          <div class="card shadow-small border-0 p-3">
            <h3 class="text-center"><?php echo $chaletinfo[0]['CHALETNom']?></h3>
            <div class="mt-3">
              <h6>Surface : <?= $chaletinfo[0]['CHALETSurface']?> m²</h6>
              <h6>Catégorie : <?=$chaletinfo[1]['CATLibelle']?></h6>
              <h5 class="mt-4">Adresse:</h5>
              <h6>Station : <?= $chaletinfo[0]['CHALETVille']?></h6>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-12">
          <h3 class="text-center">Ajoutez une courte description</h3>
          <textarea class="form-control mt-2" name="description"></textarea>
          <button type="submit" name="submit" class="btn btn-secondary mx-auto mt-3 d-block">Confirmer la mise en location</button>
        </form>
      </div>
    </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>

$(function() {

  $(document).on('change', ':file', function() {
    var input = $(this),
    numFiles = input.get(0).files ? input.get(0).files.length : 1,
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });
  $(document).ready( function() {
    $(':file').on('fileselect', function(event, numFiles, label) {

      var input = $(this).parents('.input-group').find(':text'),
      log = numFiles > 1 ? numFiles + ' fichiers sélectionnés' : label;

      if( input.length ) {
        input.val(log);
      } else {
        $('.text-input').val(log);
      }

    });
  });
});

function preview(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#preview').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}
</script>
<?php
include $root.'/includes/footer/footer.php';
?>
