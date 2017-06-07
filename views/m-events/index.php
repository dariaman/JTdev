<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MEventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mevents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mevents-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mevents', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'eventId',
            'eventJudul',
            'eventDeskripsi:ntext',
            'eventTgl',
            'eventGambarUrl:url',
            // 'eventDibuatTgl',
            // 'eventDibuatOleh',
            // 'eventStatus',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
