<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\MRekanJt */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Update Rekan Tukang';

?>


<div class="form-group">
<h4><?= Html::encode($this->title) ?></h4>
    
<?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
    
<?=Html::hiddenInput('back', $back); ?>    
<?= $form->field($model, 'rekanId')->widget(Select2::classname(), [
'data' => ArrayHelper::map(\app\models\MRekanJt::find()->orderBy('rekanNamaLengkap')->asArray()->all(), 'rekanId', 'rekanNamaLengkap')
    ,'pluginOptions' => ['allowClear' => true],]) ?>            
<?= Html::submitButton( 'Update', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>


    <div class="form-group">
        
    </div>

    

</div>
