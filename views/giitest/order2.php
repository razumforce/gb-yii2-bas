<?php

use yii\bootstrap\Html;


?>

<?= Html::beginForm(); ?>

<div class="form-group">
  <?= Html::activeLabel($model, 'user_id') ?>
  <?= Html::activeInput('text', $model, 'user_id') ?>
</div>
<div class="form-group">
  <?php // Html::input('text', 'qty', '0') ?>
  <?= Html::activeLabel($model, 'qty') ?>
  <?= Html::activeInput('text', $model, 'qty') ?>
</div>
<div class="form-group">
  <?= Html::activeLabel($model, 'amount') ?>
  <?= Html::activeInput('text', $model, 'amount') ?>
</div>
<div class="form-group">
  <?= Html::activeLabel($model, 'address') ?>
  <?= Html::activeInput('text', $model, 'address') ?>
</div>
<div class="form-group">
  <?= Html::submitInput('Submit') ?>
</div>

<?= Html::endForm(); ?>
