<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MRekanJtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rekan Tukang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mrekan-jt-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'rekanId',
            'rekanNamaLengkap',
            'rekanKelamin',
            'rekanSpesifikasi',
            'rekanAlamat',
            // 'rekanEmail:email',
            // 'rekanWebsite',
            // 'rekanKota',
            // 'rekanKelurahan',
            // 'rekanKecamatan',
            // 'rekanDaerah',
            // 'rekanKodePos',
            // 'rekanNoHp',
            // 'rekanKendaraan',
            // 'rekanKendaraanNopol',
            // 'rekanStatus',

            ['class' => 'yii\grid\ActionColumn','template'=>'{update}{delete}'],
        ],
    ]); ?>
</div>
