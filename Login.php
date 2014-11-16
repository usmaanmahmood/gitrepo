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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
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

    <form class="form-signin" role="form" method="post" action="LoginCheck.php">
        <h2 class="form-signin-heading">Please log in</h2>
        <input type="text" class="form-control" placeholder="Central Username" name="username" id="username" required
               autofocus maxlength=8 value="mahmoou1">
        <input type="password" class="form-control" placeholder="Web Password" name="password" id="password" required
               value="webpassword">
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="submit">Sign in</button>
        <?php
        if (isset($_GET["error"])) {
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

</body>
</html>