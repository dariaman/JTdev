<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MUserAlamatTambahan */

$this->title = 'Update Muser Alamat Tambahan: ' . $model->alamatId;
$this->params['breadcrumbs'][] = ['label' => 'Muser Alamat Tambahans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->alamatId, 'url' => ['view', 'id' => $model->alamatId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="muser-alamat-tambahan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
