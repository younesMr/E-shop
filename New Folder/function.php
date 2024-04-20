<?php
function connect() {
  // Database connection parameters
  $servername = "localhost";
  $dbuser = "root";
  $dbpassword = "";
  $dbname = "E-commerce";

  try {
      // Create a PDO instance
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);

      // Set PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $conn;
  } catch(PDOException $e) {
      // Handle connection errors
      die("Connection failed: " . $e->getMessage());
  }
}
function getallcategories (){
// cnx vers la bd
$servername = "localhost" ;  
 $dbuser = "root" ;
 $dbpassword = "" ;
 $dbname = "E-commerce" ;
 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
// creation de la requette
$requette = "SELECT * FROM categories";
// execution de la requette
$resultat = $conn->query($requette);

// resultat de la requette
$categories = $resultat->fetchall();
//var_dump($categories);
return $categories; 
}



function getallproducts() {
// cnx vers la bd
$servername = "localhost" ;  
 $dbuser = "root" ;
 $dbpassword = "" ;
 $dbname = "Ecommerce" ;
 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
// creation de la requette
$requette = "SELECT * FROM produits";
// execution de la requette
$resultat = $conn->query($requette);

// resultat de la requette
$produits = $resultat->fetchall();
//var_dump($categories);
return $produits;
}

function searchproduits($keywords){
  // cnx vers la bd
$servername = "localhost" ;  
$dbuser = "root" ;
$dbpassword = "" ;
$dbname = "E-commerce" ;
try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
 } catch(PDOException $e) {
   echo "Connection failed: " . $e->getMessage();
 }
 
// creation de la requette
 $requette = "SELECT * FROM produits WHERE nom LIKE '%$keywords%' ";
// execution de la requette
$resultat = $conn->query($requette);
// resultat de la requette
$produits = $resultat->fetchall();
return $produits;

}

function getproduitbyId($id){
// cnx vers la bd
$servername = "localhost" ;  
 $dbuser = "root" ;
 $dbpassword = "" ;
 $dbname = "E-commerce" ;
 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
// creation de la requette
$requette = "SELECT * FROM produits WHERE id=$id";
// execution de la requette
$resultat = $conn->query($requette);
// resultat de la requette
$produit = $resultat->fetch();
return $produit;
}

 function Addvisiteur ($data){
// cnx vers la bd
$servername = "localhost" ;  
 $dbuser = "root" ;
 $dbpassword = "" ;
 $dbname = "E-commerce" ;
 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  // creation de la requette
$requette = "INSERT INTO visiteurs(nom, prenom ,email , mp , telephone ) VALUES  ('".$data['nom']."','".$data['prenom']."','".$data['email']."','".$data['mp']."','".$data['telephone']."' ) ";
// execution de la requette
$resultat = $conn->query($requette);
if ($resultat){
 return true; 
}else{
 return false;
}
}
//my part
function ConnectAdmin($data) {
  // Connect to the database
  $conn = connect();

  // Get the email and password from the submitted form data
  $email = $data['email'];
  $mp = md5($data['mp']);

  // Prepare a SQL query to select the user from the database
  $requette = "SELECT * FROM administrateur WHERE email = '$email' AND mp = '$mp'";

  //  execute it with the email and password
  $resultat = $conn->query($requette);

  // Fetch the user from the result set
  $user = $resultat->fetch();

  // Return the user array
  return $user;
}
function getAllPaniers(){
 $conn = connect();
 $requette = "SELECT v.nom,v.prenom,v.telephone, p.total , p.etat, p.date_creation , p.id FROM paniers p, visiteurs v WHERE p.visiteurs= v.id";
 $resultat=$conn ->query($requette);
 $paniers = $resultat ->fetchAll();
 return $paniers;



}
function getAllCommandes(){
  $conn = connect();
  $requette = "SELECT p.nom , p.image , c.quantite , c.total , c.panier FROM commandes c , produits p WHERE c.produit = p.id";
  $resultat=$conn ->query($requette);
  $comandes = $resultat ->fetchAll();
  return $comandes;
 
 
 
}


function changerEtatPaniers($data){
  $conn = connect();
  $requette= "Update paniers SET etat='".$data['etat_id']. "'where id=".$data['etat']."'";
  $resultat= $conn -> query($requette);

}
function getPaniersByEtat($paniers,$etat){

  $paniersEtat=array();
  foreach($paniers as $p){
    if($p['etat']== $etat){
      array_push($paniersEtat,$p);
  
    }
  }
    return $paniersEtat ;
}

function EditAdmin($data) {
  try {
    $conn = connect();
    
    // Validate input data
    if (empty($data['nom']) || empty($data['email']) || empty($data['id_admin'])) {
      throw new Exception('Invalid input data');
    }
    
    // Check if 'mp' field is not empty
    if (!empty($data['mp'])) {
      // Hash the password using a strong hashing algorithm
      $hashed_password = password_hash($data['mp'], PASSWORD_BCRYPT);
      
      // Prepare SQL statement with placeholders
      $requette = "UPDATE administrateur SET nom=?, email=?, mp=? WHERE id=?";
      
      // Prepare and bind parameters
      $stmt = $conn->prepare($requette);
      $stmt->bind_param("sssi", $data['nom'], $data['email'], $hashed_password, $data['id_admin']);
      
      // Execute the statement
      $stmt->execute();
      
      // Check if the update was successful
      if ($stmt->affected_rows > 0) {
        echo "Admin updated successfully.";
      } else {
        echo "Failed to update admin.";
      }
    } else {
      echo "Password cannot be empty.";
    }
    
    // Close statement
    $stmt->close();
    
    // Close connection
    $conn->close();
  } catch (Exception $e) {
    echo "Error: ". $e->getMessage();
  }
}




?>