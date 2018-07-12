<?php

namespace app\controllers;

use Yii;
use app\models\Task;
use app\models\TaskSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use app\models\CalendarperiodForm;


class TaskController extends Controller
{

    // public function behaviors()
    // {
    //   return [
    //     'myCache' => [
    //       'class' => 'yii\filters\PageCache',
    //       'duration' => 20,
    //       'only' => ['index'],
    //     ]
    //   ];
    // }

    public function actionIndex()
    {
        $cache = Yii::$app->cache2; // cach2 = DummyCache

        $model = new Task();
        $modelPeriod = new CalendarperiodForm();

        $formMonth = date('n');
        $formYear = date('Y');

        $modelPeriod->month = $formMonth;
        $modelPeriod->year = $formYear;

        if ($modelPeriod->load(Yii::$app->request->post())) {
            $formMonth = $modelPeriod->month;
            $formYear = $modelPeriod->year;
        }

        $tasks = $cache->getOrSet('event', function() use($model, $formMonth, $formYear) {
          return $model->getDaysAndEvents($formMonth, $formYear);
        }, 15);

        return $this->render('index', [
            'tasks' => $tasks,
            'modelPeriod' => $modelPeriod
        ]);
    }

    public function actionEvents($date)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Task::find()->where(['date' => $date]),
            'pagination' => [
                'pageSize' => 1
            ]
        ]);

        return $this->render('events', [
            'dataProvider' => $dataProvider,
            'date' => date('j.m.Y', $date)
        ]);
    }
}
