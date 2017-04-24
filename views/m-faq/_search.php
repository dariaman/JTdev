<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MFaqSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mfaq-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'faqId') ?>

    <?= $form->field($model, 'faqJudul') ?>

    <?= $form->field($model, 'faqDeskripsi') ?>

    <?= $form->field($model, 'faqStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
