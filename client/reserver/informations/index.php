<?php
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
include $root.'/includes/header.php';

$chaletid = $_SESSION['reservationChaletId'];
$chalet = new Chalet;
$chaletinfo = $chalet->details($chaletid);
$display= 'd-none';

if(isset($_GET['errorcode'])){
  $display = 'd-block';
  $errormessage= 'Une erreur est survenue, le paiement ne sera pas effectué.';
}
?>
<body>
  <div class="container">
    <a href="../" class="text-dark"><i data-feather="chevron-left"></i></a>
    <div class="row">

      <div class="col-12">
        <div class="card shadow-small border-0 p-3">
          <div class="alert alert-danger <?=$display?>" role="alert">
            <?=$errormessage?>
          </div>
          <h2 class="text-center">Ma réservation</h2>

          <div class="row mt-3">
            <div class="col-12 col-md-4">
              <img class="w-50 mx-auto d-block" src="<?=ROOTDIR?>upload/chalets/<?=$chaletid?>.png" onerror="this.src='<?=ROOTDIR?>assets/404.png'">
            </div>
            <div class="col-12 col-md-4 text-center">
              <h4 class="lead mt-3"><?=$chaletinfo[0]['CHALETNom']?> à <?=$chaletinfo[0]['CHALETVille']?> </h4>
              <h6 ><?=$chaletinfo[1]['CATPrix']?>€ / nuit et par personne</h6>
              <p><?=$chaletinfo[1]['CATLibelle']?></p>
            </div>
          </div>
          <form method="post" action="../paiement/">


            <div class="row mt-5 p-2">
              <div class="col-12 col-md-6">
                <label >Date de d'arrivé :</label>
                <input type="date" class="form-control border-0 shadow-small" required min="<?=date('Y-m-d')?>" name="datearr" id="datearr"/>
              </div>
              <div class="col-12 col-md-6 mt-3 mt-md-0">
                <label >Date de départ :</label>
                <input type="date" class="form-control border-0 shadow-small" required disabled  placeholder="" name="datedep" id="datedep"/>
              </div>

              <!--informations-->


              <div class="col-12 col-md-6 mt-5">
                <label>Nombre d'adultes:</label>
                <input type="number" min="1" max="9" value="1" class="form-control border-0 shadow-small" required name="adultes" placeholder=""/>
              </div>
              <div class="col-12 col-md-6 mt-5 ">
                <label>Nombre d'enfants :<small class="text-muted"> (-14 ans)</small></label>
                <input type="number" min="0" max="9" class="form-control border-0 shadow-small"  value="0" required placeholder="" name="enfants"/>
              </div>

            </div>
            <button type="submit" class="btn btn-primary mx-auto d-block mt-5 border-0">Procéder au paiement</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</body>
<?php
include $root.'/includes/footer/footer.php';
?>
<script>
var datearr = document.getElementById('datearr');
var datedep = document.getElementById('datedep');

datearr.addEventListener('change', function(){
  var minvalue = datearr.value;
  minvalue = formatDate(minvalue);

  datedep.setAttribute('min', minvalue);
  datedep.value = minvalue;
  datedep.disabled = false;

})


function formatDate(date) {
  var d = new Date(date),
  month = '' + (d.getMonth() + 1),
  day = '' + (d.getDate() + 1),
  year = d.getFullYear();

  if (month.length < 2) month = '0' + month;
  if (day.length < 2) day = '0' + day;

  return [year, month, day].join('-');
}
</script>
