<!-- 
 include "./func.php";

if(isset($_REQUEST['nom'])&& isset($_REQUEST['description'])&& isset($_REQUEST['createur'] )){
 $nom=$_REQUEST['nom'];
 $des=$_REQUEST['description'];
 $cr=$_REQUEST['createur'];
 modCat($nom,$des,$cr);
}
?> -->
<?php
include "./func.php";

if(isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['createur']) && isset($_POST['id']))
  {  $nom = $_POST['nom'];
    $des = $_POST['description'];
    $cr = $_POST['createur'];
    $id = $_POST['id']; // إضافة استلام المعلمة $id

    modCat($nom, $des, $cr, $id);header("location:dashCat.php");
  } 
?>
