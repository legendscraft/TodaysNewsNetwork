<?php
	# Declare the database credentials
	$servername = "localhost";
	$username = "tnn_user";
	$password = "tnn";
	$dbname = "tnn";

	# Establish a connection 
	$conn = new mysqli($servername, $username, $password, $dbname);

	# Verify connection
	if($conn->connect_error){
		die('Connection failed!');
	}

	return $conn;
?>