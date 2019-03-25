<?php
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
include $root.'/includes/header.php';

$utilisateur = new Utilisateur;
$utilisateurinfo = $utilisateur->details($_SESSION['id']);
if(isset($_POST['submit'])){
  $utilisateur->verify($_SESSION['id']);
  $_SESSION['CLIVerif'] = 1;
  $utilisateur->setDateNaissance($utilisateurinfo[0]['CLIId'], $_POST['CLIDateNaissance']);
  $utilisateur->setZip($utilisateurinfo[0]['CLIId'], $_POST['CLIZip']);
  $utilisateur->setAdresse($utilisateurinfo[0]['CLIId'], htmlspecialchars($_POST['CLIAdresse']));
  echo '<meta http-equiv="refresh" content="0;URL='.ROOTDIR.'client/">';
  exit;
}
 ?>
<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col-12">
        <div class="card shadow-small border-0 p-md-2 p-4 mt-3">
          <h1 class="text-center">Compléter mon profil</h1>
          <form method="post" action="">
            <div class="px-md-5 mx-md-5 mt-3">
              <h5>Renseignements personnels</h5>
              <label>Nom  :</label>
              <input type="text" value="<?=$utilisateurinfo[0]['CLINom']?>" class="form-control" disabled />
              <label>Prénom :</label>
              <input type="text" value="<?=$utilisateurinfo[0]['CLIPrenom']?>" class="form-control" disabled/>
              <label>Date de naissance :</label>
              <input type="date" required name="CLIDateNaissance" class="form-control" />
              <h5 class="mt-5">Votre adresse </h5>
              <label>Code postal :</label>
              <input type="number" required name="CLIZip" class="form-control" />
              <label>Adresse :</label>
              <textarea name="CLIAdresse" required class="form-control"></textarea>
              <button name="submit" type="submit" class="btn btn-primary mx-auto d-block mt-4">Vérifier mon compte <i data-feather="send"></i></button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

</body>

<?php
include $root.'/includes/footer/footer.php';
 ?>
