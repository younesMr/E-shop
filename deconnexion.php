<?php
session_start();
session_unset();
session_destroy();
header('location:index.php');  // redirection vers la page index




?>