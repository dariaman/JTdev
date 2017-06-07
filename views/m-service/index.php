<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Service';
$this->params['breadcrumbs'][] = $this->title;

function Status($model){
    if ($model->serviceStatus == 1){
          return html::label('<span class="glyphicon glyphicon-ok"></span>','',['style'=>['color'=>'green']]);
      }else if($model->serviceStatus == 0){
          return html::label('<span class="glyphicon glyphicon-remove"></span>','',['style'=>['color'=>'red']]);
     }
}
?>
<div class="mservice-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'serviceId',
            'serviceJudul',
            [
                'label'=>'Status',
                'attribute'=>'serviceStatus',
                'format'=>'raw',
                'value'=>function($model){
                        return Status($model);
                },
            ],

            ['class' => 'yii\grid\ActionColumn','template' => '{update}'],
        ],
    ]); ?>
    
    <p>
        <?= Html::a('Tambah Service', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
