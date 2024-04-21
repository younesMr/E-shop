<?php
 include "./func.php";
   if(isset($_GET["id"])){
      $id=$_GET["id"];
   suppCat($id);header("location:dashCat.php");exit;
   }

else header("location:dashCat.php"); 

?> 