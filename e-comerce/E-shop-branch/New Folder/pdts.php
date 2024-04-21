<?php



   include "./func.php";
   $pdts=getPdts();
   ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  
  <h1>liste Des Produits</h1>
  <!-- ajouter  -->
 
  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajoutModal">
  Ajouter
</button>
  </div>
<table class="table">

  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Nom</th>
      <th scope="col">categorie</th>
      <th scope="col">Prix</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody >

<?php foreach($pdts as $p):?>
     <tr style="height: 10%">
     <th width=10% scope="row">  <?=$p[ "id"]?> </th>
     <td width=10%> <?=$p[ "nom"]?></td>
     <td width=10%> <?=$p[ "categories"]?></td>
     <td width=10%> <?=$p[ "prix"]?></td>
     <td width=40% >
       <?=$p[ "description"]?></td>
      <td width=20%>
      <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modifier" onclick="ModifierModal(<?=$p['id']?>, `<?=$p['nom']?>`, `<?=$p['description']?>` ,`<?=$p['categories']?>`,<?=$p['prix']?>)" href=""> Modifier ? </a>
      <a  href="suppPdts.php?id=<?=$p["id"]?>" class="btn btn-danger"> Supprimer</a>
      </td>
    </tr>
    <?php endforeach; ?>

    




  </tbody>
</table>


<!-- Modal Ajout -->
<div class="modal fade" id="ajoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter Produit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="ajoutPdt.php">
          <!-- Form fields -->
          <div class="form-group">
           
            <label for="nom">Nom</label> 
            <input class="form-control" type="text" name="nom" id="nom" placeholder="Enter name">
            
            <label for="cat">Categorie</label>  
            <input class="form-control" name="cat" id="cat" placeholder="Enter categorie">
            <label for="prix">Prix</label> 
            <input type="text" class="form-control" name="prix" id="prix" placeholder="Enter prix">
            <label for="modDes">Description</label>  
            <textarea class="form-control" name="des" id="des" placeholder="Enter description"></textarea>
            
          </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div></form>
    </div>
  </div>
</div>

<!-- Modal Modifier -->
<div class="modal fade" id="modifier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="example">Modifier Produit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="modCat.php">
          <!-- Form fields -->
          <div class="form-group">
            <input type="hidden" id="modId" name="id">
            <label for="nom">Nom</label> 
            <input class="form-control" type="text" name="nom" id="modNom" placeholder="Enter name">
            
            <label for="cat">Categorie</label>  
            
            <input class="form-control" name="cat" id="modCat" placeholder="Enter categorie">
            <label for="prix">Prix</label> 
            <input type="text" class="form-control" name="prix" id="modPrix" placeholder="Enter prix">
            <label for="modDes">Description</label>  
            <textarea class="form-control" name="des" id="modDes" placeholder="Enter description"></textarea>
            
          </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div></form>
    </div>
  </div>
</div>

<script>
    function ModifierModal(id, nom, description, cat, prix) {
        document.getElementById('modId').value = id;
        document.getElementById('modNom').value = nom;
        document.getElementById('modDes').value = description;
        document.getElementById('modCat').value = cat;
        document.getElementById('modPrix').value = prix;
    }
</script>

