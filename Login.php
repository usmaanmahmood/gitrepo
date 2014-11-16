<?php include "template-head.php";
?>
<title>Login | ARCADE</title>
<style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</style>
</head>

<body>

    <div class="container">

      <form class="form-signin" role="form" method="post" action="LoginCheck.php">
        <h2 class="form-signin-heading">Please log in</h2>
        <input type="text" class="form-control" placeholder="Central Username" name="username" id="username" required autofocus maxlength=8 value="mahmoou1">
        <input type="password" class="form-control" placeholder="Web Password" name="password" id="password" required value="webpassword">
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="submit">Sign in</button>
<?php
    if (isset($_GET["error"]))
    {
        ?>
        <div class="alert alert-danger" role="alert"><b>Oh snap!</b> Change a few things up and try submitting again.</div>
    <?php
    }
?>
      </form>

    </div> <!-- /container -->

</body>
</html>