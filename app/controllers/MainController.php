<?php

namespace app\controllers;

use tst\Controller;
// Наследуется от стандартного контроллера
class MainController extends Controller
{

    public function indexAction()
    {
        // echo __METHOD__;
        $names = ['Volodymyr', 'Svyatoslav', 'Olha'];
        $this->setMeta('Главная страница', 'Description here', 'Keywords hre');
//        $this->set(['test' => 'TEST VAR', 'name' => 'John']);
//        $this->set(['names' => $names]);
        $this->set(compact('names'));
    }

}