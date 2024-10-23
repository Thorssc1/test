<?php
//define('APP_ROOT', dirname(__DIR__, 2));

// Load Config
require_once '../config/config.php';

//DB Connect
//require_once APP_ROOT.'/app/src/Class/DBConnector.php';

// Autoloader
require_once APP_ROOT.'/vendor/autoload.php';

// Routes
require_once APP_ROOT.'/routes/web.php';
require_once APP_ROOT.'/Router.php';
