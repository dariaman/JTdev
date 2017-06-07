<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muser-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'userId',
            'userEmail:email',
            'userNamaDepan',
            'userNamaBelakang',
            'userKelamin',
            // 'userPassword',
            'userAlamat',
            [
                'header' => 'Nama Kota',
                'attribute' => 'userKota',
                'value' => 'kotaNama'
            ],
            [
                'header' => 'Nama Kelurahan',
                'attribute' => 'userKelurahan',
                'value' => 'kelurahanNama'
            ],
            [
                'header' => 'Nama Kecamatan',
                'attribute' => 'userKecamatan',
                'value' => 'kecamatanNama'
            ],
            'userDaerah',
            'userKodePos',
            'userNoTelp',
            'userNoHp',
            'userStatus',

            ['class' => 'yii\grid\ActionColumn','template' => '{update}'],
        ],
    ]); ?>
    
    <p>
        <?= Html::a('Tambah Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
