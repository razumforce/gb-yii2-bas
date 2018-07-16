<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StatLogin */

$this->title = 'Create Stat Login';
$this->params['breadcrumbs'][] = ['label' => 'Stat Logins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stat-login-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
