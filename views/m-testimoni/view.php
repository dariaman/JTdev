<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MTestimoni */

$this->title = $model->testiId;
$this->params['breadcrumbs'][] = ['label' => 'Mtestimonis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mtestimoni-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->testiId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->testiId], [
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
            'testiId',
            'testiNama',
            'testiPekerjaan',
            'testiKonten:ntext',
            'testiFoto',
            'testiStatus',
        ],
    ]) ?>

</div>
