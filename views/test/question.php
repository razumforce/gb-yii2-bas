<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

// print_r($modelView);
?>

<div class="row">
  <div class="col-lg-12">
    <?php $formQuestion = ActiveForm::begin(); ?>
    <div>
      <?= $formQuestion->field($modelView, 'name')->textInput() ?>
    </div>
    <div>
      <?= $formQuestion->field($modelView, 'email')->textInput() ?>
    </div>
    <div>
      <?= $formQuestion->field($modelView, 'question')->textArea() ?>
    </div>
    <div>
      <?= Html::submitButton('Отправить', [
        'class' => 'btn btn-success'
      ]) ?>
    </div>
    <?php ActiveForm::end(); ?>
  </div>
</div>