<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MServiceKategori */

$this->title = 'Update Service Kategori: ' . $model->serviceKategoriId;
$this->params['breadcrumbs'][] = ['label' => 'Service Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->serviceKategoriId, 'url' => ['view', 'id' => $model->serviceKategoriId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mservice-kategori-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
