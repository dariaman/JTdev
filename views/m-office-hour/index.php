<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MOfficeHourSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Office Hour';
$this->params['breadcrumbs'][] = $this->title;

function Status($model){
    if ($model->officeHourStatus == 1){
          return html::label('<span class="glyphicon glyphicon-ok"></span>','',['style'=>['color'=>'green']]);
      }else if($model->officeHourStatus == 0){
          return html::label('<span class="glyphicon glyphicon-remove"></span>','',['style'=>['color'=>'red']]);
     }
}
?>
<div class="moffice-hour-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'officeHourId',
            'officeHourValue',
            'officeHourTitle',
            [
                'label'=>'Status',
                'attribute'=>'officeHourStatus',
                'format'=>'raw',
                'value'=>function($model){
                        return Status($model);
                },
            ],
            ['class' => 'yii\grid\ActionColumn','template' => '{update}'],
        ],
    ]); ?>
    
    <p>
        <?= Html::a('Tambah Office Hour', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
