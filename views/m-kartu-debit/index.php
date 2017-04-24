<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MKartuDebitKreditSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mkartu Debit Kredits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mkartu-debit-kredit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Mkartu Debit Kredit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kartuId',
            'kartuJudul',
            'kartuStatus',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
