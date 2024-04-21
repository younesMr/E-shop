<?php
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

 session_start();
 if(isset ($_POST['btnEdit'])){
  EditAdmin($_POST);



 }
 ?>
<!doctype html>
<html lang="en">
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
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link " href="#">
                  <span data-feather="home"></span>
                  home <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="categories/liste.php">
                  <span data-feather="file"></span>
                  categories
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="layers"></span>
                  profile
                </a>
              </li>
            </ul>

          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">profile</h1>
            <div>
              <?php
                 echo $_SESSION['nom'];
                 ?>
          </div>
           </div>
           <div class="container">
           <h1>Nom: <span class="text-primary"><?php echo $_SESSION['nom'];?></h1></span>
           <h1>email: <span class="text-primary"><?php
                 echo $_SESSION['email'];
                 ?></h1></span>
           <a data-toggle="modal" data-target="#profileEdit'.$c['id'].'"class="btn btn-primary">modifier</a>
          </div>

          

        </main>
      </div>
    </div>
    <!-- Modal modfie -->
<div class="modal fade" id="profileEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
          <input type="hidden"value="<?php echo $_SESSION['id'];?>"name="id_admin">
          <div class="from-group"><input type="text" name="nom" value="<?php echo $_SESSION['nom'];?>" class="form-control"></div>
          <div class="from-group"><input type="email" name="email" value="<?php echo $_SESSION['email'];?>" class="form-control"></div>
          <div class="from-group"><input type="password" name="mp" value="" class="form-control">
</div>
           

      </div>
      <div class="modal-footer">
        <button type="submit" name="btnEdit"class="btn btn-primary">modifier</button>
      </div>
      </from>
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
