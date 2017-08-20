<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MKelurahan */

$this->title = 'Update Mkelurahan: ' . $model->kelurahanId;
$this->params['breadcrumbs'][] = ['label' => 'Mkelurahans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kelurahanId, 'url' => ['view', 'id' => $model->kelurahanId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mkelurahan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
