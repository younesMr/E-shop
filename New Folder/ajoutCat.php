<?php
 include "./func.php";

if(isset($_POST['nom'])&& isset($_POST['description'])&& isset($_POST['createur'] )){
 $nom=$_POST['nom'];
 $des=$_POST['description'];
 $cr=$_POST['createur'];
 ajoutCat($nom,$des,$cr);
header("location:dashCat.php");
}

//ajoutCat("attttttttttttttttttttttttttt","d","dff");



?>
