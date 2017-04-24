<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MShop */

$this->title = 'Update Mshop: ' . $model->shopId;
$this->params['breadcrumbs'][] = ['label' => 'shop', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->shopId, 'url' => ['view', 'id' => $model->shopId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mshop-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data_status'=>$data_status
    ]) ?>

</div>
