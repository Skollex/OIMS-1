<?php
$ID = $_POST["id"];

if ($ID === null)
{
	header("Location: /", true, 301);
	die();
}

include_once('db_connection.php');

// connect to db
$db = OpenDB(G_DB_NAME_FIRMEN);

// check connection
$db_status = CheckDBConnection($db);
if ($db_status != "OK")
{
	die($db_status); // error
}

// check Company's ID in DB
$sql = "SELECT Status FROM FirmenMainData WHERE FirmenID = '".$ID."'";

if($db_result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($db_result) > 0){
		// found
		$Status = mysqli_fetch_array($db_result)['Status'];
		
		// check status
		if ($Status === "1")
		{
			echo "OK";
		} else
		{
			// Status inactive
			echo "StatusInactive";
		}
		
        // Free result set
        mysqli_free_result($db_result);
    } else{
        echo "NotFound";
    }
} else{
    echo "DB_ERROR: Could not able to execute $sql. " . mysqli_error($db);
}

// Close connection
CloseDB($db);

?>