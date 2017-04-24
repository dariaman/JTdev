<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MKota */

$this->title = 'Update kota: ' . $model->kotaId;
$this->params['breadcrumbs'][] = ['label' => 'Mkotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kotaId, 'url' => ['view', 'id' => $model->kotaId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mkota-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
