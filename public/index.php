<?php

if (PHP_MAJOR_VERSION < 8) {
    die('PHP >= 8');
}

require_once dirname(__DIR__) . '/config/init.php';

new \tst\App();

//echo \tst\App::$app->getProperty('pagination');
//\tst\App::$app->setProperty('test', 'TEST');
//var_dump(\tst\App::$app->getProperties());
