<?php
session_start();
require_once "config.php";
CheckAvviso();
isDown();
if(isset($_GET['delete']))
{
    $_SESSION['prodotto_'.$_GET['delete']]=null;
    $_SESSION['N_Articoli']=$_SESSION['N_Articoli']-$_SESSION['prodotto_'.$_GET['delete']];
    header("Location: carrello.php");
}
if(isset($_GET['remove']))
{
    $_SESSION['prodotto_'.$_GET['remove']]-=1;
    $_SESSION['N_Articoli']--;
    header("Location: carrello.php");
}
?>
<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Carrello</title>

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

    <div class="row">

        <div class="container">
            <!-- /.row -->
            <h1 class="text-center my-5">Il tuo ordine</h1>
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-10 m-auto">

                    <form action="carrello.php" method="post">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Prodotto</th>
                                <th>Prezzo</th>
                                <th>Quantità</th>
                                <th>Importo</th>
                                <th>MODIFICA</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            get_Carrello();
                            ?>
                            <!-- <tr>
                                  <td>apple</td>
                                  <td>$23</td>
                                  <td>3</td>
                                  <td>2</td>
                                  <td><a class="btn btn-success" href="#" role="button">Aggiungi</a></td>
                                  <td><a class="btn btn-warning" href="carrello.php?remove=1" role="button">Rimuovi</a></td>
                                  <td><a class="btn btn-danger" href="carrello.php?delete=1" role="button">Cancella</a> </td>
                              </tr>  -->
                            </tbody>
                        </table>

                        <input type="hidden" name="upload">
                        <input type="image" src="https://www.paypalobjects.com/it_IT/IT/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="paga subito">
                        <img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-5 ">
                    <h2>Riepilogo ordine</h2>

                    <table class="table table-bordered" cellspacing="0">

                        <tr class="cart-subtotal">
                            <th>Articoli:</th>
                            <td><span class="amount"><?php echo $_SESSION['N_Articoli'];?></span></td>
                        </tr>
                        <tr class="shipping">
                            <th>Spedizione</th>
                            <td>Gratuita</td>
                        </tr>

                        <tr class="order-total">
                            <th>Totale ordine</th>
                            <td><strong><span class="amount">€<?php echo $_SESSION['Tot_Articoli'];?></span></strong> </td>
                        </tr>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>

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
