<?php
$idcategorie = $_GET['idc'];
include "../../inc/function.php";
$conn = connect();
$requette="DELETE FROM categories WHERE id='$idcategorie'";
$resultat =$conn -> query($requette);
if($resultat){
    //echo"categorie supreimer";
 header('location:liste.php?delete=ok');


}


?>