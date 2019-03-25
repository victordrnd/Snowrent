<?php
/**
* Classe qui permet de modifier et d'obtenir des informations depuis la table Chalet
*/
class Chalet
{

  private $bdd;
  public $root = '/partages/priv/btsdcg/info1/v.durand/public_html';
  public function __construct(){
    $this->bdd = new Crud;
  }


  /**
  * Permet l'ajout d'un chalet à la base de donnée
  * @param string $nom
  * @param int $surface
  * @param string $adresse
  * @param int $zip
  * @param string $ville
  * @param string $catcode
  * @param string $proprioid
  * @return void
  */

  public function proposer($nom, $surface, $adresse, $zip, $ville, $catcode, $proprioid){
    $id = substr(md5(uniqid(rand(), true)),0, 30);
    $nom = tostring(htmlspecialchars($nom));
    $adresse = tostring(htmlspecialchars($adresse));
    $ville = tostring(htmlspecialchars($ville));
    $proprioid = tostring($proprioid);
    $catcode = tostring($catcode);
    $surface = intval($surface);
    $zip = intval($zip);
    $_SESSION['last_chalet_id'] = $id;
    echo $id;
    $rows = "CHALETId, CHALETNom, CHALETSurface, CHALETAdresse, CHALETZip, CHALETVille, CHALETCatCode, CHALETProprioId";
    $values = array(tostring($id),$nom,$surface,$adresse,$zip,$ville,$catcode,$proprioid);
    $req = $this->bdd->insert('tchalet', $values, $rows);

    header('location:details/');
  }

  /**
  * Permet d'obtenir des informations sur un chalet en particulier
  * @param string $chaletid
  * @return array $chaletinfo
  */
  public function details($chaletid){
    $chaletinfo = $this->bdd->select('tchalet', '*' ,'CHALETId='.tostring($chaletid));
    //var_dump($chaletinfo);
    if(isset($chaletinfo[0])){
      $categorieinfo = $this->bdd->select('tcategorie', '*', 'CATCode='.tostring($chaletinfo[0]['CHALETCatCode']).'');

      $chaletinfo[] = $categorieinfo[0];
      $proprioinfo = $this->getProprietaire($chaletinfo[0]['CHALETId']);
      $chaletinfo[] = $proprioinfo[0];
    }

    return $chaletinfo;
  }


  /**
  * Permet d'obtenir des informations sur un chalet en particulier et vérifie s'il appartient bien à un propriétaire
  * @param string $chaletid
  * @param string $proprioid
  * @return array $chaletinfo
  */
  public function secureDetails($chaletid, $proprioid){
    $chaletinfo = $this->bdd->select('tchalet', '*' ,'CHALETId='.tostring($chaletid).' AND CHALETProprioId='.tostring($proprioid));
    //var_dump($chaletinfo);
    if(isset($chaletinfo[0])){
      $categorieinfo = $this->bdd->select('tcategorie', '*', 'CATCode='.tostring($chaletinfo[0]['CHALETCatCode']).'');
      $chaletinfo[] = $categorieinfo[0];
      $proprioinfo = $this->getProprietaire($chaletinfo[0]['CHALETId']);
      $chaletinfo[] = $proprioinfo[0];
    }
    return $chaletinfo;
  }


  /**
  * Retourne tout les chalets d'un propriétaire
  * @param string $proprioid
  * @return array $list
  */
  public function meschalets($proprioid){
    $list = $this->bdd->select('tchalet', 'CHALETNom, CHALETId, CHALETDescription', 'CHALETProprioId='.tostring($proprioid));
    return $list;
  }

  /**
  * Retourne tout les chalets de la table
  * @return array $list
  */
  public function selectAll(){
    $list = $this->bdd->select('tchalet', '*');
    return $list;
  }


  /**
  * Retourne les informations sur le propriétaire d'un chalet
  * @return array $proprioinfo
  */
  public function getProprietaire($chaletid){
    $proprio = $this->bdd->select('tclient, tchalet', 'CLIId, CLINom, CLIPrenom', 'CHALETId='.tostring($chaletid));
    return $proprio;
  }


  /**
  * Change l'image d'un chalet spécifique
  * @param resource $image
  * @param string $id
  * @return void
  */
  public function upload($image, $id){
    $target = $this->root.'/upload/chalets/';
    $extensionAvailable = array('jpg', 'gif', 'png', 'jpeg');
    $taille =filesize($image['tmp_name']);
    $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
    if(!in_array(strtolower($extension),$extensionAvailable)){
      return "Le fichier n'est pas une image";
    }
    if($taille > 4000000){
      return 'Le fichier est trop large, recommencez l&apos;opération';
    }
    $binaire = imagecreatefromstring(file_get_contents($image['tmp_name']));
    imagepng($binaire, $target.$id.'.png',0);
    //return $id.'.png';
  }

  /**
  * Change la description d'un chalet
  * @param string $chaletid
  * @param string $description
  * @return void
  */
  public function setDescription($chaletid, $description){
    $this->bdd->update('tchalet', array('CHALETDescription' => $description), 'CHALETId ='.tostring($chaletid));
  }

  /**
  * Edite un chalet en particulier
  * @param string $chaletid
  * @param string $chaletnom
  * @param string $chaletville
  * @param string $chaletadresse
  * @param string $chaletzip
  * @param string $chaletdescription
  * @return void
  */
  public function edit($chaletid, $chaletnom, $chaletville, $chaletadresse, $chaletzip, $chaletdescription){
    return $this->bdd->update('tchalet', array('CHALETNom' => htmlspecialchars($chaletnom), 'CHALETVille' => htmlspecialchars($chaletville), 'CHALETAdresse' => htmlspecialchars($chaletadresse), 'CHALETZip' =>htmlspecialchars($chaletzip), 'CHALETDescription' => htmlspecialchars($chaletdescription)), 'CHALETid='.tostring($chaletid));
  }

  /**
  * Supprime un chalet
  * @param string $chaletid
  * @return boolean $response
  */
  public function delete($chaletid){
    $this->bdd->delete('treserver', 'RESChaletId='.tostring($chaletid));
    $response = $this->bdd->delete('tchalet', 'CHALETId='.tostring($chaletid));
    return $response;
    //echo $response;
  }

}



?>
