<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MAdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Madmins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="madmin-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Madmin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'adminId',
            'adminPassword',
            'adminNama',
            'adminStatus',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
