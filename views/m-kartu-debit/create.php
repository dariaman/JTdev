<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MKartuDebitKredit */

$this->title = 'Create Mkartu Debit Kredit';
$this->params['breadcrumbs'][] = ['label' => 'Mkartu Debit Kredits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mkartu-debit-kredit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
