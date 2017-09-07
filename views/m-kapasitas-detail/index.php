<?php

use yii\helpers\Html;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MKapastiasDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Harga Satuan';
$this->params['breadcrumbs'][] = $this->title;

function Status($model){
    if ($model->kapasitasStatus == 1){
          return html::label('<span class="glyphicon glyphicon-ok"></span>','',['style'=>['color'=>'green']]);
      }else if($model->kapasitasStatus == 0){
          return html::label('<span class="glyphicon glyphicon-remove"></span>','',['style'=>['color'=>'red']]);
     }
}
?>
<div class="mkapasitas-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<p style="text-align: right;">
    <?= Html::a('Tambah Harga Satuan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'header' => 'Service Detail',
                'attribute' => 'serviceDetailId',
                'value' => 'serviceDetailJudul'
            ],
            [
                'header' => 'Harga Satuan',
                'format' => 'decimal',
                'contentOptions' => ['Align' => 'right'],
                'attribute' => 'kapasitasHarga',
            ],
            [
                'header' => 'Keterangan Satuan',
                'attribute' => 'kapasitasJudul',
            ],
            [
                'label'=>'Status',
                'attribute'=>'kapasitasStatus',
                'format'=>'raw',
                'value'=>function($model){
                        return Status($model);
                },
            ],
             'kapasitasDeskripsi:ntext',

            ['class' => 'yii\grid\ActionColumn','template' => '{update}'],
        ],
    ]); ?>
</div>
