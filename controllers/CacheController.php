<?php

namespace app\controllers;
use yii\web\Controller;
use Yii;

class CacheController extends Controller
{

  public function behaviors()
  {
    return [
      'myCache' => [
        'class' => 'yii\filters\PageCache',
        'duration' => 20,
        'only' => ['page1'],
      ]
    ];
  }

  public function actionFragment()
  {
    return $this->render('fragment');
  }

  public function actionPage1()
  {
    return $this->render('page1');
  }

}

?>
