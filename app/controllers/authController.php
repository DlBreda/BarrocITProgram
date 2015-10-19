<?php require_once __DIR__ . '/../init.php';



switch($_POST['type']) {
    case 'login':
        if (login($_POST['username'],
            $_POST['password'])){

        } else {
            header('location: ' . HTTP_PATH . '/public/');
        }
        break;

    case 'logout':
            if (logout()) {
                header('location: ' . HTTP_PATH . '/public/');
            } else {

            }

        break;

    case 'register':

        break;

}


function login($username, $password)
{
    global $db;
    global $messageBag;

    if (empty($username) || empty($password)) {
        $messageBag->add('a', 'Een of meerdere verplichten velden zijn niet ingevuld.');
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
        $user = $q->fetch(PDO::FETCH_ASSOC);

        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        if (password_verify($password, $user['password'])) {
            switch ((int)$user['id']) {
                case 1:
                    header('location:' . HTTP_PATH . 'public/views/dashboards/admin.php');
                    break;

                case 2:
                    header('location:' . HTTP_PATH . 'public/views/dashboards/sales.php');
                    break;

                case 3:
                    header('location:' . HTTP_PATH . 'public/views/dashboards/finance.php');
                    break;

                case 4:
                    header('location:' . HTTP_PATH . 'public/views/dashboards/development.php');
                    break;

                default:
                    header('location:' . HTTP_PATH . 'public/');

            }
            exit;
        }
    }
    header('location:');
}


function logout () {
    global $messageBag;
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    $messageBag->add('s', 'U bent succesvol uitgelogd!');
    return true;
}

