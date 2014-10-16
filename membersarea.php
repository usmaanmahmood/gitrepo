<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Prototype</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Web ARCADE</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#login">Login</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <h1>Heading</h1>
        <p class="lead">Lead paragraph</p>
	<p>Paragraph 2</p>
<p style="text-align:left;font-family:monospace,monospace;font-size:1em;">
<?php
	function queryServer($command)
	{
	 // create a new variable to hold the results
	 $results = '';

	 // create a new socket object
	 $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

	 // connect to the server on the specified port (4000).
	 // here, the server is 127.0.0.1, referring to the local machine,
	 // which is forwarded on to carousel (Section 5.2.1)
	 socket_connect ($sock , "carousel", 4000);

	 // log in to the server
	 socket_write($sock, "LKJHGFDSA\n");
	 socket_write($sock, "mahmoou1\n");
	 socket_write($sock, "LQKUGRIRDE\n");

	 // $command is the variable taken from the web application
	 socket_write($sock, $command);

	 // wait for the results
	 while ($line = socket_read($sock, "100000"))
	 {
	 	$results = $line;
		#$results .= "<br />";
	 }

	 // remember to shut down the server connection to
	 // allow other requests
	 $results.=socket_strerror(socket_last_error($sock));
	 socket_shutdown($sock, 2);
	 socket_close($sock);

	 // the results from the server are returned


	 return $results;
	}
	$string = $string);

	echo nl2br(str_replace(' ', '&nbsp;', queryserver("marks-table: all\n 11-12-1\n \n \n 162L 181L\n")));
?></p>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  </body>
</html>

