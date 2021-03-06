<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class FirstWidget extends Widget
{
  public $message;

  public function init()
  {
    parent::init();
    if ($this->message == null) {
      $this->message = 'Default value';
    }
  }

  public function run()
  {
    return $this->render('firstwidget', [
      'message' => $this->message
    ]);
  }

}
