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
            // 'orderTgl',
            [
                'header' => 'Tgl Order',
                'value' => function($data){
                    return date('d-M-Y',strtotime($data['orderTgl']));
                }
            ],
            // [
            //     'header' => 'Jenis Bayar',
            //     'value' => function($data){
            //         return (($data['orderJenisBayar']=='1') ? 'Tunai' : (($data['muser']=='P') ? 'Paid' : 'Pending'));

            //         if($data['orderJenisBayar']=='P'){
            //             return 'Paid';
            //         }else{
            //             return 'Pending';
            //         }
            //     }
            // ],
            'orderAlamat',
            [
                'header' => 'StatusPekerjaan',
                'format' => 'raw',
                'attribute' => 'StatusPekerjaan',
                'value' => function($data){
                    return (($data['StatusPekerjaan']=='2') ? html::label('Done', '', ['style' => ['color' => 'green']]) : 
                            ($data['StatusPekerjaan']=='1' ? html::label('Process', '', ['style' => ['color' => 'red']]) 
                                : html::label('Open', '', ['style' => ['color' => 'red']])) );
                }
            ],
            [
                'header' => 'StatusBayar',
                'format' => 'raw',
                'attribute' => 'StatusBayar',
                'value' => function($data){
                    return (($data['StatusBayar']=='P') ? html::label('Paid', '', ['style' => ['color' => 'green']]) : html::label('Pending', '', ['style' => ['color' => 'red']]));
                }
            ],
            [
                'label' => 'IsActive',
                'width' => '100px',
                'hAlign' => 'center',
                'class' => 'kartik\grid\BooleanColumn',
                'attribute' => 'orderStatus',
            ],  
            [
                'header' => 'Invoice',
                'format' => 'raw',
                'contentOptions' => ['Align' => 'center','style' => 'width: 50px;'],
                'headerOptions' => ['style' => 'text-align:center'],
                'value' => function($data){
                    return Html::a('',['print-inv','orderid' => $data['orderId']],['class'=>'glyphicon glyphicon-print','target'=>'_blank','data-pjax' => '0']);
                }
            ],
            [
                'header' => 'Tgl Email Invoice',
                'value' => function($data){
                    if($data['SendInvDate']==null){
                        return'';
                    }
                        else {
                            return date('d-M-Y',strtotime($data['SendInvDate']));
                    }
                }
            ],
             [
                 'header' => 'Email Invoice',
                 'format' => 'raw',
                 'contentOptions' => ['Align' => 'center','style' => 'width: 50px;'],
                 'headerOptions' => ['style' => 'text-align:center'],
                 'value' => function($data){
                if($data['SendInvDate']==null){
                    return Html::a('Send Email', ['send-inv','orderid' => $data['orderId']], ['class' => 'btn btn-success']);
                }else{
                    return Html::a('Resend Email', ['send-inv','orderid' => $data['orderId']], ['class' => 'btn btn-warning']);
                }
                 }
             ],

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
