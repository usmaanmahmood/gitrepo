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

    <title>Register | ARCADE</title>
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

        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }

        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="password"] {
            margin-bottom: -1px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>

<body>

<div class="container">

    <form class="form-signin" role="form" method="post" action="RegisterCheck.php">
        <h2 class="form-signin-heading">Registration Form</h2>
        <input type="text" class="form-control" placeholder="Central University Username" name="centralusername" required autofocus
               maxlength=8>
        <input type="password" class="form-control" placeholder="Web App Password" name="webpassword" required>
        <input type="password" class="form-control" placeholder="ARCADE Password" name="arcadepassword" required>ARCADE password finder:<br/><pre>cat $HOME/.ARCADE/serverAuthentication</pre>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    </form>
    <?php
    if (isset($_GET["message"]) && $_GET["message"] == 1) {
        ?>
        <div class="alert alert-danger" role="alert"><b>Oh snap!</b> Change a few things up and try submitting
            again.
        </div>
    <?php
    }
    ?>
    </form>

</div>
<!-- /container -->



    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {

        // } document ready in template end

<?php include("template-end.php"); ?>