<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MServiceDetail */

$this->title = 'Create service Detail';
$this->params['breadcrumbs'][] = ['label' => 'Mservice Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mservice-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data_service'=>$data_service
    ]) ?>

</div>