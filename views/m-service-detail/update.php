<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MServiceDetail */

$this->title = 'Update Service Detail: ' . $model->serviceDetailId;
$this->params['breadcrumbs'][] = ['label' => 'Service Detail', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->serviceDetailId, 'url' => ['view', 'id' => $model->serviceDetailId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mservice-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
