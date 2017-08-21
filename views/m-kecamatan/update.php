<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MKecamatan */

$this->title = 'Update Kecamatan: ' . $model->kecamatanNama;
$this->params['breadcrumbs'][] = ['label' => 'Kecamatan', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->kecamatanId, 'url' => ['view', 'id' => $model->kecamatanId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mkecamatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
