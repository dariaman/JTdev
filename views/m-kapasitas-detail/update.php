<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MKapasitasDetail */

$this->title = 'Update Service Product : ' . $model->kapasitasJudul;
$this->params['breadcrumbs'][] = ['label' => 'Service Product', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kapasitasId, 'url' => ['view', 'id' => $model->kapasitasJudul]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mkapasitas-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
