<?php
 include "./func.php";

/* if(isset($_REQUEST['nom'])&& isset($_REQUEST['description'])&& isset($_REQUEST['createur'] )){
 $nom=$_REQUEST['nom'];
 $des=$_REQUEST['description'];
 $cr=$_REQUEST['createur'];
 ajoutCat($nom,$des,$cr);
}  */



if(isset($_POST['nom']) && isset($_POST['des']) && isset($_POST['cat']) && isset($_POST['prix']))
  {  $nom = $_POST['nom'];
    $des = $_POST['des'];
    $cat = $_POST['cat'];
    $prix = $_POST['prix'];
    if(isset($_POST["image"])) $desPath=$_POST["image"];
    ajoutPdt($nom, $des, $cat,$prix,$cr,$desPath);header("location:dashPdt.php");
  }
  else  ajoutPdt($nom, $des, $cat,$prix,$cr);
  header("location:dashPdt.php");  
     
//function ajoutPdt($nom, $des, $prix,$imagePath="uploads/avatar1.png") {
 
 //ajoutPdt("fgffg", "fgggggggg", 123456,"creatooooor");





 
?>
 