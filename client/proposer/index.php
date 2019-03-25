<?php
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
include_once($root.'/api/autoload.php');
if(isset($_POST['submit'])){
  session_start();
  $chalet = new Chalet;
  $chalet->proposer($_POST['nom'],$_POST['surface'], $_POST['adresse'], $_POST['zip'], $_POST['ville'], $_POST['catcode'], $_SESSION['id']);
}
include '../../includes/header.php';




?>
<body>

<h1 class="text-center mt-3 mb-3 mb-md-5">Proposer mon chalet à la location</h1>
<div class="container ">
  <a href="../" class="text-dark"><i data-feather="chevron-left"></i></a>
  <div class="row ">
    <div class="col-md-6 col-12 p-3 ">
      <form method="post" action="">
        <h2>informations générales</h2>
        <div class="form-group">
          <label >Nom du chalet</label>
          <input required name="nom" type="text" class="form-control" placeholder="Nom du chalet">
          <small class="form-text text-muted">Il est conseillé d'utiliser un nom unique afin d'éviter les confusions</small>
        </div>
        <div class="form-group">
          <label >Catégorie</label>
          <select name="catcode" class="form-control">
            <optgroup label="-- CHALETS --">
              <option value="CH1">Chalet Luxe et Spa </option>
              <option value="CH2">Chalet Luxe </option>
              <option value="CH3">Chalet Charme </option>
              <option value="CH4">Chalet Charme et Spa </option>
              <optgroup label="">
                <optgroup label="-- APPARTEMENTS --">
                  <option value="AP1">Appartement Luxe et Spa </option>
                  <option value="AP2">Appartement Luxe </option>
                  <option value="AP3">Appartement Charme </option>
                  <option value="AP4">Appartement Charme et Spa </option>
                </select>
              </div>
              <div class="form-group">
                <label>Surface de la location</label>
                <div class="input-group mb-2">

                  <input required type="number" name="surface" class="form-control"  placeholder="23" min="0">
                  <div class="input-group-prepend">
                    <div class="input-group-text">m²</div>
                  </div>
                </div>
              </div>

            </div>

            <div class="col-md-6 col-12 shadow-small p-3 mt-5 mt-md-0 mb-5">

              <h2>Adresse du chalet</h2>
              <div class="form-group">
                <label >Nom de la station</label>
                <input name="ville" required type="text" class="form-control" placeholder="Station de ski">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Code Postal</label>
                <input name="zip" required type="number" class="form-control" placeholder="58000">
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Adresse complète</label>
                <textarea name="adresse" class="form-control"></textarea>
              </div>

              <button type="submit" name="submit" class="btn btn-primary float-right mt-2">Etape suivante <i class="fas fa-arrow-right"></i></button>
            </form>
          </div>
        </div>
      </div>
      </body>

      <?php
      include '../../includes/footer/footer.php';
      ?>
