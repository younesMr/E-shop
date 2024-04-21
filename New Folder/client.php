<?php
   include "./func.php";
   $clients=getClients();
   ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  
  <h1>liste Des Clients</h1>
  </div>
<table class="table">

  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
     
      <th scope="col">Nom</th>
      <th scope="col">Prénom </th>
      <th scope="col">E-mail</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody >
  
  <!--  

  
foreach($clients as $c){
    echo ' <tr style="height: 10%">
    <th width=20% scope="row">'.$c["id"].'</th>
    <td width=20%>'.$c["nom"].'</td>
    <td width=20%>'.$c["prenom"].'</td>
    <td width=20%>'.$c["email"].'</td>
     <td width=20%>
     <a href="" class="btn btn-success"  > Modifier!! </a>
     <a href="" class="btn btn-danger"> Supprimer</a>
     </td>
   </tr>';
   }

    ?> -->
    <?php foreach($clients as $c):?>
     <tr style="height: 10%">
     <th width=20% scope="row">  <?=$c[ "id"]?> </th>
     <td width=20%> <?=$c[ "nom"]?></td>
     <td width=20%> <?=$c[ "prenom"]?></td>
     <td width=20%> <?=$c[ "email"]?></td>
     <td width=20%>
 
      <a href="suppClient.php?id=<?=$c['id']?>" class="btn btn-danger"> Supprimer</a>
      </td>
    </tr>
    <?php endforeach; ?>

    
  </tbody>
</table>


