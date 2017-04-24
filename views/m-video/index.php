<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MVideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mvideos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mvideo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mvideo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'videoId',
            'videoUrl:url',
            'videoStatus',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
