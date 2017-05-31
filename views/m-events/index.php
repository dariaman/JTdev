<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MEventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Event';
$this->params['breadcrumbs'][] = $this->title;

#status 
  function Status($model){
      if ($model->eventStatus == 1){
            return html::label('<span class="glyphicon glyphicon-ok"></span>','',['style'=>['color'=>'green']]);
        }else if($model->eventStatus == 0){
            return html::label('<span class="glyphicon glyphicon-remove"></span>','',['style'=>['color'=>'red']]);
       }
  }
?>
<div class="mevents-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'eventId',
            'eventJudul',
            'eventDeskripsi:ntext',
            'eventTgl',
//            'eventGambarUrl:url',
            [
                'attribute' => 'eventGambarUrl',
                'format' => 'html',
                'label' => 'eventGambarUrl',
                'value' => function ($data) {
                    return Html::img('../'.Yii::$app->params['GambarEvent'].$data['eventGambarUrl'],
                        ['width' => '200px']);
                },
            ],
             [
                'label'=>'Status',
                'attribute'=>'eventStatus',
                'format'=>'raw',
                'value'=>function($model){
                        return Status($model);
                },
            ],
            // 'eventDibuatTgl',
            // 'eventDibuatOleh',
            // 'eventStatus',

            ['class' => 'yii\grid\ActionColumn','template' => '{update}'],
        ],
    ]); ?>
    
    <p>
        <?= Html::a('Tambah Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
