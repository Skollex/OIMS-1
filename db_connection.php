<?php
include_once('settings.php');

function OpenDB($database)
{
	return mysqli_connect(G_DB_HOST, G_DB_USER, G_DB_PASS, $database);
}

// Check connection
function CheckDBConnection($conn)
{
	if($conn === false){
		return "DB_ERROR: Could not connect. " . mysqli_connect_error();
	} else {
		return "OK";
	}
}

// Close connection
function CloseDB($conn)
{
	mysqli_close($conn);
}

?>