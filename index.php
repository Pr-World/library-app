<?php

include './backend/db.php';

$db = db_connect('localhost', 'root', '', 'Library');

if(!$db){echo "-- Error occured."; die();}

if(isset($_COOKIE['user']))
{
	echo $_COOKIE['user'];
} else {
	header('location: sign/');
}