
<?php require_once __DIR__ .'/../../../app/init.php';


$username = "Development";
$password = "Development";


$hashed = password_hash($password, PASSWORD_DEFAULT);
echo $username;
echo $hashed;

$db->query($sql);

?>