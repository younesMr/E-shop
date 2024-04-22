<?php
session_start();
include "../../inc/function.php";

// Change the state of the panier if the submit button is clicked
if (isset($_POST['btnSubmit'])) {
    changerEtatPaniers($_POST);
}

// Get all commandes and paniers
$commandes = getAllCommandes();
$paniers = getAllPaniers();

// Filter paniers by state if the search button is clicked
if (isset($_POST['btnSearch'])) {
    $etat = $_POST['etat'];
    if ($etat != "tout") {
        $paniers = getPaniersByEtat($paniers, $etat);
    }
}
?>

<!doctype html >

<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>admin profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../deconnexion.php">Deconnexion</a>
        </li>
      </ul>
    </nav>
    <div class="container-fluid">
     <div class="row">
       <?php include "../template/navigation.php"; ?>
       <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">liste des paniers</h1>
            <div>
    
            </div>
        </div>
   <!DOCTYPE html>
   <!-- liste start -->
   <div>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>"method="POST">
        <div class="form-group d-flex">
         <select name="etat" class="form-control">
            <option value="">-- Choisir l'etat --</option>
            <option value="tout">Tout</option>
            <option value="en cours">Encours</option>
            <option value="en livraison">En livraison</option>
            <option value="livraison termine">Livraison termine</option>
         </select>
        </div>

        <input type="submit" class="btn btn-primary ml-2" name="btnSearch" value="Chercher">
      </from>
    <table class="table">
 <thead>
    <tr>
        <th scope ="col">#</th>
        <th scope ="col">client</th>
        <th scope ="col">total</th>
        <th scope ="col">date</th>
        <th scope ="col">etat</th>
        <th scope ="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 0;
    foreach ($paniers as $p) {
        $i++;
        echo '<tr>
                <th scope="row">' . $i . '</th>
                <td>' . $p['nom'] . ' ' . $p['prenom'] . '</td>
                <td>' . $p['total'] . ' DTT</td>
                <td>' . $p['date_creation'] . '</td>
                <td>' . $p['etat'] . '</td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#Commandes'.$p['id'].'" class="btn btn-success">Afficher</a>
                    <a href="#" data-toggle="modal" data-target="#Traiter'.$p['id'].'" class="btn btn-primary">traiter</a>
                </td>
              </tr>';
    }
?>
   </tbody>
</table>
  


        </div>



        </main>
        </div>
        </div>
 <?php
 foreach ($paniers as $index =>$p) { ?>
  <!--modal traiter-->
  <div class="modal fade" name="Traiter" id="Traiter<?php echo $p['id'];?>" tabindex="-1" aria-labelledby="exampleModelLabel" aria-hidden="true">
   <div class="modal-dialog">
    <div class="modal-content">
        <div class="model-header">
            <h5 class="modal-title" id="eccampleModalLabel">traiter la commandes   </h5>
        <button type="button" class="close" data dismiss="modal" aria label="close">
            <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">

      
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
           <input type="hidden" value="<?php echo $p['id'];?>" name="panier_id">
           <div class="from-group">
             <select name="" class="from-control">
                <option value="en livraison">En livraison </option>
                <option value="livraison termine">Livraison termine</option>
             </select>
            </div>
            <div class="from-group">
             <button type="submit" name="btnSubmit" class="btn btn-primary">sauvgarder</button>
            </div>
                    
          </form>


      </div>
      <div class="modal-footer">
      </div>
    </div>
    </div>
  </div>















<?php


}

?>
      
      <?php foreach ($paniers as $p): ?>
    <!-- Modal Afficher -->
    <div class="modal fade" id="Commandes<?php echo $p['id']; ?>" tabindex="-1" aria-labelledby="exampleModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Liste des commandes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom produit</th>
                                <th>Image</th>
                                <th>Quantité</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($commandes as $c): ?>
                                <?php if ($c['panier'] == $p['id']): ?>
                                    <tr>
                                        <td><?php echo $c['nom']; ?></td>
                                        <td><img src="../../image/<?php echo $c['image']; ?>" alt="<?php echo $c['nom']; ?>" width="100"></td>
                                        <td><?php echo $c['quantite']; ?></td>
                                        <td><?php echo $c['total']; ?> DTT</td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- <div class="modal-footer">
                    Modal Footer Content Goes Here
                </div> -->
            </div>
        </div>
    </div>
<?php endforeach; ?>

     






            <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
  </body>









</html>