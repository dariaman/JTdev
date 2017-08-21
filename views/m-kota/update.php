<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MKota */

$this->title = 'Update Kota : ' . $model->kotaNama;
$this->params['breadcrumbs'][] = ['label' => 'Kota', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->kotaId, 'url' => ['view', 'id' => $model->kotaId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mkota-update">

    <h1><?= Html::encode($this->title) ?></h1>
<br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
