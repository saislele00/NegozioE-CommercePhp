<?php
require_once "../config.php";
is_Admin();
if(isset($_GET['remove']))
{
    Elimina_Prod($_GET['remove']);
}
?>
<html>
<head>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/custom-admin.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700i" rel="stylesheet">
    <!--  material icon-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visione Prodotti</title>
</head>
<body>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-dark bg-inverse navbar-fixed-top">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button class="navbar-toggler hidden-md-up pull-md-right" type="button" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <i class="material-icons">menu</i>
            </button>
            <a class="navbar-brand" href="index.php">Pannello Admin</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-nav top-nav navbar-right pull-xs-right">

            <li class="dropdown nav-item">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="material-icons ">account_circle</i>Admin <b class="caret"></b></a>
                <ul class="dropdown-menu">

                    <a href="index.php?Logout=1"><i class="material-icons">power_settings_new</i> Log Out</a>

                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-toggleable-sm navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav list-group ">
                <li class="list-group-item ">
                    <a href="#" class="nav-link"><i class="material-icons">store</i> Vedi Prodotti</a>
                </li>
                <li class="list-group-item">
                    <a href="Add_Prodotto.php"><i class="material-icons">add_circle_outline</i>Aggiungi Prodotti</a>
                </li>
                <li class="list-group-item">
                    <a href="#"><i class="material-icons">supervisor_account</i>Ordini</a>
                </li>
                <li class="list-group-item">
                    <a href="Categorie.php"><i class="material-icons">folder_open</i>Categorie</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Pannello di amministrazione
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="material-icons">dashboard</i> Dashboard
                        </li>
                    </ol>
                </div>
            </div>
        <div class="row"
             <h3 class="mt-5">Tutti I Prodotti</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Prezzo</th>
                        <th>Magazzino</th>
                        <th>Operazioni</th>
                    </tr>
                </thead>
                <tbody>
                <?php get_ProdottiAdmin();?>
                </tbody>
            </table>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
</div>


<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>



</body>
</html>
