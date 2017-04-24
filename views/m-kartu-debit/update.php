<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MKartuDebitKredit */

$this->title = 'Update Mkartu Debit Kredit: ' . $model->kartuId;
$this->params['breadcrumbs'][] = ['label' => 'Mkartu Debit Kredits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kartuId, 'url' => ['view', 'id' => $model->kartuId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mkartu-debit-kredit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
