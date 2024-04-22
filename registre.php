<?php 
session_start();
if(isset($_SESSION['nom'])){
    header('location:profile.php');  
}
include "inc/function.php";
$showregistretionalert = 0 ;
$categories = getallcategories() ;

if (!empty($_POST)){  //click sur le button sauvgarder
         if (Addvisiteur ($_POST)){
          $showregistretionalert = 1 ;
         }


}




?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.7/sweetalert2.min.css">
  </head>
  <body>

  <?php
include   "inc/header.php" ;
?>
    
      <div class="row col-12 p-5">
        <h1 class="text-center">registre</h1>
        <form action="registre.php" method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputnom"  class="form-label">nom</label>
              <input type="text" name="nom" class="form-control" id="exampleInputnom">
            </div>
            <div class="mb-3">
                <label for="exampleInputPrenom" class="form-label">Prenom</label>
                <input type="text" name="prenom" class="form-control" id="exampleInputPrenom">
              </div>
              <div class="mb-3">
                <label for="exampleInputnumtel" class="form-label">telephone</label>
                <input type="tel" name="telephone" class="form-control" id="exampleInputnumtel">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="mp" class="form-control" id="exampleInputPassword1">
              </div>
           
            <button type="submit" class="btn btn-primary">sauvgarder</button>
          </form>

        
          <?php

           include "inc/footer.php";

          ?>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.7/sweetalert2.all.min.js"></script>
  <?php
  if($showregistretionalert == 1){
    print "
    <script>
    Swal.fire({
    title: 'success',
    text: 'creation de compte avec success',
    icon: 'success',
    confirmButtonText: 'Cool',
    timer : 2000
  })
    </script>
    ";
  }
  ?>

</html>