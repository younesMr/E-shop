<?php


   
   include "./func.php";
   $pdts=getPdts();
   $cat=getCat();
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
     <td width=10%> <img width="100%" heigth="10%" alt="oops" src='<?=$p[ "image"]?>'> </td>
     <td width=10%> <?=$p[ "nom"]?></td>
     <td width=10%> <?=$p[ "categorie"]?></td>
     <td width=10%> <?=$p[ "prix"]?></td>
     <td width=20% >
       <?=$p[ "description"]?></td>
       <td width=20%>
    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"> Modifier ? </a>
     <a href="#" class="btn btn-danger"> Supprimer</a>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel" >Ajouter Produit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="ajoutPdt.php" enctype="multipart/form-data">
          <!-- Form fields -->
          <div class="form-group">
          <label for="image">upload Image</label>
    <input type="file" name="image" id="image"><br>
            <label for="nom">Nom</label> 
            <input class="form-control" type="text" name="nom" id="nom" placeholder="Enter name">
           
            <label for="cat">Categorie</label> <br>
            <select name="cat" id="cat">
            
            <?php foreach($cat as $c):?>
         
         <option class="form-control" value=" <?=$c[ "id"]?>"> <?=$c[ "nom"]?> </option>
         
         <?php endforeach; ?>
         </select><br>
            <label for="prix">Prix</label> 
            <input type="text" class="form-control" name="prix" id="prix" placeholder="Enter prix">
            <label for="des">Description</label>  
            <textarea class="form-control" name="des" id="des" placeholder="Enter description"></textarea>
            
          </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div></form>
    </div>
  </div>
</div>
<!--  -->

<!-- Modal modif -->
<!-- <div class="modal fade" id="modifModal" tabindex="-1" aria-labelledby="exModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exModalLabel">Modifier Produit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="modPdt.php" enctype="multipart/form-data">
         
          <div class="form-group">
          <input type="hidden" id="modId" name="id"> 
          <label for="modImage">upload Image</label>
    <input type="file" name="image" id="modImage"><br>
            <label for="modNom">Nom</label> 
            <input class="form-control" type="text" name="nom" id="modNom" placeholder="Enter name">
           
            <label for="modCat">Categorie</label> <br>
            <select name="cat" id="modCat">
            
            <?//php foreach($cat as $c):?>
         
         <option class="form-control"  value=" <?//=$c[ "id"]?>"> <?//=$c[ "nom"]?> </option>
         
         <?//php //endforeach; ?>
         </select><br>
            <label for="modPrix">Prix</label> 
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
-->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>