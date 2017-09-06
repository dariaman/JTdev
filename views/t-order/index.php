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
            [
                'header' => 'Customer',
                'value' => function($data){
                    return $data['muser']['userNamaDepan'] . ' ' . $data['muser']['userNamaBelakang'];

                // => 'muser.userNamaDepan'.' '.'muser.userNamaBelakang',
                }
            ],
            // 'userId',
            'orderTgl',
            [
                'header' => 'Jenis Bayar',
                'value' => function($data){
                    return (($data['orderJenisBayar']=='1') ? 'Tunai' : (($data['muser']=='P') ? 'Lunas' : 'Belum Lunas'));

                    if($data['orderJenisBayar']=='P'){
                        return 'Lunas';
                    }else{
                        return 'Belum Lunas';
                    }
                }
            ],
            'orderAlamat',
            [
                'header' => 'StatusBayar',
                'value' => function($data){
                    return (($data['muser']=='P') ? 'Lunas' : 'Belum Lunas');
                }
            ],
            [
                'header' => 'Invoice',
                'format' => 'raw',
                'contentOptions' => ['Align' => 'center','style' => 'width: 50px;'],
                'headerOptions' => ['style' => 'text-align:center'],
                'value' => function($data){
                    return Html::a('',['print-inv','orderid' => $data['orderId']],['class'=>'glyphicon glyphicon-print']);
                }
            ],

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
