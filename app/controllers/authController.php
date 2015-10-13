<?php require_once __DIR__ . '/../init.php';



switch($_POST['type']){
    case 'login':
        if (login($_POST['username'],
            $_POST['password']))
        {
            header('location:http://localhost/barrocitprogram/BarrocITProgram/public/views/admin/dashboard.php');
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
        return false;
    }

    $sql = "SELECT * FROM tbl_users WHERE username = :username";
    $q = $db->prepare($sql);
    $q->bindParam(':username', $username);
    $q->execute();

    //Hier wordt gecheckt of het aantal rijen grooter is dan 0 of gelijk is aan 1
    // als dat zo is kom de username overeen want hierboven check je of
    // de username erin staat als dat zo is, is er 1 dus groter dan 0
    if ($q->rowcount() > 0) {
        $user = $q->fetch();
        if (password_verify($password, $user['password'])) {
            //we got a winner!!
            //zorg ervoor dat dit true of false returned
            //zodat er niet hier geredirect wordt maar dat later kan worden gebruikt
            return true;
        }
    }

    switch ($_POST) {
        case '1';
            if ($_POST['id'] === 1) {
                header('location:http://localhost/barrocitprogram/BarrocITProgram/public/views/admin/dashboard.php');
            }
            // check if $_POST['id']; === 1
            //then redirect to admin/dashboard.php
            break;

        case '2';
            if ($_POST['id'] === 2) {
                header('location:http://localhost/barrocitprogram/BarrocITProgram/public/views/sales/dashboard.php');
            }
            // check if $_POST['id']; === 2
            //then redirect to sales/dashboard.php
            break;

        case '3';
            if ($_POST['id'] === 3) {
                header('location:http://localhost/barrocitprogram/BarrocITProgram/public/views/finance/dashboard.php');
            }
            // check if $_POST['id']; === 3
            //then redirect to finance/dashboard.php
            break;

        case '4';
            if ($_POST['id'] === 4) {
                header('location:http://localhost/barrocitprogram/BarrocITProgram/public/views/development/dashboard.php');
            }
            // check if $_POST['id']; === 4
            //then redirect to development/dashboard.php
            break;

    }
}
