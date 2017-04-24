<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MShopDetail */

$this->title = 'Update Mshop Detail: ' . $model->shopDetailId;
$this->params['breadcrumbs'][] = ['label' => 'Mshop Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->shopDetailId, 'url' => ['view', 'id' => $model->shopDetailId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mshop-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
