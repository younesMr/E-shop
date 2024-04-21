<?php
 include "./func.php";
/* 
if(isset($_REQUEST['nom'])&& isset($_REQUEST['description'])&& isset($_REQUEST['createur'] )){
 $nom=$_REQUEST['nom'];
 $des=$_REQUEST['description'];
 $cr=$_REQUEST['createur'];
 ajoutCat($nom,$des,$cr);
} 
 */
//header("location:dashi.html");

if(isset($_POST['nom']) && isset($_POST['des']) && isset($_POST['cat']) && isset($_POST['prix']))
  {  $nom = $_POST['nom'];
    $des = $_POST['des'];
    $cat = $_POST['cat'];
    $prix = $_POST['prix'];
    ajoutPdt($nom, $des, $cat,$prix);header("location:dashPdt.php");
  }





?>
  <form method="post" action="modCat.php">
          <!-- Form fields -->
          <div class="form-group">
            <input type="hidden" id="modId" name="id">
            <label for="modNom">Nom</label> 
            <input class="form-control" type="text" name="nom" id="modNom" placeholder="Enter name">
            
            <label for="modDes">Description</label>  
            <textarea class="form-control" name="description" id="modDes" placeholder="Enter description"></textarea>
            
            <label for="cr">Creator</label> 
            <textarea class="form-control" name="createur" id="modCr" placeholder="Enter creator"></textarea>
          </div>
        
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Modifier</button>
          </div>
        </form>