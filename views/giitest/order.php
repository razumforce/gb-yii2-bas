<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\UserProfile;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form ActiveForm */
?>
<div class="giitest-order">

    <?php $form = ActiveForm::begin(); ?>

        <?php // $form->field($model, 'user_id') ?>
        <?= $form->field($model, 'user_id')->dropDownList(
            UserProfile::find()->select(['login', 'id'])->indexBy('id')->column(),
            ['prompt' => 'Choose user:']
        ) ?>
        <?= $form->field($model, 'qty') ?>
        <?= $form->field($model, 'amount') ?>
        <?= $form->field($model, 'address') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- giitest-order -->
