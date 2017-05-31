<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MEvents */

$this->title = 'Update event: ' . $model->eventId;
$this->params['breadcrumbs'][] = ['label' => 'event', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->eventId, 'url' => ['view', 'id' => $model->eventId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mevents-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
