<?php
session_start();
$root = '/partages/priv/btsdcg/info1/v.durand/public_html';
include $root.'/api/autoload.php';
if(isset($_POST['submit'])){
  $reservation = new Reservation;
  $error = $reservation->reserver($_SESSION['reservationChaletId'], $_SESSION['id'], $_SESSION['RESDateArr'], $_SESSION['RESDateDep'], $_SESSION['RESTarif']);
  header('location:success.php');
}
else{
  header('location:../informations/?errorcode=1');
}

?>
