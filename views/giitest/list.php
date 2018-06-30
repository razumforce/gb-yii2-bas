<?php use yii\widgets\ListView; ?>
<h1>Orders</h1>
<?= ListView::widget([
  'dataProvider' => $dataProvider,
  'itemView' => $itemNameView
]); ?>




