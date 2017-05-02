<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use kartik\widgets\DatePicker;
//use kartik\datecontrol\DateControl;
use wbraganca\dynamicform\DynamicFormWidget;


$this->registerJs(<<<JS
    $(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
        if (! confirm("Are you sure you want to delete this item?")) {
            return false;
        }
        return true;
    });

    $(".dynamicform_wrapper").on("afterDelete", function(e) {
        console.log("Deleted item!");
    });

    $(".dynamicform_wrapper").on("limitReached", function(e, item) {
        alert("Limit reached");
    });
        
    $(".dynamicform_wrapper").on('afterInsert', function(e, item) {
        var datePickers = $(this).find('[data-krajee-kvdatepicker]');
        datePickers.each(function(index, el) {
            $(this).parent().removeData().kvDatepicker('remove');
            $(this).parent().kvDatepicker(eval($(this).attr('data-krajee-kvdatepicker')));
        });
    });
//      function initSelect2Loading(a,b){ initS2Loading(a,b); }
//    function initSelect2Loading(a,b){ initS2Loading(a,b); }
//    function initSelect2DropStyle(id, kvClose, ev){ initS2Open(id, kvClose, ev); }
JS
, \yii\web\View::POS_END);


?>

<div class="torder-form">
    
    <?php $form = ActiveForm::begin(['layout' => 'horizontal','id' => 'dynamic-form']); ?>
    
    <div class="row">
        <div class="panel panel-default">            
            <div class="panel-heading"><h5><i class="glyphicon glyphicon-envelope"></i> Order Detail</h5></div>
            <div class="panel-body">
                <?php DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                    'widgetBody' => '.container-items', // required: css class selector
                    'widgetItem' => '.item', // required: css class
                    'limit' => 400, // the maximum times, an element can be cloned (default 999)
                    'min' => 1, // 0 or 1 (default 1)
                    'insertButton' => '.add-item', // css class
                    'deleteButton' => '.remove-item', // css class
                    'model' => $modelsD[0],
                    'formId' => 'dynamic-form',
                    'formFields' => [
                        'serviceDetailId',
                        'kapasitasId',
                        'orderDetailTglKerja',
                        'orderDetailWaktuKerja',
                        'orderDetailQTY',
                        'orderDetailKeluhan',
                        'orderDetailProperti'
                    ],
                ]); ?>

            <div class="container-items">
            <?php foreach ($modelsD as $i => $modelD): ?>
                <div class="item panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <div class="pull-right"><button type="button" class="add-item btn btn-success btn-xs">Add Detail <i class="glyphicon glyphicon-plus"></i></button></div>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (!$modelD->isNewRecord) {
                                echo Html::activeHiddenInput($modelD, "[{$i}]orderDetailId");
                            }
                        ?>
<table class="table table-striped">
    <tr>
        <td style="width: 50%;">
            <?= $form->field($modelD, "[{$i}]serviceId")->widget(Select2::classname(), [
                    'data'=> ArrayHelper::map(app\models\MService::find()->all(),'serviceId','serviceJudul'),
                    'options' => ['placeholder' => '-- Services --'],'pluginOptions' => ['allowClear' => true]])->label("Service") ?></td>
        <td><?= $form->field($modelD, "[{$i}]orderDetailTglKerja")->widget(DatePicker::classname(), [
                                    'options' => ['class' => 'form-control picker','placeholder' => 'Tanggal Pengerjaan ...'],
                                    'pluginOptions' => [
                                        'format' => 'dd-MM-yyyy',
                                        'autoclose'=>true,
                                        'todayHighlight' => true
                                    ]
                                ])->label("Tgl Pengerjaan"); ?></td>
    </tr>
    
    
</table>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    <?= Html::submitButton('Save', ['class'=>'btn btn-success']) ?>
    </div></div></div>
<?php ActiveForm::end(); ?>

</div>
