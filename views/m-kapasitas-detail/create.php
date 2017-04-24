<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MKapasitasDetail */

$this->title = 'Create Mkapasitas Detail';
$this->params['breadcrumbs'][] = ['label' => 'Mkapasitas Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mkapasitas-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data_service_detail'=>$data_service_detail
    ]) ?>

</div>
