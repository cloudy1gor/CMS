<?php

namespace app\controllers;

use tst\Controller;
// Наследуется от стандартного контроллера
class MainController extends Controller
{

    public function indexAction()
    {
        echo __METHOD__;
    }

}