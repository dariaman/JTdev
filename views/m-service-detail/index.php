<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MServiceDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Service Product';
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
    <p style="text-align: right;">
        <?= Html::a('Tambah Service Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'serviceDetailJudul',
            [
                'header' => 'Service Kategori',
                'attribute' => 'serviceKategoriId',
                'value' => 'serviceKategoriJudul'
            ],
            'serviceDetailGambar:url',
            'serviceDetailDeskripsi:ntext',
//            [
//                'header' => 'Service',
//                'attribute' => 'serviceId',
//                'value' => 'serviceJudul'
//            ],
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
<?php Pjax::end(); ?>
</div>
