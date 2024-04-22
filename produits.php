<?php 

 
include "inc/function.php";

$categories = getallcategories();
if (isset($_GET['id'])){
   $produit = getproduitbyId($_GET['id']);
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<?php include "inc/header.php"; ?>

<div class="row col-12 mt-4">  
    <div class="card col-8 offset-2">
        <img src="image/<?php echo $produit['image']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo isset($produit['nom']) ? $produit['nom'] : ''; ?></h5>
            <p class="card-text"><?php echo isset($produit['description']) ? $produit['description'] : ''; ?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><?php echo isset($produit['prix']) ? $produit['prix'] . ' dt' : ''; ?></li>
            <li class="list-group-item"><?php echo isset($produit['categorie']) ? $produit['categorie'] : ''; ?></li>
        </ul>
    </div>
</div>

<div class="bg-dark"></div>

<?php 
if (isset($_SESSION['etat']) && $_SESSION['etat'] == 0) {
    echo '<div class="alert alert-danger">compte non valide</div>';
}
?>

<div class="col-12">
    <form class="d-flex" action="action/commander.php" method="post">
        <input type="hidden" name="produit" value="<?php echo isset($produit['id']) ? $produit['id'] : ''; ?>">
        <input type="number" name="quantite" class="form-control" step="1" placeholder="Quantite du produit ...."><br>
        <button type="submit" class="btn btn-primary">commander</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
