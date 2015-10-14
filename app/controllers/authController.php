<?php require_once __DIR__ . '/../init.php';



switch($_POST['type']) {
    case 'login':
        if (login($_POST['username'],
            $_POST['password'])){

        }
        break;

    case 'logout':

        break;

    case 'register':

        break;

}



function login($username, $password)
{
    global $db;

    if (empty($username) || empty($password)) {
        header('location:http://localhost/barrocitprogram/BarrocITProgram/public/');
        exit;
    }

    $sql = "SELECT * FROM tbl_users WHERE username = :username";
    $q = $db->prepare($sql);
    $q->bindParam(':username', $username);
    $q->execute();

    //Hier wordt gecheckt of het aantal rijen grooter is dan 0 of gelijk is aan 1
    // als dat zo is kom de username overeen want hierboven check je of
    // de username erin staat als dat zo is, is er 1 dus groter dan 0
    if ($q->rowcount() > 0) {
        $user = $q->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $user['password'])) {
            switch ((int)$user['id']) {
                case 1:
                    header('location:http://localhost/barrocitprogram/BarrocITProgram/public/views/admin/dashboard.php');
                    break;

                case 2:
                    header('location:http://localhost/barrocitprogram/BarrocITProgram/public/views/sales/dashboard.php');
                    break;

                case 3:
                    header('location:http://localhost/barrocitprogram/BarrocITProgram/public/views/finance/dashboard.php');
                    break;

                case 4:
                    header('location:http://localhost/barrocitprogram/BarrocITProgram/public/views/development/dashboard.php');
                    break;

                default:
                    header('location:http://localhost/barrocitprogram/BarrocITProgram/public');

            }
            exit;
        }
    }
    header('location:');
}
