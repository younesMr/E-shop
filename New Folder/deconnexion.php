<?php
session_start();
session_unset();
session_destroy();
header('location:connexion.php');  // redirection vers la page index




?>