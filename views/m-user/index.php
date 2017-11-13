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
            [
                'header' => 'Email',
                'format' => 'raw',
                'attribute'=>'userEmail',
                // 'contentOptions' => ['Align' => 'center','style' => 'width: 50px;'],
                // 'headerOptions' => ['style' => 'text-align:center'],
                'value' => function($data){
                    return Html::a($data['userEmail'],['update','id' => $data['userId']]);
                }
            ],

//            'userId',
            // 'userEmail:email',
            // [
            //     'header' => 'Nama',
            //     // 'format' => 'raw',
            //     // 'contentOptions' => ['Align' => 'center','style' => 'width: 50px;'],
            //     // 'headerOptions' => ['style' => 'text-align:center'],
            //     'value' => function($data){
            //         return $data['userNamaDepan'] . ' ' . $data['userNamaBelakang'];
            //         // Html::a($data['userEmail'],['update','id' => $data['userId']]);
            //     }
            // ],

            'userNamaDepan',
            'userNamaBelakang',
            // 'userKelamin',
            [
                'header' => 'JenisKelamin',
                // 'attribute'=>'userKelamin',
                // 'contentOptions' => ['Align' => 'center','style' => 'width: 50px;'],
                // 'headerOptions' => ['style' => 'text-align:center'],
                'value' => function($data){
                    if($data['userKelamin']=='L'){
                        return 'Laki-laki';
                    }else{
                        return 'Perempuan';
                    }
                }
            ],
            'userNoHp',
            'userNoTelp',

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
            [
                'label' => 'IsActive',
                'width' => '100px',
                'hAlign' => 'center',
                'class' => 'kartik\grid\BooleanColumn',
                'attribute' => 'userStatus',
            ],

            
            // 'userStatus',

            // ['class' => 'yii\grid\ActionColumn','template' => '{update}'],
        ],
    ]); ?>
    
    <p>
        <?= Html::a('Tambah Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
