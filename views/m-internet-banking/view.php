<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MInternetBanking */

$this->title = $model->ibankId;
$this->params['breadcrumbs'][] = ['label' => 'Minternet Bankings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minternet-banking-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ibankId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ibankId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ibankId',
            'ibankJudul',
            'ibankStatus',
        ],
    ]) ?>

</div>
