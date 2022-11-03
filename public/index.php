<?php

if (PHP_MAJOR_VERSION < 8) {
    die('PHP >= 8');
}

require_once dirname(__DIR__) . '/config/init.php';
require_once HELPERS . '/functions.php';
require_once CONFIG . '/routes.php';

new \tst\App();

//echo \tst\App::$app->getProperty('pagination');
//\tst\App::$app->setProperty('test', 'TEST');
//var_dump(\tst\App::$app->getProperties());

// debug(\wfm\Router::getRoutes());
