<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MPromoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Promo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mpromo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Promo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'promoId',
            'promoJudul',
            'promoDeskripsi:ntext',
            'promoTgl',
            'promoGambarUrl:url',
            // 'promoDibuatTgl',
            // 'promoDibuatOleh',
            // 'promoStatus',

            ['class' => 'yii\grid\ActionColumn','template'=>'{update}'],
        ],
    ]); ?>
</div>
