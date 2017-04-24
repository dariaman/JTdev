<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MGallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gallery';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mgallery-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gallery', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'galleriId',
            'galleriJudul',
            'galleriDeskripsi:ntext',
            'galleriTgl',
            'galleriGambarUrl:url',
            'galleriStatus',

            ['class' => 'yii\grid\ActionColumn','template'=>'{update}'],
        ],
    ]); ?>
</div>
