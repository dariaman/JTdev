<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MServiceKategoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Service Kategori';
$this->params['breadcrumbs'][] = $this->title;

function Status($model) {
    if ($model->serviceKategoriStatus == 1) {
        return html::label('<span class="glyphicon glyphicon-ok"></span>', '', ['style' => ['color' => 'green']]);
    } else if ($model->serviceKategoriStatus == 0) {
        return html::label('<span class="glyphicon glyphicon-remove"></span>', '', ['style' => ['color' => 'red']]);
    }
}
?>
<div class="mservice-kategori-index">

    <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p style="text-align: right;">
    <?= Html::a('Tambah Service Kategori', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'serviceKategoriId',
            'serviceKategoriJudul',
//            'serviceKategoriGambarUrl:url',
            [
                'header' => 'Service',
                'attribute' => 'serviceId',
                'value' => 'serviceJudul',
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(\app\models\MService::find()->orderBy('serviceId')->asArray()->all(), 'serviceId', 'serviceJudul'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Service ... '],
                'format' => 'raw'
            ],
            [
                'label' => 'Status',
                'attribute' => 'serviceKategoriStatus',
                'class' => 'kartik\grid\BooleanColumn',
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{update}'],
        ],
    ]);
    ?>

</div>
