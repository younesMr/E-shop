<?php
 include ('C:\laragon\www\e-comerce\inc\function.php');
$servername = "localhost" ;  
$dbuser = "root" ;
$dbpassword = "" ;
$dbname = "e-shop" ;
try {
   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
 } catch(PDOException $e) {
   echo "Connection failed: " . $e->getMessage();
 }
 

 session_start();
 if(isset ($_POST['btnEdit'])){
  EditAdmin($_POST);



 }

 ?>
<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../deconnexion">deconnexion</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
       <?php 
        include './template/navigation.php';
       ?>

<?php
// Start or resume the session
session_start();

// Check if the user is logged in and retrieve their email from the database
if (isset($_SESSION['user_id'])) {
    // Here, you would typically query the database to fetch the email associated with the user_id
    // Replace 'your_database_connection_code' with your actual database connection code
    $user_id = $_SESSION['user_id'];
    $email = ''; // Initialize email variable
    // Your database query to fetch email associated with $user_id goes here
    // Example: $email = query_database_to_get_email($user_id);

    // Set the email in the session variable
    $_SESSION['email'] = $email;
}
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">profile</h1>
        <div>
            admin
        </div>
    </div>
    <div class="container">
        <h1>Nom: <span class="text-primary">admin</span></h1>
        <h1>Email: <span class="text-primary"><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'N/A'; ?></span></h1>
        <a data-toggle="modal" data-target="#profileEdit" class="btn btn-primary">modifier</a>
    </div>
</main>

    <!-- Modal modfie -->
    <div class="modal fade" id="profileEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <input type="hidden" value="<?php echo isset($_SESSION['id_admin']) ? $_SESSION['id_admin'] : ''; ?>" name="id_admin">
          <div class="form-group">
            <input type="email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" class="form-control">
          </div>
          <div class="form-group">
            <input type="password" name="mp" value="" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="btnEdit" class="btn btn-primary">modifier</button>
      </div>
      </form>
    </div>
  </div>
</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../js/jquery-slim.min.js"><\/script>')</script>
    <script src="../js/vendor/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>

  </body>
</html>
