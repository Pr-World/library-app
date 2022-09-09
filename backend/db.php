<?php

function db_connect($server, $uname, $pass, $dbname)
{
	try {
		$conn=new PDO("mysql:host=".$server.";dbname=".$dbname, $uname, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	} catch (PDOException $e) {
		echo " FATAL ERROR: DB CONNECTION FAILURE :- " . $e -> getMessage();
		return false;
	}
}

?>