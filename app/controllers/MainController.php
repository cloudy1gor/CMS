<?php

namespace app\controllers;

use app\models\Main;
use tst\Controller;
// Наследуется от стандартного контроллера
/** @property Main $model */
class MainController extends Controller
{

    public function indexAction()
    {
        // echo __METHOD__;
        // $names = ['Volodymyr', 'Svyatoslav', 'Olha'];
        $names = $this->model->get_names();
        $this->setMeta('Главная страница', 'Description here', 'Keywords hre');
//        $this->set(['test' => 'TEST VAR', 'name' => 'John']);
//        $this->set(['names' => $names]);
        $this->set(compact('names'));
    }

}
