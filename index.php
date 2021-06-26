<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('login', 'DefaultController');
Routing::get('dashboard', 'DashboardController');
Routing::get('settings', 'DefaultController');

Routing::post('login', 'SecurityController');
Routing::post('updatePhoto', 'SettingsController');
Routing::post('createLog', 'DashboardController');


Routing::run($path);
