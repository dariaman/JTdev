<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TOrderDetail */

$this->title = $model->orderDetailId;
$this->params['breadcrumbs'][] = ['label' => 'Torder Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="torder-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->orderDetailId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->orderDetailId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'orderDetailId',
            'orderId',
            'serviceDetailId',
            'kapasitasId',
            'rekanId',
            'orderDetailTglKerja',
            'orderDetailWaktuKerja',
            'orderDetailKeluhan',
            'orderDetailNote',
            'orderDetailStatus',
            'orderDetailQTY',
            'orderDetailProperti',
        ],
    ]) ?>

</div>
