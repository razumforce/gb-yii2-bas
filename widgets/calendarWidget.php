<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class CalendarWidget extends Widget
{
  public $cssTable;
  public $cssRow;
  public $cssCell;
  public $cssCellEvent;
  public $cssEvent;
  public $tasks;

  public function init()
  {
    parent::init();
    if ($this->cssTable == null) {
      $this->cssTable = 'table table-bordered';
      $this->cssRow = 'td-date';
      $this->cssCell = 'label label-success';
      $this->cssCellEvent = 'td-event';
      $this->cssEvent = 'small';
    }
  }

  public function run()
  {
    return $this->render('calendar', [
      'cssTable' => $this->cssTable,
      'cssRow' => $this->cssRow,
      'cssCell' => $this->cssCell,
      'cssCellEvent' => $this->cssCellEvent,
      'cssEvent' => $this->cssEvent,
      'tasks' => $this->tasks
    ]);
  }

}
