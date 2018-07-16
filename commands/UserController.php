<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\StatLogin;


class UserController extends Controller
{

    public function actionClear()
    {
        $deleteTime = time() - 180;

        StatLogin::deleteAll('time < :time', [':time' => $deleteTime]);
        echo 'Все записи более чем 180 секунд назад - очищены' . PHP_EOL;

        return ExitCode::OK;
    }

}
