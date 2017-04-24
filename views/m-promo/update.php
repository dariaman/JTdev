<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MPromo */

$this->title = 'Update Mpromo: ' . $model->promoId;
$this->params['breadcrumbs'][] = ['label' => 'Mpromos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->promoId, 'url' => ['view', 'id' => $model->promoId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mpromo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
