<?php

$dsn = 'mysql:host=localhost;dbname=adresboek';

$username = 'kimvg2';
$password = '6yhnji9';


try {
	$db = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
	echo $e->getMessage();
}
