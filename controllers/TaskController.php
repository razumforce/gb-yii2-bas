<?php

namespace app\controllers;

use Yii;
use app\models\Task;
use app\models\TaskSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * UserController implements the CRUD actions for UserProfile model.
 */
class TaskController extends Controller
{
    public function actionIndex()
    {
        $model = new Task();
        $tasks = $model->getDaysAndEvents();

        return $this->render('index', [
            'tasks' => $tasks
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
