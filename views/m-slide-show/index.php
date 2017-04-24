<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MSlideShowSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mslide Shows';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mslide-show-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mslide Show', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'slideId',
            'slideUrl:url',
            'slideStatus',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
