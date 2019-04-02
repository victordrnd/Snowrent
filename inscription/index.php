<?php
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
include $root.'/includes/header.php';

if(isset($_POST['submit'])){
  $user = new Utilisateur;
  
  $response = $user->inscription($_POST['mail'], $_POST['password1'],$_POST['password2'], $_POST['nom'], $_POST['prenom']);
  $display = 'd-block';
}else{
  $response = null;
  $display = 'd-none';
}



if(isset($_SESSION['id'])){
  header('location:../client/');
  exit;
}
?>
<body>
  <div class="alert alert-danger container <?= $display?>" role="alert">
    <i class="fas fa-exclamation-triangle"></i> <?=$response?>
  </div>
  <div class="card d-block m-auto my-auto col-sm-11  mt-md-5 mb-sm-5 col-md-6 justify-content-center border-0 shadow-small" >
    <div class="card-body">
      <h5 class="card-title">Inscription</h5>
      <svg style="display:block;margin-left:auto;margin-right:auto;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width:"70px" height="70px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
          <g><path d="M500,10C231.5,10,10,231.5,10,500s221.5,490,490,490s490-221.5,490-490S768.5,10,500,10z M795.3,835.6c0-134.2-100.7-248.4-221.5-281.9c73.8-26.8,120.8-100.7,120.8-181.2c0-107.4-87.3-194.7-194.7-194.7s-194.7,87.3-194.7,194.7c0,80.5,53.7,154.4,120.8,181.2c-127.5,33.6-221.5,147.7-221.5,281.9C110.7,755.1,50.3,634.2,50.3,500C50.3,251.6,251.6,50.3,500,50.3c248.4,0,449.7,201.4,449.7,449.7C949.7,634.2,889.3,755.1,795.3,835.6z" fill="#007bff"/></g>
        </svg>
      <form action="" method="POST">
        <div class="form-group">
          <label >Nom</label>
          <input type="text" class="form-control" required name="nom" placeholder="Votre nom">
        </div>
        <div class="form-group">
          <label >Prénom</label>
          <input type="text" class="form-control" required name="prenom" placeholder="Votre prénom">
        </div>
        <div class="form-group">
          <label >Email</label>
          <input type="email" class="form-control"  required name="mail" placeholder="Votre email">
        </div>
        <div class="form-group">
          <label >Mot de passe</label>
          <input type="password" class="form-control" name="password1" placeholder="Mot de passe">
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password2" placeholder="Répétez votre mot de passe">
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" >
          <label class="form-check-label" >Se souvenir de moi</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary width-1">Se connecter</button>
      </form>
    </div>
  </div>
</body>

<?php
  include $root.'/includes/footer/footer.php';
 ?>
<style>
.width-1{
  width:100%;
}
.btn-primary{
  background-color:
}

</style>
