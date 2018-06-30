<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Order;
use yii\data\ActiveDataProvider;

class GiitestController extends Controller
{
    public function actionAdd()
    {
        return $this->render('add');
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionOrder()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->save();
                return $this->redirect(['order']);
            }
        }

        return $this->render('order', [
            'model' => $model,
        ]);
    }

    public function actionOrder2()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->save();
                return $this->redirect(['order2']);
            }
        }

        return $this->render('order2', [
            'model' => $model,
        ]);
    }

    public function actionList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Order::find()->orderBy('qty DESC'),
            'pagination' => [
                'pageSize' => 2
            ]
        ]);

        return $this->render('list', [
            'dataProvider' => $dataProvider,
            'itemNameView' => '_order'
        ]);
    }

}
