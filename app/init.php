<?php

// Hier wordt gechecked of de sessie nog actief door in de cookies te kijken of PHPSESSID nog bestaat
// soort RememberME
session_start();
if ( session_status() === PHP_SESSION_ACTIVE && !empty( $_COOKIE['PHPSESSID'] ) ) {

    session_id($_COOKIE['PHPSESSID']);
}
    define('test', 'testje');

    define('SCHEME', 'http');

    define('ROOT', __DIR__ . '/../');
    define('PUBLIC_FOLDER', ROOT . 'public/');
    define('APP_FOLDER', ROOT . 'app/');
    define('ASSETS', PUBLIC_FOLDER . '/assets');


    define('HTTP', SCHEME . '://localhost:8888/');
//define ('HTTP', SCHEME . '://localhost/PHP-SP/');

    define('HTTP_PATH', 'http://localhost:8888/BarrocITProgram/');

    require_once __DIR__ . '/config/config.php';
    require_once __DIR__ . '/config/database.php';
