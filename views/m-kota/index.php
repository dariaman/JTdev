<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MKotaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kota';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mkota-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p align="right">
        <?= Html::a('Create Kota', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['Align' => 'right','style' => 'width: 30px;'],
            ],
            [
                'header' => 'Nama Kota',
                'attribute' => 'kotaNama',
            ],
            [
                'header' => 'Ongkos Kirim',
                'attribute' => 'Ongkir',
                'contentOptions' => ['Align' => 'right','style' => 'width: 300px;'],
                'value'=>function($model){
                    if($model->Ongkir =='') return '-';
                    else
                        return Yii::$app->formatter->asDecimal($model->Ongkir);
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn','template'=>'{update}',
                'contentOptions' => ['Align' => 'right','style' => 'width: 50px;'],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
