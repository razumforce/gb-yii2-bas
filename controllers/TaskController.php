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

        $formMonth = date('n');
        $formYear = date('Y');

        $modelPeriod->month = $formMonth; // не совсем уверен, верно ли так устанавливать по умолчанию значение полей в форме
        $modelPeriod->year = $formYear;

        if ($modelPeriod->load(Yii::$app->request->post())) {
            $formMonth = $modelPeriod->month;
            $formYear = $modelPeriod->year;
        }

        $tasks = $model->getDaysAndEvents($formMonth, $formYear);

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
