<?php
	$servername = "localhost";
	$username = "root"; 
	$pass = ""; 
	$dbname = "bank"; 
	$konekcija = new mysqli($servername, $username, $pass, $dbname);
	if ($konekcija->connect_error) {
	    die("Connection failed: " . $konekcija->connect_error);
	}
?>  