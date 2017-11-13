<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MSlideShowSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Slide Show';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mslide-show-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'slideId',
            'slideUrl:url',
            [
                'label' => 'IsActive',
                'width' => '100px',
                'hAlign' => 'center',
                'class' => 'kartik\grid\BooleanColumn',
                'attribute' => 'slideStatus',
            ],

            // 'slideStatus',

            ['class' => 'yii\grid\ActionColumn','template'=>'{update}'],
        ],
    ]); ?>
</div>
