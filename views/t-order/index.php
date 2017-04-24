<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\TOrderDetailSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Order';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="torder-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?= GridView::widget([
            'dataProvider'=>$dataProvider,
            'filterModel'=>$searchModel,
            'export'=>false,
            'pjax'=>true,
            'hover'=>TRUE,
//            'showPageSummary'=>true,
            'columns'=>[
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['Align' => 'right','style' => 'width: 50px;'],
                'headerOptions' => ['style' => 'text-align:center'],
            ],
            [
                'class'=>'kartik\grid\ExpandRowColumn',
                'width'=>'50px',
                'value'=>function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail'=>function ($model, $key, $index, $column) {
                    $searchModel = new TOrderDetailSearch();
                    $searchModel->orderId = $model->orderId;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    return Yii::$app->controller->renderPartial('_expand-detail', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
//                    return Yii::$app->controller->renderPartial('_expand-detail', ['model'=>$model]);
                },
                'headerOptions'=>['class'=>'kartik-sheet-style'],
//                'expandOneOnly'=>true
            ],
            [
                'header' => 'Order ID',
                'format' => 'raw',
                'contentOptions' => ['Align' => 'right','style' => 'width: 50px;'],
                'headerOptions' => ['style' => 'text-align:center'],
                'value' => function($data){
                    return Html::a($data['orderId'], ['detail', 'id' => $data['orderId']]);
                }
            ],
                'muser.userNamaDepan',
            [
                'attribute' => 'orderTgl',
                'format' => ['date', 'php:d M Y'],
                'contentOptions' => ['Align' => 'center','style' => 'width: 150px;'],
                'headerOptions' => ['style' => 'text-align:center'],
            ],
            [
                'header' => 'Jenis Bayar',
                'contentOptions' => ['Align' => 'center','style' => 'width: 100px;'],
                'headerOptions' => ['style' => 'text-align:center'],
                'value' => function($data)
                {
                    if($data['orderStatus'] = "1"){
                        return "Tunai";
                    }
                    else if($data['orderStatus'] = "2"){
                        return "Transfer";
                    }
                    else if($data['orderStatus'] = "3"){
                        return "Karu Kredit";
                    }
                }
            ],
            'orderAlamat',
            [
                'label' => 'Biaya Transport',
                'value' => 'orderBiayaTransport',
                'format' => ['decimal', 0],
                'contentOptions' => ['Align' => 'right','style' => 'width: 130px;'],
                'headerOptions' => ['style' => 'text-align:center']
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
            ['class' => 'yii\grid\ActionColumn','template'=>'{update}'],
        ],
            
    ]);
?>
    <p>
        <?= Html::a('Buat Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
