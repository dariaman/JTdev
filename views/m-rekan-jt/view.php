<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MRekanJt */

$this->title = $model->rekanId;
$this->params['breadcrumbs'][] = ['label' => 'Mrekan Jts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mrekan-jt-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->rekanId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->rekanId], [
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
            'rekanId',
            'rekanNamaLengkap',
            'rekanKelamin',
            'rekanSpesifikasi',
            'rekanAlamat',
            'rekanEmail:email',
            'rekanWebsite',
            'rekanKota',
            'rekanKelurahan',
            'rekanKecamatan',
            'rekanDaerah',
            'rekanKodePos',
            'rekanNoHp',
            'rekanKendaraan',
            'rekanKendaraanNopol',
            'rekanStatus',
        ],
    ]) ?>

</div>
