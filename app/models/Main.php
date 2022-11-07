<?php

namespace app\models;

use RedBeanPHP\R;

class Main extends \tst\Model
{

    public function get_names(): array
    {
        return R::findAll('name');
    }

}