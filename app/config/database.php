<?php

$dsn = 'mysql:host=localhost;dbname=mydb';

$username = 'root';
$password = 'Geheimpje119!';


try {
	$db = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
	echo $e->getMessage();
}
