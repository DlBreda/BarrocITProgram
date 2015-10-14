<?php require_once __DIR__ . '/../init.php';



switch($_POST['type']){
    case 'login':
        if (login($_POST['username'],
            $_POST['password']))
        {
//            header('location:http://localhost/barrocitprogram/BarrocITProgram/public/views/admin/dashboard.php');
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
        $user = $q->fetchAll();

        if (password_verify($password, $user['password'])) {


            $_SESSION["user"] = $user;

            switch ($_SESSION["user"]) {
                case '1':
                    if($user['id'] === 1) {
                        header('http://www.youtube.com');
                    }
                    break;

                case '2':
                    if($user['id'] === 2) {
                        header('http://www.facebook.com');
                    }
                    break;
            }
        }
    }
}
