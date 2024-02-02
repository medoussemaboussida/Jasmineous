<?php
	$email = 'root';
	$password = '';
	$conn = new PDO( 'mysql:host=localhost;dbname=user_db', $email, $password );
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}
?>

<?php

