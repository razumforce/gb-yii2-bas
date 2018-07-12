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
      ],
      [
        'label' => 'Dropdown',
        'items' => [
          [
            'label' => 'Tab A',
            'content' => 'tab a content'
          ],
          [
            'label' => 'Tab B',
            'content' => 'tab b content'
          ],
          [
            'label' => 'Tab C',
            'content' => 'tab c content'
          ]
        ]
      ],
      [
        'label' => 'Main page',
        'url' => '/'
      ]
    ];

    return $this->render('tabs', [
      'tabsItemsConfig' => $itemsTabs
    ]);
  }

  public function actionWidget1() {
    return $this->render('widget1');
  }

  public function actionWidget2() {
    return $this->render('widget2');
  }

}
