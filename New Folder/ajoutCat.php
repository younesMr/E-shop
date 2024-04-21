<?php
 include "./func.php";

if(isset($_POST['nom'])&& isset($_POST['description'])){
 $nom=$_POST['nom'];
 $des=$_POST['description'];

 ajoutCat($nom,$des);
header("location:dashCat.php");
}

//ajoutCat("attttttttttttttttttttttttttt","d","dff");



?>
