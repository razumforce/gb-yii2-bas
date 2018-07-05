<?php

use yii\bootstrap\Html;
use yii\helpers\Url;

?>

<?php echo $this->render('_calendarperiod', ['modelPeriod' => $modelPeriod]); ?>

<table class="table table-bordered">
  <tr>
    <th>Дата</th>
    <th>Событие</th>
    <th>Всего событий</th>
  </tr>
  <?php foreach ($tasks as $day => $events): ?>
  <tr class="td-date">
    <td><span class="label label-success"><?= $day; ?></span></td>
    <td>
      <?= (count($events) > 0) ? 
        '<p>' . $events[0]->title . '</p><p class="small">' .
        $events[0]->description . '</p>' : 'Нет событий'
      ?>
    </td>
    <td class="td-event">
      <?= (count($events) > 0) ? Html::a(count($events), Url::to(['task/events', 'date' => $events[0]->date])) : 'нет данных для отображения' ?>
    </td>
  </tr>

  <?php endforeach; ?>
  
</table>