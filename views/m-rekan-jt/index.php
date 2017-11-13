<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MRekanJtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rekan Tukang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mrekan-jt-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p align="right">
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
                'header' => 'ID',
                'width' => '60px',
                'attribute' => 'rekanId',
            ],
            [
                'header' => 'Nama Rekan Tukang',
                'attribute' => 'rekanNamaLengkap',
            ],
            [
                'header' => 'Jenis Kelamin',
                'attribute'=>'rekanKelamin',
                'value'=>function ($model) {
                    if($model->rekanKelamin == 'P')
                        return 'Perempuan';
                    else return 'Laki-laki';
                },
            ],
            [
                'header' => 'Spesialisasi',
                'attribute' => 'rekanSpesifikasi',
            ],

            // 'rekanEmail:email',
            // 'rekanWebsite',
            // 'rekanKota',
            // 'rekanKelurahan',
            // 'rekanKecamatan',
            // 'rekanDaerah',
            // 'rekanKodePos',
            'rekanNoHp',
            // 'rekanKendaraan',
            // 'rekanKendaraanNopol',
            'rekanAlamat',
            [
                'label' => 'IsActive',
                'width' => '100px',
                'hAlign' => 'center',
                'class' => 'kartik\grid\BooleanColumn',
                'attribute' => 'rekanStatus',
            ],

            ['class' => 'yii\grid\ActionColumn','template'=>'{update}'],
        ],
    ]); ?>
</div>
