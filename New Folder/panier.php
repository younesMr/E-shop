<?php

 session_start();
 include "function.php";
 if (isset($_POST['btnSubmit'])){    //changer etat panier
  changerEtatPaniers($_POST);
  

 } 
 $commandes = getAllCommandes();
 $paniers = getAllPaniers();



 if (isset($_POST['btnSearch'])){ 
   // echo $_POST['etat'];
   //exist;
   if($_POST['etat']=="tout"){
    $paniers = getAllPaniers();

   }else{
  
    $paniers =  getPaniersByEtat($paniers,$_POST['etat']);
    }
 }


?>
       <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">liste des paniers
            </div>
   <!-- liste start -->
   
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
            print '        <tr>
                            <th scope="row">' . $i . '</th>
                            <td>' . $p['nom'] . ' ' . $p['prenom'] . '</td>
                            <td>' . $p['tootal'] . ' DTT </td>
                            <td>' . $p['date_creation'] . '</td>
                            <td>' . $p['etat'] . '</td>
                            <td>
                                <a data-toggle="modal" data-target="#Commandes' . $p['id'] . '" class="btn btn-success">Afficher</a>
                                <a data-toggle="modal" data-target="#Traiter' . $p['id'] . '" class="btn btn-primary">traiter</a>
                            </td>
                          </tr>';
        }
        ?>
   </tbody>
</table>
  


    

 <?php
 foreach ($paniers as $index =>$p) { ?>
  <!--modal modifier-->
  <div class="modal fade" id="traiter<?php echo $p['id']; ?>" tabindex="-1" aria-labelledby="exampleModelLabel" aria-hidden="true">
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
      
      <?php
 foreach ($paniers as $index =>$p) { ?>
  <!--modal modifier-->
  <div class="modal fade" id="Commande <?php echo $p['id']; ?>" tabindex="-1" aria-labelledby="exampleModelLabel" aria-hidden="true">
   <div class="modal-dialog">
    <div class="modal-content">
        <div class="model-header">
            <h5 class="modal-title" id="eccampleModalLabel">liste des commandes   </h5>
        <button type="button" class="close" data dismiss="modal" aria label="close">
            <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">

      <table>
        <thead>
            <tr>
                <th> Nom produit </th>
                <th>Image</th>
                <th>Quantite</th>
                <th>total</th>
        </tr>               

        </thead>
        <tbody>

         <?php
         foreach($comandes as$index => $c){
             if($c['panier']== $p['id']){ //sicomande appartinet (panier ouvert $p)
                
                         print '<tr>
                                <td>'.$c['nom'].'</td>
                                <td><img src="../../image/'.$c['image'].'"width="100"</td>
                                <td>'.$c['quantite'].'</td>
                                <td>'.$c['total'].' DTT </td>


                                

                                </tr>
                
                
                                ';
                            }

         }
         ?>


        </tbody>
        </table>



      </div>
      <div class="modal-footer">
      </div>
    </div>
    </div>
  </div>















<?php


}

?>
