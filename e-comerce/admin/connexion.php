
<?php
//$servername = "localhost" ;  
//$dbuser = "root" ;
//$dbpassword = "" ;
//$dbname = "e-shop" ;
//try {
   //$conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);
   // set the PDO error mode to exception
   //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
// } catch(PDOException $e) {
 //  echo "Connection failed: " . $e->getMessage();
 //}



session_start();
include "../inc/function.php";

$user = false;

// Check if form data is submitted
if (!empty($_POST)) {
    // Call the authentication function
    $user = ConnectAdmin($_POST);
    
    // If user is authenticated (returned non-empty array), set session variables
    if ($user && count($user) > 0) {
      $_SESSION['id']=$user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['mp'] = $user['mp'];
       header('location:profile.php');       
        // You're setting $_SESSION['email'] twice. I assume it's a mistake and removed the redundant line.
    }
}


?>

<!---->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <div class="container">
      <div class="login-box">
        <h2>Login</h2>
        <form action="connexion.php" method="post">
          <div class="user-box">
            <input type="text" name="email" required="" />
            <label>Email</label>
          </div>
          <div class="user-box">
            <input type="password" name="mp" id="password" required="" />
            <label>Password</label>
            <span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
          </div>
          <button>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  Submit
</button>
        </form>
      </div>
    </div>

  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.7/sweetalert2.all.min.js"></script>
  <?php 
if (!$user) {
  print" 
  <script>
      swal.fire({
          title: 'Erreur',
          text: 'invalid credential',
          icon: 'error',
          confirmButtonText: 'OK',
          timer: 2000
      });
  </script>";
}

  
  ?>
  
</html>