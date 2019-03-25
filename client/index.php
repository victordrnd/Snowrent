<?php
include '../includes/header.php';
?>
<div class="row mx-md-5 mx-2" >
  <div class="jumbotron jumbotron-fluid col  p-5">
    <div class="container">
      <h1 class="display-4">Réserver un séjour</h1>
      <p class="lead">Dans cette section vous pourrez réserver vos séjours sur mesure à la montagne.</p>
      <a class="btn btn-primary float-right mr-5" href="reserver">Réserver mon séjour</a>
    </div>
  </div>
</div>

<div class="row  mx-md-5 mx-2">

  <div class="jumbotron jumbotron-fluid col-12 col-md mt-md-5 mr-md-4">
    <div class="container">
      <i class="fas fa-concierge-bell fa-6x m-auto d-block text-dark" style="text-align:center"></i>
      <h2 class="display-4 text-center" style="font-size:2.5rem">Mes réservations</h2>
      <p class="lead text-center">Cette section contient l'ensemble de vos réservations.</p>
      <a class="btn btn-primary mx-md-5 d-block mt-4 text-white" href="reservations/">Afficher mes réservations</a>
    </div>
  </div>

  <div class="jumbotron jumbotron-fluid col-12 col-md mt-md-5 ml-md-4">
    <div class="container">
      <i class="fas fa-file-invoice fa-6x m-auto d-block text-dark" style="text-align:center"></i>
      <h1 class="display-4 text-center" style="font-size:2.5rem">Mes factures</h1>
      <p class="lead text-center">Cet espace regroupe l'ensemble de vos factures.</p>
      <a href="factures/" class="btn btn-primary mx-md-5  d-block mt-4">Afficher mes factures</a>
    </div>
  </div>

</div>
<div class="row mt-5 mx-md-5 mx-2">
  <div class="jumbotron jumbotron-fluid col-12 col-md p-5 mr-md-4">
    <div class="container">
      <i class="fas fa-calendar-day fa-4x float-right text-primary"></i>
      <h1 class="display-4">Louer mon chalet</h1>
      <p class="lead">Donnez la possibilité aux autres clients de réserver votre chalet en échange d'une rémunération.</p>
      <a class="btn btn-primary float-right mr-5 " href="proposer/">Proposer mon chalet</a>
    </div>
  </div>
  <div class="jumbotron jumbotron-fluid col-md col-12 p-5 ml-md-4">
    <div class="container">
      <i class="fas fa-bookmark fa-4x float-right text-primary "></i>
      <h1 class="display-4">Mes locations</h1>
      <p class="lead">Afficher le planning de location de vos chalets</p>
      <a class="btn btn-primary float-right mr-5 " href="chalets">Gérer mes locations</a>
    </div>
  </div>
</div>
<?php
include $root.'/includes/footer/footer.php';
 ?>


<style>
.jumbotron{
  border-radius:6px;
}
</style>
