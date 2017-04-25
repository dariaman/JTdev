<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
?>
<div class="torder-detail-index">
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
            'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'service',
            'serviceKategori',
            'serviceDetail',
            'satuan',
            'Qty',
            'HargaSatuan',
            'RekanTukang',
            [
                'label'=>'Tgl Pengerjaan',
                'format'=>['date', 'php:d M Y'],
                'value'=>'TglPengerjaan'
            ],
            'JamPengerjaan',
            'Keluhan',
            'DetailKeluhan',
             'DetailProperti',

            [
                'class' => 'yii\grid\ActionColumn'
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
