<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MKecamatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kecamatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mkecamatan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p align="right">
        <?= Html::a('Create Kecamatan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['Align' => 'right','style' => 'width: 30px;'],
            ],
            'kecamatanNama',
            [
                'header' => 'Nama Kota',
                'attribute' => 'kotaId',
                'value' => 'kota.kotaNama',
            ],
            [
                'class' => 'yii\grid\ActionColumn','template'=>'{update}',
                'contentOptions' => ['Align' => 'right','style' => 'width: 50px;'],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>