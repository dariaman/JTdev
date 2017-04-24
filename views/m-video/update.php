<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MVideo */

$this->title = 'Update Mvideo: ' . $model->videoId;
$this->params['breadcrumbs'][] = ['label' => 'Mvideos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->videoId, 'url' => ['view', 'id' => $model->videoId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mvideo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
