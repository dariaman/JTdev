<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MKapasitasDetail */

$this->title = $model->kapasitasId;
$this->params['breadcrumbs'][] = ['label' => 'Mkapasitas Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mkapasitas-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kapasitasId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kapasitasId], [
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
            'kapasitasId',
            'kapasitasJudul',
            // 'kapasitasHarga',
             [
                'label'=>'Harga',
                'value'=>'RP '.number_format($model->kapasitasHarga,2)
            ],
            [
                'label'=>'Status',
                'format'=>'raw',
                'value'=>$model->kapasitasStatus ? '<span class="glyphicon glyphicon-ok"></span':'<span class="glyphicon glyphicon-remove"></span'
            ],
            // 'kapasitasStatus',
            'servicejuduldetail',
            'kapasitasDeskripsi:ntext',
        ],
    ]) ?>

</div>
