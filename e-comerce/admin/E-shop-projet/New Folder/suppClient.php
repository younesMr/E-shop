<?php
 include "./func.php";
 if(isset($_REQUEST["id"])){
    suppClient($_REQUEST["id"]);
    header("location:dashClient.php");
    exit;
 }
else echo "error";
?>