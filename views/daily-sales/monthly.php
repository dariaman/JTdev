<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DailySalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Report Mingguan Penjualan';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="daily-sales-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <?php  echo $this->render('_search_monthly', ['model' => $searchModel]); ?>

    
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'pjax'=>true,
    'id'=>'tableid',
        'striped'=>true,
        'hover'=>true,
        'panel'=>['type'=>'primary', 'heading'=>'Laporan Penjualan Bulanan Jagonya Tukang'],
        'columns' => [
            [
                'attribute'=>'serviceKategoriJudul', 
                'header' => 'Produk',
                'mergeHeader'=>true,
                'group'=>true,  // enable grouping
            ],
            [
                'attribute'=>'serviceDetailJudul', 
                'header' => 'Kategori Service',
            ],
            
            ['attribute'=>'woJan', 'header' => 'JlhWO Jan'],
            ['attribute'=>'unJan','header' => 'JlhUnit Jan'],
            ['attribute'=>'upJan', 'header' => 'Unpaid Jan'],
            ['attribute'=>'pdJan','header' => 'Paid Jan'],
            
            ['attribute'=>'woFeb', 'header' => 'JlhWO Feb'],
            ['attribute'=>'unFeb','header' => 'JlhUnit Feb'],
            ['attribute'=>'upFeb', 'header' => 'Unpaid Feb'],
            ['attribute'=>'pdFeb','header' => 'Paid Feb'],
            
            ['attribute'=>'woMar', 'header' => 'JlhWO Mar'],
            ['attribute'=>'unMar','header' => 'JlhUnit Mar'],
            ['attribute'=>'upMar', 'header' => 'Unpaid Mar'],
            ['attribute'=>'pdMar','header' => 'Paid Mar'],
            
            ['attribute'=>'woApr', 'header' => 'JlhWO Apr'],
            ['attribute'=>'unApr','header' => 'JlhUnit Apr'],
            ['attribute'=>'upApr', 'header' => 'Unpaid Apr'],
            ['attribute'=>'pdApr','header' => 'Paid Apr'],
            
            ['attribute'=>'woMei', 'header' => 'JlhWO Mei'],
            ['attribute'=>'unMei','header' => 'JlhUnit Mei'],
            ['attribute'=>'upMei', 'header' => 'Unpaid Mei'],
            ['attribute'=>'pdMei','header' => 'Paid Mei'],
            
            ['attribute'=>'woJun', 'header' => 'JlhWO Jun'],
            ['attribute'=>'unJun','header' => 'JlhUnit Jun'],
            ['attribute'=>'upJun', 'header' => 'Unpaid Jun'],
            ['attribute'=>'pdJun','header' => 'Paid Jun'],
            
            ['attribute'=>'woJul', 'header' => 'JlhWO Mar'],
            ['attribute'=>'unJul','header' => 'JlhUnit Mar'],
            ['attribute'=>'upJul', 'header' => 'Unpaid Mar'],
            ['attribute'=>'pdJul','header' => 'Paid Mar'],
            
            ['attribute'=>'woAgs', 'header' => 'JlhWO Ags'],
            ['attribute'=>'unAgs','header' => 'JlhUnit Ags'],
            ['attribute'=>'upAgs', 'header' => 'Unpaid Ags'],
            ['attribute'=>'pdAgs','header' => 'Paid Ags'],
            
            ['attribute'=>'woSep', 'header' => 'JlhWO Mar'],
            ['attribute'=>'unSep','header' => 'JlhUnit Mar'],
            ['attribute'=>'upSep', 'header' => 'Unpaid Mar'],
            ['attribute'=>'pdSep','header' => 'Paid Mar'],
            
            ['attribute'=>'woOkt', 'header' => 'JlhWO Okt'],
            ['attribute'=>'unOkt','header' => 'JlhUnit Okt'],
            ['attribute'=>'upOkt', 'header' => 'Unpaid Okt'],
            ['attribute'=>'pdOkt','header' => 'Paid Okt'],
            
            ['attribute'=>'woNov', 'header' => 'JlhWO Nov'],
            ['attribute'=>'unNov','header' => 'JlhUnit Nov'],
            ['attribute'=>'upNov', 'header' => 'Unpaid Nov'],
            ['attribute'=>'pdNov','header' => 'Paid Nov'],
            
            ['attribute'=>'woDes', 'header' => 'JlhWO Des'],
            ['attribute'=>'unDes','header' => 'JlhUnit Des'],
            ['attribute'=>'upDes', 'header' => 'Unpaid Des'],
            ['attribute'=>'pdDes','header' => 'Paid Des'],
            
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
