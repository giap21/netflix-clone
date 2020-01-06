<?php 
ob_start(); // Turns on ouput buffering Wait until all the php code has been executed before outputting anything
session_start();

date_default_timezone_set("Europe/Berlin");

try {
	$con = new PDO("mysql:dbname=netflix;host=localhost", "root", "root");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch(PDOException $e) {
	exit("Connection failed: " . $e->getMessage());
}

?>