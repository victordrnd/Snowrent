<?php
/**
* Classe qui permet de modifier et d'obtenir des informations depuis la table Reservation
*/
class Reservation
{
  private $bdd;

  public function __construct(){
    $this->bdd = new Crud;
  }



  /**
  * Permet l'ajout d'une réservation
  * @param string $chaletid
  * @param string $clientid
  * @param string $datearrive
  * @param string $datedepart
  * @param int $resprix
  * @return string
  */
  public function reserver($chaletid, $clientid, $datearrive, $datedepart, $resprix){
    $resid = md5(uniqid(rand(), true));
    $_SESSION['RESId'] = $resid;
    $row = "RESId, RESCliId, RESChaletId, RESDateArrive, RESDateDepart, RESPrix";
    //echo $resprix;
    $response = $this->bdd->insert('treserver', array(tostring($resid),tostring($clientid), tostring($chaletid), "('".$datearrive."')", "('".$datedepart."')", $resprix), $row);
    if (isset($response[0])){
      return 'Une erreur s&apos;est produite, réessayé dans quelques instants';
    }
    else{
      return 'La réservation a bien été pris en compte';
    }
  }


  /**
  * Permet d'obtenir des informations sur une réservation
  * @param string $chaletid
  * @param string $clientid
  * @return array
  */
  public function resdetails($chaletid, $clientid){
    $resdetail = $this->bdd->select('treserver', '*', 'RESCliId='.tostring($clientid).' AND RESChaletId='.tostring($chaletid));
    return $resdetail;
  }



  /**
  * Permet d'obtenir la liste des réservations d'un chalet
  * @param string $chaletid
  * @return array
  */
  public function getResertionByChalet($chaletid){
    $list = $this->bdd->select('treserver', '*', 'RESChaletId='.tostring($chaletid));
    return $list;
  }


  /**
  * Permet d'obtenir les détails d'une réservation
  * @param string $resid
  * @param boolean $withdetails
  * @return array
  */
  public function getReservationById($resid, $withdetails=null){
    $list = $this->bdd->select('treserver', '*', 'RESId='.tostring($resid));
    $chalet = new Chalet;
    //si demande de plus de détails on boucle pour chaque chalet les infos
    if($withdetails == true){
      foreach ($list as $index=>$chaletinfo) {
        //echo $chaletinfo['RESChaletId'];
        $details = $chalet->details($chaletinfo['RESChaletId']);
        //var_dump($details);
        $list[$index]['CHALETInfo'] = $details;
      }
    }
    return $list;
  }


  /**
  * Permet d'obtenir la liste des réservations d'un client
  * @param string $clientid
  * @param boolean $withdetails
  * @return array
  */
  public function getReservationByUser($clientid, $withdetails=null){
    $list = $this->bdd->select('treserver', '*', 'RESCliId='.tostring($clientid));
    //var_dump($list);

    $chalet = new Chalet;
    //si demande de plus de détails on boucle pour chaque chalet les infos
    if($withdetails == true){
      foreach ($list as $index=>$chaletinfo) {
        //echo $chaletinfo['RESChaletId'];
        $details = $chalet->details($chaletinfo['RESChaletId']);
        //var_dump($details);
        $list[$index]['CHALETInfo'] = $details;
      }
    }
    return $list;
  }

}


?>
