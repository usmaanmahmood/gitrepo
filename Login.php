<?php
/**
 * Created by PhpStorm.
 * User: mmapxum2
 * Date: 16/11/14
 * Time: 18:00
 */
//include 'config.php';
?>

    <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.2/lumen/bootstrap.min.css" rel="stylesheet" title="main">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <title>Login | ARCADE</title>
        <style>
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #eee;
            }

            .form-signin {
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
            }

            .form-signin .form-control:focus {
                z-index: 2;
            }
        </style>
    </head>

<body>

    <div class="container text-center">
        <h1>Web ARCADE</h1>
        <div class="col-md-6">
            <form class="form-signin" role="form" method="post" action="LoginCheck.php">
                <h1 class="form-signin-heading">Main login</h1>

                <div class="input-group input-group-lg">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                </span>
                    <input type="text" class="form-control" placeholder="Central Username" name="username" id="username"
                           required
                           autofocus maxlength=8>
                </div>
                <div class="input-group input-group-lg">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-lock"></span>
                </span>
                    <input type="password" class="form-control" placeholder="Web Password" name="password" id="password"
                           required>
                </div>

                <span>This is not your central univeristy password. If this is your first time, you must register or use the temporary login.</span>
                <br/>
                <button class="btn btn-lg btn-primary btn-block" type="submit" id="submit"><span
                        class="glyphicon glyphicon-log-in"></span> Log in
                </button>

                <?php
                if (isset($_GET["message"]) && $_GET["message"] == 1) {
                    ?>
                    <div class="alert alert-danger" role="alert"><b>Oh snap!</b> Change a few things up and try
                        submitting
                        again.
                    </div>
                <?php
                } else if (isset($_GET["message"]) && $_GET["message"] == 2) {
                    ?>
                    <div class="alert alert-success" role="alert"><b>Thanks for using ARCADE!</b><br/>Please send any
                        feedback /
                        suggestions to usmaanmahmood@hotmail.com
                    </div>
                <?php
                }
                ?>
            </form>
            <p>Not registered? <a href="Register.php">Register easy &amp; quickly here!</a></p>
        </div>

        <div class="col-md-6">
            <form class="form-signin" role="form" method="post" action="TempLogin.php">
                <h1>Temporary login<br/>
                    <small>Lasts as long as the session</small>
                </h1>
                <div class="input-group input-group-lg">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                </span>
                    <input type="text" class="form-control" placeholder="Central Username" name="tempusername"
                           id="tempusername"
                           required
                           autofocus maxlength=8>
                </div>
                <div class="input-group input-group-lg">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-lock"></span>
                </span>
                    <input type="password" class="form-control" placeholder="ARCADE Password" name="arcadepassword"
                           id="arcadepassword"
                           required>
                </div>
                ARCADE password finder:<br/>
                <pre>cat $HOME/.ARCADE/serverAuthentication</pre>
                <button class="btn btn-lg btn-primary btn-block" type="submit" id="submit"><span
                        class="glyphicon glyphicon-log-in"></span> Log in
                </button>
            </form>
        </div>
    </div>
    <!-- /container -->


    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {

        // } document ready in template end

<?php include("template-end.php"); ?>