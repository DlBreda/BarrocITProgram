<?php require_once __DIR__ . '/../init.php';




$username = "Damian";
$password = "DamianBreda";

$hashed = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password)
        VALUES ('$username', '$hashed')";

$db->query($sql);
var_dump($_POST);



switch($_POST['type']){
    case 'login':
        login($_POST['username'],
            $_POST['password']);
        break;

    case 'logout':

        break;

    case 'register':

        break;

}


function login($username, $password) {
    global $db;

    if(empty($username) || empty($password)) {
        return false;
    }

    $sql = "SELECT * FROM users WHERE username = :username";
    $q = $db->prepare($sql);
    $q->bindParam(':username', $username);
    $q->execute();
    //Hier wordt gecheckt of het aantal rijen grooter is dan 0 of gelijk is aan 1
    // als dat zo is kom de username overeen want hierboven check je of
    // de username erin staat als dat zo is, is er 1 dus groter dan 0
    if($q->rowcount() > 0) {
        $user = $q->fetch();

        if(password_verify($password, $user['password'])) {
            //we got a winner!!
            //zorg ervoor dat dit true of false returned
            //zodat er niet hier geredirect wordt maar dat later kan worden gebruikt
            echo "nailed it..";
            die();
        }
    }

}









?>