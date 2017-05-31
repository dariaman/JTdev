<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MPromoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Promo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mpromo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'promoId',
            'promoJudul',
            'promoDeskripsi:ntext',
            'promoTgl',
//            'promoGambarUrl:url',
            [
                'attribute' => 'promoGambarUrl',
                'format' => 'html',
                'label' => 'promoGambarUrl',
                'value' => function ($data) {
                    return Html::img('../'.Yii::$app->params['GambarPromo'].$data['promoGambarUrl'],
                        ['width' => '200px']);
                },
            ],
            // 'promoDibuatTgl',
            // 'promoDibuatOleh',
            // 'promoStatus',

            ['class' => 'yii\grid\ActionColumn','template' => '{update}'],
        ],
    ]); ?>
    
    <p>
        <?= Html::a('Tambah Promo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
