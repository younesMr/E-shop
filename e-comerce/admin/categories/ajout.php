<?php
session_start();
//1_recuperation des donnes de la formulaire
$nom=$_POST['nom'];
$description=$_POST['description'];
$createur=$_SESSION['id'];
$date_creation = date('Y-m-d');
//2_ la chaine de connexion
include "../../inc/function.php";
$conn = connect();
//3- creation de la requette
$requette ="INSERT INTO categories(nom, description , createur, date_creation) VALUES ('$nom' , '$description','$createur','$date_creation')";


//4_ executioon
$resultat= $conn->query($requette);
if ($resultat){
    header('location:liste.php');
}






?>