<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MAdmin */

$this->title = 'Update Madmin: ' . $model->adminId;
$this->params['breadcrumbs'][] = ['label' => 'Madmins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->adminId, 'url' => ['view', 'id' => $model->adminId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="madmin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
