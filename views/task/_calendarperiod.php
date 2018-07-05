<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<div class="row">
  <div class="col-lg-2">
    <?php $formPeriod = ActiveForm::begin(); ?>
    <div>
      <?= $formPeriod->field($modelPeriod, 'month')->textInput() ?>
    </div>
    <div>
      <?= $formPeriod->field($modelPeriod, 'year')->textInput(['value' => date('Y')]) ?>
    </div>
    <div>
      <?= Html::submitButton('Показать события', [
        'class' => 'btn btn-success'
      ]) ?>
    </div>
    <?php ActiveForm::end(); ?>
  </div>
</div>