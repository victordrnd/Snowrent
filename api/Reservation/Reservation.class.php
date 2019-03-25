<?php

class Reservation
{
  private $bdd;
  public function __construct(){
    $this->bdd = new Crud;
  }

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

  public function resdetails($chaletid, $clientid){
    $resdetail = $this->bdd->select('treserver', '*', 'RESCliId='.tostring($clientid).' AND RESChaletId='.tostring($chaletid));
    return $resdetail;
  }

  public function getResertionByChalet($chaletid){
    $list = $this->bdd->select('treserver', '*', 'RESChaletId='.tostring($chaletid));
    return $list;
  }
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
