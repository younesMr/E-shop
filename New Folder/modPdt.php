<?php
include "./func.php";

if(isset($_POST['nom']) && isset($_POST['des']) && isset($_POST['cat']) && isset($_POST['id'])&& isset($_POST['prix']))
  {  $nom = $_POST['nom'];
    $des = $_POST['des'];
    $cat = $_POST['cat'];
    $id = $_POST['id']; 
    $prix = $_POST['prix'];

    modPdt($nom, $des, $cat, $id,$prix);header("location:dashPdt.php");
  } 
?>
