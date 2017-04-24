<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MRekanJt */

$this->title = 'Update Mrekan Jt: ' . $model->rekanId;
$this->params['breadcrumbs'][] = ['label' => 'Mrekan Jts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rekanId, 'url' => ['view', 'id' => $model->rekanId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mrekan-jt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
