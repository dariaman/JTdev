<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MInternetBankingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Minternet Bankings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minternet-banking-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Internet Banking', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ibankId',
            'ibankJudul',
            'ibankStatus',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
