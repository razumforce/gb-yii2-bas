<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StatLogin */

$this->title = 'Update Stat Login: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Stat Logins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stat-login-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
