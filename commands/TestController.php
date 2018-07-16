<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

/**
* Test class.
*
*/

class TestController extends Controller
{
    public $url;
    public $title;

    public function options($actionID)
    {
        return array_merge(parent::options($actionID), [
            'url',
            'title'
        ]);
    }

    public function optionAliases()
    {
        return array_merge(parent::optionAliases(), [
            'u' => 'url',
            't' => 'title'
        ]);
    }

    public function actionIndex($name = '-')
    {
        echo 'User name: ' . $name . PHP_EOL;
        echo 'Test works' . PHP_EOL;

        return ExitCode::OK;
    }

    /**
    * test info method
    * @param string $message Message to display
    *
    *
    */

    public function actionInfo($message = '***')
    {
        $this->stdout('Полное форматирование: ' . $message, Console::FG_GREEN);
        // echo 'Message: ' . $message . PHP_EOL;
        $urlFormat = $this->ansiFormat($this->url, Console::BG_YELLOW);
        echo PHP_EOL . 'URL (parameter) = ' . $urlFormat . PHP_EOL;
        echo 'TITLE (parameter) = ' . $this->title . PHP_EOL;
        echo 'Info works' . PHP_EOL;

        return ExitCode::OK;
    }
}
