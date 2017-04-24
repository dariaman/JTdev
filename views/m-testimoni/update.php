<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MTestimoni */

$this->title = 'Update Mtestimoni: ' . $model->testiId;
$this->params['breadcrumbs'][] = ['label' => 'Mtestimonis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->testiId, 'url' => ['view', 'id' => $model->testiId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mtestimoni-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
