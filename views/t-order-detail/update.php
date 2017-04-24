<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TOrderDetail */

$this->title = 'Update Torder Detail: ' . $model->orderDetailId;
$this->params['breadcrumbs'][] = ['label' => 'Torder Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->orderDetailId, 'url' => ['view', 'id' => $model->orderDetailId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="torder-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
