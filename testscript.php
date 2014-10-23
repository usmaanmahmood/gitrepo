<p style="font-family: "Lucida Console", Monaco, monospace">
<?php

function query($command)
{
	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP); // create new socket
	socket_connect ($socket , "carousel", 4000); // connect to arcade on port 4000

	socket_write($socket, "LKJHGFDSA\n"); // hello token
	socket_write($socket, "mahmoou1\n"); // arcade user
	socket_write($socket, "LQKUGRIRDE\n"); // arcade pass
	socket_write($socket, $command); // this sends it off

	$results = "";

	// accept data until remote host closes the connection
	while ($socketoutput = socket_read($socket, "100000"))
	{
		$results .= $socketoutput;
		$results .= "<br />";
	}

	$results.=socket_strerror(socket_last_error($socket)); // debugging
	socket_shutdown($socket, 2); // 2 = shutdown reading and writing
	socket_close($socket);

	return $results;
}

echo nl2br(query("marks-table: all\n 11-12-1\n \n \n 162L 181L\n"));

?></p>
