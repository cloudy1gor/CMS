<?php

use tst\Router;

Router::add('^admin/?$', ['controller' => 'Main', 'action' => 'index', 'admin_prefix' => 'admin']);
Router::add('^admin/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['admin_prefix' => 'admin']);
// ^ - начало
// $ - конец строки
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
// будет присутствовать набор символов, который будет записан с ключём контроллер
Router::add('^(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)/?$');