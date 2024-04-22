<?php
/*include   "inc/function.php" ;
session_start();


//var_dump($_SESSION['panier']);
$total=0;
if (isset(  $_SESSION['panier'])){ 
$total = $_SESSION['panier'][1];
}

$categories = getallcategories();

if(!empty($_POST)){

     $produit = searchproduits($_POST['search']);
}else{
$produit = getallproducts();
}
$commandes = array(); 
if (isset($_SESSION['panier'])){
    if ( count($_SESSION['panier'][3])>0){
            $commandes = $_SESSION['panier'][3];       
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php 
    include "inc/header.php";
     ?>

     <div class="row col-12 mt-4">
               <h1>panier utilisateur</h1> 
               <table class="table">
                  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produit</th>
      <th scope="col">Quantite</th>
      <th scope="col">Total</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
   <?PHP
  foreach($commandes as $index=>$commande ){ 
    echo '<tr>';
    echo '<th scope="row">'.($index+1).'</th>';
    echo '<td>'.(isset($commande[5]) ? $commande[5] : '').'</td>';
    echo '<td>'.$commande[0].' pieces</td>';
    echo '<td>'.$commande[1].' DTT</td>';
    echo '<td><a href="action/enlever-produit-panier.php?id='.$index.'" class="btn btn-danger">supprimer</a></td>';
    echo '</tr>';
}

   
   ?> 
  </tbody>
</table>
<div class="text-mt-3">
  <h3>Total:<?php echo $total ?> DTT</h3>
  <hr/>
  <a href="action/valider-panier.php" class="btn btn-success" style="width:100px">Valider</a>
</div>
     <?php
     include "inc/footer.php"
     ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>*/
include "inc/function.php";
session_start();

//var_dump($_SESSION['panier']);
$total = 0;
if (isset($_SESSION['panier'])) {
    $total = $_SESSION['panier'][1];
}

$categories = getallcategories();

if (!empty($_POST)) {
    $produit = searchproduits($_POST['search']);
} else {
    $produit = getallproducts();
}
$commandes = array();
if (isset($_SESSION['panier'])) {
    if (count($_SESSION['panier'][3]) > 0) {
        $commandes = $_SESSION['panier'][3];
    }
}

// Vérifier le contenu de la variable $commandes
var_dump($commandes);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
include "inc/header.php";
?>

<div class="row col-12 mt-4 p-4">
    <h1>panier utilisateur</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Produit</th>
            <th scope="col">Quantite</th>
            <th scope="col">Total</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($commandes as $index => $commande) {
            echo '<tr>';
            echo '<th scope="row">' . ($index + 1) . '</th>';
            echo '<td>' . (isset($commande[4]) ? $commande[4] : '') . '</td>'; // Utiliser l'index 4 pour le nom du produit
            echo '<td>' . $commande[0] . ' pieces</td>'; // Utiliser l'index 0 pour la quantité
            echo '<td>' . $commande[1] . ' DTT</td>'; // Utiliser l'index 1 pour le total
            echo '<td><a href="action/enlever-produit-panier.php?id=' . $index . '" class="btn btn-danger">supprimer</a></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
    <div class="text-mt-3">
        <h3>Total:<?php echo $total ?> DTT</h3>
        <hr/>
        <a href="action/valider-panier.php" class="btn btn-success" style="width:100px">Valider</a>
    </div>
    <?php
    include "inc/footer.php"
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>

