<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
use app\widgets\CalendarWidget;

?>

<?php echo $this->render('_calendarperiod', ['modelPeriod' => $modelPeriod]); ?>

<?= CalendarWidget::widget([
  'cssTable' => 'table table-bordered',
  'cssRow' => 'td-date',
  'cssCell' => 'label label-primary', // изменил с label-success на label-primary
  'cssCellEvent' => 'td-event',
  'cssEvent' => 'small',
  'tasks' => $tasks
]); ?>
