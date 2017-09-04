<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order';
$this->params['breadcrumbs'][] = $this->title;

yii\bootstrap\Modal::begin(['id' =>'modalOrder']);
yii\bootstrap\Modal::end();

?>
<div class="torder-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p align="right">
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'header' => 'Order ID',
                'format' => 'raw',
                'contentOptions' => ['Align' => 'right','style' => 'width: 50px;'],
                'headerOptions' => ['style' => 'text-align:center'],
                'value' => function($data){
                    return Html::a($data['orderId'], ['detail', 'id' => $data['orderId']]);
              },

            ],
            'orderTgl',
            'orderJenisBayar',
            'orderAlamat',
            'StatusBayar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
