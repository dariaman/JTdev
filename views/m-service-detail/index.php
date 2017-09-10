<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

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
    <p style="text-align: right;">
        <?= Html::a('Tambah Service Detail', ['create'], ['class' => 'btn btn-success']) ?>
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
                'value' => 'serviceKategoriJudul',
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(\app\models\MServiceKategori::find()
                        ->orderBy('serviceKategoriId')->asArray()->all(), 'serviceKategoriId', 'serviceKategoriJudul'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Service ... '],
                'contentOptions' => ['Align' => 'center','style' => 'width: 200px;'],
                'format' => 'raw'
            ],
            'serviceDetailDeskripsi:ntext',
            [
                'label'=>'Status',
                'attribute'=>'serviceDetailStatus',
                'class' => 'kartik\grid\BooleanColumn',
            ],

            ['class' => 'yii\grid\ActionColumn','template' => '{update} '],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
