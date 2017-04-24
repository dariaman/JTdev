<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MEvents */

$this->title = 'Update Mevents: ' . $model->eventId;
$this->params['breadcrumbs'][] = ['label' => 'Mevents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->eventId, 'url' => ['view', 'id' => $model->eventId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mevents-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
