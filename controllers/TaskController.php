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
    public function actionIndex()
    {
        $model = new Task();
        $modelPeriod = new CalendarperiodForm();

        $formMonth = null;
        $formYear = null;

        if ($modelPeriod->load(Yii::$app->request->post())) {
            $formMonth = $modelPeriod->month;
            $formYear = $modelPeriod->year;
        }

        $tasks = $model->getDaysAndEvents(0, $formMonth, $formYear);

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
