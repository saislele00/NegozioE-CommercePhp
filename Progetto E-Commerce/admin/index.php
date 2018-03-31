<?php
require_once "../config.php";
is_Admin();
if(isset($_POST['Aggiorna']))
{
    $check_Manu=$_POST['checkManu'];
    setManu($check_Manu);
}
if(isset($_GET['Logout']))
{
    Logout();
}
?>
<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pannello Admin</title>

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
                        <a href="Vedi_Prodotti.php" class="nav-link"><i class="material-icons">store</i> Vedi Prodotti</a>
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
                <!-- /.row -->

                <div class="row">
                   
                    <div class="col-xl-4 col-lg-6">
                        <div class="card card-green card-inverse">
                            <div class="card-header card-green">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="material-icons md-48">shopping_cart</i>
                                    </div>
                                    <div class="col-xs-9 text-xs-right">
                                        <div class="huge">12</div>
                                        <div>Prodotti</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer card-green">
                                <a href="Vedi_Prodotti.php">
                                    <span class="pull-xs-left">Dettagli</span>
                                    <span class="pull-xs-right"><i class="material-icons">remove_red_eye</i></span>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="card card-yellow card-inverse">
                            <div class="card-header card-yellow">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="material-icons md-48">card_giftcard</i>
                                    </div>
                                    <div class="col-xs-9 text-xs-right">
                                        <div class="huge">124</div>
                                        <div>Nuovi ordini</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer card-yellow">
                                <a href="javascript:;">
                                    <span class="pull-xs-left">Dettagli</span>
                                    <span class="pull-xs-right"><i class="material-icons">remove_red_eye</i></span>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="card card-red card-inverse">
                            <div class="card-header card-red">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="material-icons md-48">library_books</i>
                                    </div>
                                    <div class="col-xs-9 text-xs-right">
                                        <div class="huge">13</div>
                                        <div>Categorie</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer card-red">
                                <a href="Categorie.php">
                                    <span class="pull-xs-left">Dettagli</span>
                                    <span class="pull-xs-right"><i class="material-icons">remove_red_eye</i></span>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <br>
                <br>
<div class="row">
                    <div class="col-xl-6 col-lg-6 my-5">
                        <div class="card card-default">
                            <div class="card-header card-default">
                                <i class="material-icons">euro_symbol</i> Transazioni
                            </div>
                            <div class="card-block">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Ordine #</th>
                                                <th>Giorno </th>
                                                <th>Ora </th>
                                                <th>Importo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>3326</td>
                                                <td>10/10/2017</td>
                                                <td>3:29 PM</td>
                                                <td>€321.33</td>
                                            </tr>
                                            <tr>
                                                <td>3326</td>
                                                <td>10/10/2017</td>
                                                <td>3:29 PM</td>
                                                <td>€321.33</td>
                                            </tr>
                                            <tr>
                                                <td>3326</td>
                                                <td>10/10/2017</td>
                                                <td>3:29 PM</td>
                                                <td>€321.33</td>
                                            </tr>
                                            <tr>
                                                <td>3326</td>
                                                <td>10/10/2017</td>
                                                <td>3:29 PM</td>
                                                <td>€321.33</td>
                                            </tr>
                                            <tr>
                                                <td>3326</td>
                                                <td>10/10/2017</td>
                                                <td>3:29 PM</td>
                                                <td>€321.33</td>
                                            </tr>
                                            <tr>
                                                <td>3326</td>
                                                <td>10/10/2017</td>
                                                <td>3:29 PM</td>
                                                <td>€321.33</td>
                                            </tr>
                                            <tr>
                                                <td>3326</td>
                                                <td>10/10/2017</td>
                                                <td>3:29 PM</td>
                                                <td>€321.33</td>
                                            </tr>
                                            <tr>
                                                <td>3326</td>
                                                <td>10/10/2017</td>
                                                <td>3:29 PM</td>
                                                <td>€321.33</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-xs-right">
                                    <a href="javascript:;">Vedi tutti i movimenti </a>
                                </div>
                            </div>
                        </div>
                    </div>
    <div class="container">
        <h2>Manutenzione Sito</h2>
        <p>Stato Attuale: <?php checkManu();?></p>
        <form action="index.php" method="post">
            <label class="radio-inline">
                <input type="radio" name="checkManu" value="0">Disattiva Manutenzione
            </label>
            <label class="radio-inline">
                <input type="radio" name="checkManu" value="1">Effettua Manutenzione
            </label>
            <input type="submit" name="Aggiorna" value="Aggiorna" class="btn btn-success">
        </form>
    </div>
                </div>
                <!-- /.row -->
            </div>
            </div>
            <!-- /.container-fluid -->

        <!-- /#page-wrapper -->
    </div>
    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

   

</body>

</html>
