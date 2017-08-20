<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MKotaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mkota-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kotaId') ?>

    <?= $form->field($model, 'kotaNama') ?>

    <?= $form->field($model, 'Ongkir') ?>

    <?= $form->field($model, 'DateCrt') ?>

    <?= $form->field($model, 'DateUpdate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
