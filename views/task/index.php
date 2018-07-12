<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
use app\widgets\CalendarWidget;

?>

<?php echo $this->render('_calendarperiod', ['modelPeriod' => $modelPeriod]); ?>

<?= CalendarWidget::widget([
  'tasks' => $tasks
]); ?>
