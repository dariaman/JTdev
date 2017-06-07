<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MService */

$this->title = 'Update Service: ' . $model->serviceId;
$this->params['breadcrumbs'][] = ['label' => 'Service', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->serviceId, 'url' => ['view', 'id' => $model->serviceId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mservice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
