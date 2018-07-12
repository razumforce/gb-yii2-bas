<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class SecondWidget extends Widget
{
  public function init()
  {
    parent::init();
    ob_start();
  }

  public function run()
  {
    $content = ob_get_clean();
    return '<div>' . $content . '</div>';
  }

}
