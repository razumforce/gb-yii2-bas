<?php
use yii\bootstrap\Html;
use yii\helpers\Url;

?>

<table class="<?= $cssTable; ?>">
  <tr>
    <th>Дата</th>
    <th>Событие</th>
    <th>Всего событий</th>
  </tr>
  <?php foreach ($tasks as $day => $events): ?>
  <tr class="<?= $cssRow; ?>">
    <td><span class="<?= $cssCell; ?>"><?= $day + 1; ?></span></td>
    <td>
      <?= (count($events) > 0) ?
        '<p>' . $events[0]->title . '</p><p class="' . $cssCellEvent .'">' .
        $events[0]->description . '</p>' : 'Нет событий'
      ?>
    </td>
    <td class="<?= $cssEvent; ?>">
      <?= (count($events) > 0) ? Html::a(count($events), Url::to(['task/events', 'date' => $events[0]->date])) : 'нет данных для отображения' ?>
    </td>
  </tr>

  <?php endforeach; ?>

</table>
