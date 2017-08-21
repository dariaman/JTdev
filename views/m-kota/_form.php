<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="mkota-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'kotaNama')->textInput(['maxlength' => false]) ?>
    <?= $form->field($model, 'Ongkir')->textInput(['type' => 'number','maxlength' => false]) ?>


    <div class="col-xs-12">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
