<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Select2;
use kartik\grid\GridView;
use yii\widgets\Pjax;
//use kartik\datecontrol\DateControl;

$cust = ArrayHelper::map(app\models\MUser::find()->all(),'userId','userNamaDepan');
?>

<div class="torder-form">
    
<?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    
    <?= $form->field($modelH, "userId")->widget(Select2::classname(), [
                    'data'=> ArrayHelper::map(app\models\MUser::find()->all(),'userId','userNamaDepan'),
                    'options' => ['placeholder' => '-- Customer --'],'pluginOptions' => ['allowClear' => true]])
            ->label("Customer") ?>
    <?= Html::a('Add Order Detail', ['orderdetailtemp/create'], ['class' => 'btn btn-success','id' => 'odetail']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'serviceDetailId',
            'kapasitasId',
            'QTY',
            'TglKerja',
            'WaktuKerja',
            'Keluhan',
            'DetailProperti',
//            [
//                'format' => 'raw',
//                'value' => function($data){
//                    return Html::a('',['delete-detail','id' => $data['id']],['class' => 'glyphicon glyphicon-trash']);
//                }
//            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons'=>[
                    'delete' => function ($url, $model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-trash"></span>',
                            ['delete-detail', 'id' => $model->id]
                        );
                    }
                ]
            ],
        ],
    ]); ?>
<?php ActiveForm::end(); ?>

</div>
