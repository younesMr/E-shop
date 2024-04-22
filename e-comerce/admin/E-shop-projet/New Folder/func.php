<?php


function getCat(){

try {
    $url='localhost';
    $name="root";
    $pass="";
    $bd=new PDO("mysql:host=$url;dbname=e-shop",$name,$pass);
    $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
     


$req="SELECT * FROM categories ";
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
        $name="root";
        $pass="";
        $bd=new PDO("mysql:host=$url;dbname=e-shop",$name,$pass);
        $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
    $req="SELECT * FROM produits ";
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
            $name="root";
            $pass="";
            $bd=new PDO("mysql:host=$url;dbname=e-shop",$name,$pass);
            $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
             
        
        
        $req="SELECT * FROM visiteurs ";
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
                $name="root";
                $pass="";
                $bd=new PDO("mysql:host=$url;dbname=e-shop",$name,$pass);
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
            function ajoutCat($nom,$des){

              try {
                  $url='localhost';
                  $name="root";
                  $pass="";
                  $bd=new PDO("mysql:host=$url;dbname=e-shop",$name,$pass);
                  $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  
                   
                  $req="INSERT INTO `categories` (`nom`, `description`) VALUES ( ?,?) ";
                  $res=$bd->prepare($req);
                  $res->bindParam(1, $nom);
                  $res->bindParam(2, $des);
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
                    $name="root";
                    $pass="";
                    $bd=new PDO("mysql:host=$url;dbname=e-shop",$name,$pass);
                    $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    
                     
                
                
                $req= "DELETE FROM categories WHERE `categories`.`id` =$id ";
                $res=$bd->prepare($req);
                $res->execute();
               
                
                
                
                
                } catch (PDOException $e) {
                    echo $e->getMessage();
                  }
                  
                } 

                function suppPdts($id){
    
                  try {
                      $url='localhost';
                      $name="root";
                      $pass="";
                      $bd=new PDO("mysql:host=$url;dbname=e-shop",$name,$pass);
                      $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                      
                       
                  
                  
                  $req= "DELETE FROM produits WHERE `produits`.`id` = $id";
                  $res=$bd->prepare($req);
                  $res->execute();
                 
                  
                  
                  
                  
                  } catch (PDOException $e) {
                      echo $e->getMessage();
                    }
                    
                  } 
  
                  function suppClient($id){
    
                    try {
                        $url='localhost';
                        $name="root";
                        $pass="";
                        $bd=new PDO("mysql:host=$url;dbname=e-shop",$name,$pass);
                        $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                        
                         
                    
                    
                    $req= " DELETE FROM visiteurs WHERE `visiteurs`.`id` = $id" ;
                    $res=$bd->prepare($req);
                    $res->execute();
                   
                    
                    
                    
                    
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                      }
                      
                    } 
                    function modCat($nom, $des, $cr, $id) {
                      try {
                          $url = 'localhost';
                          $name = "root"; 
                          $pass = "";
                          $bd = new PDO("mysql:host=$url;dbname=e-shop",$name, $pass);
                          $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                          
                          $req = "UPDATE `categories` SET `nom` = ?, `description` = ?, `createur` = ? WHERE `id` = ?";
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
                        $name = "root"; // Renamed $name to$name to avoid conflict
                        $pass = "";
                        $bd = new PDO("mysql:host=$url;dbname=e-shop", $name, $pass);
                        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $req=" UPDATE `produits` SET `nom` = ?, `description` = ?, `prix` = ?, `categorie` = ? WHERE `produits`.`id` = ?";
                        //$req = "UPDATE `categories` SET `nom` = ?, `description` = ?, `createur` = ? WHERE `id` = ?";
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
            
function ajoutPdt($nom, $descri,$cat, $prix, $img="uploads/avatar1.png") {
  try {
      // اتصال بقاعدة البيانات وإعدادها كما هو موجود في الكود الحالي
      
      $url='localhost';
      $name="root";
      $pass="";
      $bd=new PDO("mysql:host=$url;dbname=e-shop",$name,$pass);
      $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   
      
    
      $req = "INSERT INTO `produits` (`nom`, `description`, `categorie`,`prix`, `image`) VALUES (:nom, :descri,:cat, :prix, :img)";
      $res = $bd->prepare($req);
      
      // ربط البارامترات بالقيم المقدمة
      $res->bindParam(':nom', $nom);
      $res->bindParam(':descri', $descri);
      $res->bindParam(':prix', $prix);
      $res->bindParam(':cat', $cat);
      $res->bindParam(':img', $img);
      
      // تنفيذ الاستعلام
      $res->execute();
      
      // إذا تم تنفيذ الاستعلام بنجاح، يمكنك إظهار رسالة نجاح
      if ($res) {
          echo "تمت العملية بنجاح!";
      } else {
          echo "حدث خطأ!";
      }
    
  } catch (PDOException $e) {
      echo $e->getMessage();
  }
}


