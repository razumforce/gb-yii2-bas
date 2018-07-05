<?php

use yii\bootstrap\Html;

?>

<div>
  <h1>События календаря на <?= Html::encode($date); ?></h1>
  <?= \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_event'
  ]); ?>
</div>