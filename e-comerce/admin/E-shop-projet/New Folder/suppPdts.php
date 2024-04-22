<?php
 include "./func.php";
 if(isset($_REQUEST["id"])){
    suppPdts($_REQUEST["id"]);
    header("location:dashPdt.php");
    exit;
 }
else echo "error";
?>