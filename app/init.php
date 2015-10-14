<?php

define('SCHEME', 'http');

define('ROOT', __DIR__ . '/../');
define('PUBLIC_FOLDER', ROOT . 'public/');
define('APP_FOLDER', ROOT . 'app/');
define('ASSETS', PUBLIC_FOLDER . '/assets');

define ('HTTP', SCHEME . '://localhost/PHP-SP/');

define ('HTTP_PATH', 'http://localhost/barrocitprogram/BarrocITProgram/');

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';