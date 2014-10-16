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
 socket_connect ( $sock , "carousel.cs.man.ac.uk", 4000 );

 // log in to the server
 socket_write($sock, "LKJHGFDSA\n");
 socket_write($sock, "mahmoou1\n");
 socket_write($sock, "LQKUGRIRDE\n");

 // $command is the variable taken from the web application
 socket_write($sock, $command . "\n");

 // wait for the results
 while ($line = socket_read($sock, "10000"))
 {
	 // “++WORKING” is sent by the server to indicate that the
	 // request is being processed
	 if ($line != "++WORKING\n")
		 $results .= $line;
 }

 // remember to shut down the server connection to
 // allow other requests
 socket_shutdown($sock, 2);
 socket_close($sock);

 // the results from the server are returned
 return $results;
}

echo queryServer("registration-details: with lab groups(; ; ; )");
echo "hello";
?>
