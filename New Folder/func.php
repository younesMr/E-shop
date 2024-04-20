<?php


function getCat(){

try {
    $url='localhost';
    $name="younes";
    $pass="younes";
    $bd=new PDO("mysql:host=$url;dbname=E-commerce",$name,$pass);
    $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
     


$req="SELECT * FROM Categorie ";
$res=$bd->prepare($req);
$res->execute();
$cat=$res->fetchAll(PDO::FETCH_ASSOC);


return($cat);

} catch (PDOException $e) {
    echo $e->getMessage();
  }
  
}
function getPdts(){

    try {
        $url='localhost';
        $name="younes";
        $pass="younes";
        $bd=new PDO("mysql:host=$url;dbname=E-commerce",$name,$pass);
        $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
    $req="SELECT * FROM Produit ";
    $res=$bd->prepare($req);
    $res->execute();
    $pdts=$res->fetchAll(PDO::FETCH_ASSOC);
    
    
    return($pdts);
    
    } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }
    function getClients(){
    
        try {
            $url='localhost';
            $name="younes";
            $pass="younes";
            $bd=new PDO("mysql:host=$url;dbname=E-commerce",$name,$pass);
            $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
             
        
        
        $req="SELECT * FROM client ";
        $res=$bd->prepare($req);
        $res->execute();
        $clients=$res->fetchAll(PDO::FETCH_ASSOC);
        
        
        return($clients);
        
        } catch (PDOException $e) {
            echo $e->getMessage();
          }
          
        } 
        function getProfile(){
           
            try {
                $url='localhost';
                $name="younes";
                $pass="younes";
                $bd=new PDO("mysql:host=$url;dbname=E-commerce",$name,$pass);
                $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                
                 
            
            $req="SELECT * FROM `Admin` ";
            $res=$bd->prepare($req);
            $res->execute();
            $profile=$res->fetchAll(PDO::FETCH_ASSOC);
            
            
            return($profile);
            
            } catch (PDOException $e) {
                echo $e->getMessage();
              }
              
            } 
            function ajoutCat($nom,$des,$cr){

              try {
                  $url='localhost';
                  $name="younes";
                  $pass="younes";
                  $bd=new PDO("mysql:host=$url;dbname=E-commerce",$name,$pass);
                  $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  
                   
                  $req="INSERT INTO `Categorie` (`nom`, `description`, `createur`) VALUES ( ?,?,?) ";
                  $res=$bd->prepare($req);
                  $res->bindParam(1, $nom);
                  $res->bindParam(2, $des);
                  $res->bindParam(3, $cr);
                  $res->execute();
              if($res){
                echo "ssucces:!";
              }
           
              else echo "error!";
              
              
              } catch (PDOException $e) {
                  echo $e->getMessage();
                }
                
              }  


              function suppCat($id){
             
               // error_reporting(E_ALL);
             //   ini_set('display_errors', 1);
                
                try {
                    $url='localhost';
                    $name="younes";
                    $pass="younes";
                    $bd=new PDO("mysql:host=$url;dbname=E-commerce",$name,$pass);
                    $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    
                     
                
                
                $req= "DELETE FROM Categorie WHERE `Categorie`.`id` =$id ";
                $res=$bd->prepare($req);
                $res->execute();
               
                
                
                
                
                } catch (PDOException $e) {
                    echo $e->getMessage();
                  }
                  
                } 

                function suppPdts($id){
    
                  try {
                      $url='localhost';
                      $name="younes";
                      $pass="younes";
                      $bd=new PDO("mysql:host=$url;dbname=E-commerce",$name,$pass);
                      $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                      
                       
                  
                  
                  $req= "DELETE FROM Produit WHERE `Produit`.`id` = $id";
                  $res=$bd->prepare($req);
                  $res->execute();
                 
                  
                  
                  
                  
                  } catch (PDOException $e) {
                      echo $e->getMessage();
                    }
                    
                  } 
  
                  function suppClient($id){
    
                    try {
                        $url='localhost';
                        $name="younes";
                        $pass="younes";
                        $bd=new PDO("mysql:host=$url;dbname=E-commerce",$name,$pass);
                        $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                        
                         
                    
                    
                    $req= " DELETE FROM client WHERE `client`.`id` = $id" ;
                    $res=$bd->prepare($req);
                    $res->execute();
                   
                    
                    
                    
                    
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                      }
                      
                    } 
                    function modCat($nom, $des, $cr, $id) {
                      try {
                          $url = 'localhost';
                          $username = "younes"; // Renamed $name to $username to avoid conflict
                          $pass = "younes";
                          $bd = new PDO("mysql:host=$url;dbname=E-commerce", $username, $pass);
                          $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                          
                          $req = "UPDATE `Categorie` SET `nom` = ?, `description` = ?, `createur` = ? WHERE `id` = ?";
                          $res = $bd->prepare($req);
                          $res->execute([$nom, $des, $cr, $id]);
                  
                          if ($res) {
                              echo "Success!";
                          } else {
                              echo "Error!";
                          }
                      } catch (PDOException $e) {
                          echo "Error: " . $e->getMessage();
                      }
                  }
                  
        
                  function modPdt($nom, $des, $cat, $id,$prix) {
                    try {
                        $url = 'localhost';
                        $username = "younes"; // Renamed $name to $username to avoid conflict
                        $pass = "younes";
                        $bd = new PDO("mysql:host=$url;dbname=E-commerce", $username, $pass);
                        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $req=" UPDATE `Produit` SET `nom` = ?, `description` = ?, `prix` = ?, `categories` = ? WHERE `Produit`.`id` = ?";
                        //$req = "UPDATE `Categorie` SET `nom` = ?, `description` = ?, `createur` = ? WHERE `id` = ?";
                        $res = $bd->prepare($req);
                        $res->execute([$nom, $des, $prix, $cat, $id ]);
                
                        if ($res) {
                            echo "Success!";
                        } else {
                            echo "Error!";
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                }
                function ajoutPdt($nom, $des, $cat,$prix,$cr){

                  try {
                      $url='localhost';
                      $name="younes";
                      $pass="younes";
                      $bd=new PDO("mysql:host=$url;dbname=E-commerce",$name,$pass);
                      $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                      
                       
                      $req="INSERT INTO `Produit` (`nom`, `description`, `prix`,  `categories`, `createur`) VALUES ('$nom', '$des', '$prix', '$cat',$cr) " ;
                      //"INSERT INTO `Categorie` (`id`, `nom`, `description`, `createur`, `d_cr`, `d_md`) VALUES (NULL, $name,$des,$cr, current_timestamp(), current_timestamp()) ";
                      $res=$bd->prepare($req);
                      $res->execute();
                 /*  if($res){
                    echo "ssucces:!";
                  }
               
                  else echo "error!"; */
                  
                  
                  } catch (PDOException $e) {
                      echo $e->getMessage();
                    }
                    
                  }          
                  
?> 