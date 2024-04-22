<?php
//test
   include "./func.php";
   $cat=getCat();
   ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  
  <h1>liste Des Catégories</h1> 
  <!-- ajouter  -->
 
  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ajouter">
  Ajouter
</button>
  </div>
<table class="table">

  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody >
  
    <?php foreach($cat as $c):?>
     <tr style="height: 10%">
     <th width=20% scope="row">  <?=$c[ "id"]?> </th>
     <td width=20%> <?=$c[ "nom"]?></td>
     <td width=40% > <?=$c[ "description"]?></td>
      <td width=20%>
    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modifier" onclick="ModifierModal(<?=$c['id']?>, '<?=$c['nom']?>','<?=$c['description']?>','<?=$c['createur']?>')"> Modifier ? </a>
     <a href='suppCat.php?id=<?=$c[ "id"]?>' class="btn btn-danger"> Supprimer</a>
      </td>
    </tr>
    <?php endforeach; ?>

    
  </tbody>
</table>


<!-- Modal Ajouter-->
<div class="modal fade" id="ajouter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
   
<div class="modal-body">
  <form method="post" action="ajoutCat.php">
    <!-- Form fields -->
    <div class="form-group">
      <label for="name">Name</label> 
      <input class="form-control" type="text" name="nom" id="nom" placeholder="Enter name">
      
      <label for="des">Description</label>  
      <input class="form-control" type="text" name="description" id="des"  placeholder="Enter description">
      
      
  
    <!-- Modal footer -->
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
  </form>
</div>

 
    </div>
  </div>
</div>



<!-- Modal Modifier -->
<div class="modal fade" id="modifier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier Catégorie</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="modCat.php">
          <!-- Form fields -->
          <div class="form-group">
            <input type="hidden" id="modId" name="id">
            <label for="modNom">Nom</label> 
            <input class="form-control" type="text" name="nom" id="modNom" placeholder="Enter name">
            
            <label for="modDes">Description</label>  
            <textarea class="form-control" name="description" id="modDes" placeholder="Enter description"></textarea>
          
        
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Modifier</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    function ModifierModal(id, nom, description,cr) {
        document.getElementById('modId').value = id;
        document.getElementById('modNom').value = nom;
        document.getElementById('modDes').value = description;
        document.getElementById('modCr').value = cr;
    }
</script>
