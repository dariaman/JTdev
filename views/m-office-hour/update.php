<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MOfficeHour */

$this->title = 'Update Office Hour: ' . $model->officeHourId;
$this->params['breadcrumbs'][] = ['label' => 'Office Hour', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->officeHourId, 'url' => ['view', 'id' => $model->officeHourId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="moffice-hour-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
