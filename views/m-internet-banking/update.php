<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MInternetBanking */

$this->title = 'Update Minternet Banking: ' . $model->ibankId;
$this->params['breadcrumbs'][] = ['label' => 'Minternet Bankings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ibankId, 'url' => ['view', 'id' => $model->ibankId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="minternet-banking-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
