<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DailySalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daily Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daily-sales-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'pjax'=>true,
        'striped'=>true,
        'hover'=>true,
        'panel'=>['type'=>'primary', 'heading'=>'Laporan Penjualan Harian Jagonya Tukang'],
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'serviceKategoriJudul', 
                'header' => 'Produk',
                'group'=>true,  // enable grouping
            ],
            [
                'attribute'=>'userNamaDepan', 
                'header' => 'Nama Konsumen',
            ],
            [
                'attribute'=>'jlh', 
                'header' => 'Jumlah Unit',
            ],
            'paid',
            'unpaid',
            [
                'header' => 'Keterangan Services',
                'value'=>function($model){
                        return '';
                },
            ],
            // 'UserUpdate',
            // 'DateUpdate',

        ],
    ]); ?>
<?php Pjax::end(); ?></div>
