<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MKapasitasDetail */

$this->title = 'Tambah Harga Satuan';
$this->params['breadcrumbs'][] = ['label' => 'Harga Satuan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mkapasitas-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
