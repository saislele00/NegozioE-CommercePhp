<?php
require_once "../config.php";
if(isset($_POST['Login']))
{
    $Usr=$_POST['Username'];
    $Psw=$_POST['Password'];
    Login($Usr,$Psw);
}
?>
<html>
<head>
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,600,700');

        .login{
            font-family: 'Josefin Sans', sans-serif;
            background: #f4f4f4;
            padding:70px 0px;
        }

        h1{
            font-weight:600;
            font-family: 'Josefin Sans', sans-serif;
            text-transform:capitalize;
            text-align:center;
            color:#FFF;
            background:#72d6f5;
            padding:25px 0px;
        }

        form{
            padding:80px;
        }

        .inner-form{
            background:#FFF;
            box-shadow: 0 2px 4px 0 rgba(0,0,0,0.4);
        }

        label{
            font-weight:400;
            font-size:15px;
        }

        .form-control {
            background-color: #f5f5f5;
            box-shadow: none;
            color: #565656;
            font-size:14px;
            padding:30px 10px;
            margin-bottom:30px;
            border: 1px solid #f1f1f1;
        }

        .btn{
            background: #72d6f5;
            color: #FFF;
            border-radius: 6px;
            margin: 0 auto;
            height: 48px;
            line-height: 38px;
            display: table;
            font-size: 15px;
            width: 100%;
        }

        .btn:hover{
            background:#FFF;
            border:2px solid #24acb3;
        }

        .forgot{
            text-align:center;
            margin-top:30px;
            font-size:16px;
        }

        input[type=text], input[type=password], input[type=email] {
            background-color: transparent;
            border: none;
            border-bottom: 1px solid #72d6f5;
            border-radius: 0;
            width: 100%;
            margin: 0 0 30px 0;
            padding: 0;
            box-shadow: none;
        }


        input[type=text]:focus, input[type=password]:focus, input[type=email]:focus {
            box-shadow: none;
            border-bottom: 1px solid #6eafc4;
        }

    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!--
    youtube:  https://www.youtube.com/channel/UCqlv40k1N0L9nsSrzL1OWwg/videos
    site:     http://www.templateindirr.com
-->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<div class="login">
    <div class="container">
        <div class="col-lg-6 col-lg-offset-3">

            <div class="inner-form">

                <h1>Accedi Alla Sezione Admin</h1>

                <form role="form" action="Login.php" method="post">
                    <div class="row">

                        <div class="col-lg-12">
                            <label>Username</label>
                            <div class="form-group">
                                <input type="text" name="Username" id="email" class="form-control" placeholder="Nome Utente" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <label>Password</label>
                            <div class="form-group">
                                <input type="password" name="Password" id="password" class="form-control" placeholder="Password" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <input type="submit" value="ACCEDI" name="Login" class="btn btn-default">
                        </div>


                    </div>
                </form>

            </div> <!-- inner-form -->

        </div>
    </div>
</div>
</body>
</html>
