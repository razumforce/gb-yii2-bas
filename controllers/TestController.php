<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\QuestionForm;

class TestController extends Controller {

  public function actionIndex() {
    $data = [
      'name' => 'First name',
      'date' => date('j.m.Y')
    ];

    return $this->render('index', [
      'dataView' => $data
    ]);
  }

  public function actionPost() {
    return $this->render('post');
  }

  public function actionQuestion() {
    $model = new QuestionForm();

    return $this->render('question', [
      'modelView' => $model
    ]);
  }

  public function actionTabs() {
    $itemsTabs = [
      [
        'label' => 'First Tab',
        'content' => 'first tab content',
        'active' => true
      ],
      [
        'label' => 'Second Tab',
        'content' => 'second tab content',
        'options' => [
          'id' => 'second-tab',
        ],
        'headerOptions' => []
      ],
      [
        'label' => 'Third Tab',
        'content' => 'third tab content'
      ]
    ];

    return $this->render('tabs', [
      'tabsItemsConfig' => $itemsTabs
    ]);
  }

}
