<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\StatLogin;


class UserController extends Controller
{

    public function actionClear()
    {
        StatLogin::deleteAll();
        echo 'Таблица полностью очищена' . PHP_EOL;

        return ExitCode::OK;
    }

}
