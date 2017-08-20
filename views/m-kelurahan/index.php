<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Kelurahan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mkelurahan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p align="right">
        <?= Html::a('Create Kelurahan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['Align' => 'right','style' => 'width: 30px;'],
            ],
            'kelurahanNama',
            'kecamatanId',
            [
                'class' => 'yii\grid\ActionColumn','template'=>'{update}',
                'contentOptions' => ['Align' => 'right','style' => 'width: 50px;'],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
