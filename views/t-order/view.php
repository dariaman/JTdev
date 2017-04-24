<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TOrder */

$this->title = $model->orderId;
$this->params['breadcrumbs'][] = ['label' => 'Torders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="torder-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->orderId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->orderId], [
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
            'orderId',
            'orderTgl',
            'orderJenisBayar',
            'orderAlamat',
            'orderKota',
            'orderKelurahan',
            'orderKecamatan',
            'orderDaerah',
            'orderKodePos',
            'orderAlamatNote',
            'orderGpsKoordinat',
            'orderBiayaTransport',
            'orderStatus',
            'orderAlamatTambahanId',
        ],
    ]) ?>

</div>
