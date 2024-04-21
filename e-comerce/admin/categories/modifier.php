<?php
session_start();
//1_recuperation des donnes de la formulaire
$nom=$_POST['nom'];
$description=$_POST['description'];

$date_modification = date('Y-m-d');
//2_ la chaine de connexion
include "../../inc/function.php";
$conn = connect();
//3- creation de la requette
$requette ="UPDATE   categories SET nom='$nom', description='$description',date_modification='$date_modification' ";


//4_ executioon
$resultat= $conn->query($requette);
if ($resultat){
    header('location:liste.php');
}






?>