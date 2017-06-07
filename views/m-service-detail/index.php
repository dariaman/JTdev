<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MServiceDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Service Detail';
$this->params['breadcrumbs'][] = $this->title;

function Status($model){
    if ($model->serviceDetailStatus == 1){
          return html::label('<span class="glyphicon glyphicon-ok"></span>','',['style'=>['color'=>'green']]);
      }else if($model->serviceDetailStatus == 0){
          return html::label('<span class="glyphicon glyphicon-remove"></span>','',['style'=>['color'=>'red']]);
     }
}
?>
<div class="mservice-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'serviceDetailId',
            'serviceDetailJudul',
            'serviceDetailDeskripsi:ntext',
            [
                'attribute' => 'serviceDetailGambar',
                'format' => 'html',
                'label' => 'serviceDetailGambar',
                'value' => 'serviceDetailGambar'
//                'value' => function ($data) {
//                    return Html::img('../'.Yii::$app->params['GambarServiceDetail'].$data['serviceDetailGambar'],
//                        ['width' => '200px']);
//                },
            ],
            [
                'header' => 'Service Kategori',
                'attribute' => 'serviceKategoriId',
                'value' => 'serviceKategoriJudul'
            ],
            [
                'header' => 'Service',
                'attribute' => 'serviceId',
                'value' => 'serviceJudul'
            ],
            [
                'label'=>'Status',
                'attribute'=>'serviceDetailStatus',
                'format'=>'raw',
                'value'=>function($model){
                        return Status($model);
                },
            ],

            ['class' => 'yii\grid\ActionColumn','template' => '{update} '],
        ],
    ]); ?>
    
    <p>
        <?= Html::a('Tambah Service Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
