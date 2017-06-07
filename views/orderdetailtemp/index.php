<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderdetailtempSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orderdetailtemps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderdetailtemp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Orderdetailtemp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'serviceDetailId',
            'kapasitasId',
            'TglKerja',
            'WaktuKerja',
            // 'Keluhan',
            // 'QTY',
            // 'DetailProperti',
            // 'totalHarga',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
