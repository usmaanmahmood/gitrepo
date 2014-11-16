<?php include "template-head.php" ?>
<title>Sign in | ARCADE</title>
<style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</style>
</head>

<body>

    <div class="container">

      <form class="form-signin" role="form" method="post" action="checklogin.php">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="form-control" placeholder="Central Username" name="username" required autofocus maxlength=8 value="mahmoou1">
        <input type="password" class="form-control" placeholder="Web Password" name="password" required value="webpassword">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

<?php

// Load the configuration file containing your database credentials
require_once('config.inc.php');

$database_host = 'dbhost.cs.man.ac.uk';
$database_user = 'mmapxum2';
$database_pass = 'manchester';
$database_name = 'mmapxum2';

// Connect to the database
$mysqli = new mysqli($database_host, $database_user, $database_pass, $database_name);

// Check for errors before doing anything else
if($mysqli -> connect_error) {
    die('Connect Error ('.$mysqli -> connect_errno.') '.$mysqli -> connect_error);
}

// SELECT ALL THE THINGS
if($result = $mysqli -> query("SELECT * FROM User")) {
    printf("Select returned %d rows.\n", $result -> num_rows);

    $result -> close(); // Remember to release the result set
}

// Always close your connection to the database cleanly!
$mysqli -> close();
?>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

