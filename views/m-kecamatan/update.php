<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MKecamatan */

$this->title = 'Update Mkecamatan: ' . $model->kecamatanId;
$this->params['breadcrumbs'][] = ['label' => 'Mkecamatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kecamatanId, 'url' => ['view', 'id' => $model->kecamatanId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mkecamatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
