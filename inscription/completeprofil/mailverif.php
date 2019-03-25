<?php
session_start();
include '../../api/autoload.php';
$clientid = $_GET['token'];
$utilisateur = new Utilisateur;
$utilisateur->verify($clientid);
$_SESSION['CLIVerif'] = 1;
header('location:index.php');
 ?>
