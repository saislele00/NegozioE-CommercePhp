<?php
session_start();
require_once "config.php";
isDown();
?>
<!DOCTYPE html>
<html lang="it">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Categorie</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
        <!-- Custom styles for this template -->
        <link href="css/custom.css" rel="stylesheet">
    <!-- Material Icon-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
    <!--  Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Prompt|Ubuntu:400,700" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-md  bg-primary fixed-top" id ="navigazione">
      <div class="container">
        <a class="navbar-brand" href="index.php">Sais Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <i class="material-icons">menu</i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Negozio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="carrello.php">Checkout</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin/index.php">Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contatti</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <!-- Page Content -->
    <div class="container my-5">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-3">Categorie dei prodotti</h1>
        <a href="#" class="btn btn-primary btn-lg">Acquista!</a>
      </header>

      <!-- Page Features -->
      <div class="row text-center">

          <?php
          if(isset($_GET['id']))
          {
              $id=$_GET['id'];
              get_ProdottiCat($id);
          }
          ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-primary">
      <div class="container">
        <p class="m-0 text-center text-white">Progetto Prova Per Relazione PHP  <a style="color: white" href="https://github.com/saislele2000/NegozioE-CommercePhp" target="_blank" >Clicca Per File Sorgente</a></p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>
