<?php
define('APP_ROOT',realpath(__DIR__.'/../').'/');

require_once APP_ROOT.'class/DBConnector.class.php';
require_once APP_ROOT.'class/AppController.class.php';
require_once APP_ROOT.'vendor/autoload.php';

$APP = new AppController($_REQUEST['route']);
$APP->run();

print $APP->output();